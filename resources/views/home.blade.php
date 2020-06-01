@extends('adminbsb.main')

@section('content')
@php $group = 'home'; $page = 'home'; @endphp

<div id="mapid" style="width: 100%; height: 600px;"></div>
<script type="text/javascript" src="../assets/js/leaflet.ajax.js"></script>
<script>
    var map = L.map('mapid').setView([-6.75347, 111.03999], 12);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11'
    }).addTo(map);


  $.getJSON('http://127.0.0.1:8000/home/json/', function(mark){
    $.each(mark, function(i, field){
        
        var lat=parseFloat(mark[i].latitude);
        var long=parseFloat(mark[i].longitude);

        var photoImg = `
        <div class="card">
                        <div class="header bg-green">
                            <h2>
                              ${mark[i].nama} <small>${mark[i].keterangan}</small>
                            </h2>
                        </div>
                        <div class="body">
                            <img src="/data_file/${mark[i].file}" height="150px" width="150px" class="center" class="js-animating-object bounceOutDown"/>
                        </div>
                    </div>
        `;
        
        L.marker([lat , long]).addTo(map)
        .bindPopup(photoImg)
        .openPopup();

    });
  });
        
  $.getJSON('http://127.0.0.1:8000/home/json2/', function(mark2){
    $.each(mark2, function(i, field){
        
        var lat2=parseFloat(mark2[i].latitude);
        var long2=parseFloat(mark2[i].longitude);

        var redIcon = new L.Icon({
        iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
        });

        var photoImg = `
        <div class="card">
                        <div class="header bg-green">
                            <h2>
                              ${mark2[i].nama} <small>${mark2[i].keterangan}</small>
                            </h2>
                        </div>
                        <div class="body">
                            <img src="/data_file/${mark2[i].file}" height="150px" width="150px" class="center" class="js-animating-object bounceOutDown"/>
                        </div>
                    </div>
        `;

        L.marker([lat2 , long2], {icon: redIcon}).addTo(map)
        .bindPopup(photoImg)
        .openPopup();
      
    });
  });


  $.getJSON('http://127.0.0.1:8000/home/json3/', function(mark){
    geoLayer = L.geoJSON(mark, {

    onEachFeature: function(feature, geolayer){
      var latt=parseFolat(feature.properties.latitude);
    }

      }).addTo(map);
  });

  function popUp(f,l){
    var out = [];
    if (f.properties){
        for(key in f.properties){
            out.push(key+": "+f.properties[key]);
        }
        l.bindPopup(out.join("<br />"));
    }
}
var jsonTest = new L.GeoJSON.AJAX(["http://127.0.0.1:8000/home/json3/"],{onEachFeature:popUp}).addTo(map);



$.getJSON("pati.geojson",function(data){
// add GeoJSON layer to the map once the file is loaded
var datalayer = L.geoJson(data ,{
onEachFeature: function(feature, featureLayer) {
featureLayer.bindPopup(feature.properties.NAME_1);
}
}).addTo(map);
newMap.fitBounds(datalayer.getBounds());
});
</script>
@endsection