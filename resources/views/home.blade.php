@extends('adminbsb.main')

@section('content')
@php $group = 'home'; $page = 'home'; @endphp

<div id="mapid" style="width: 100%; height: 600px;"></div>
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

        L.marker([lat , long]).addTo(map)
        .bindPopup(mark[i].nama)
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

        L.marker([lat2 , long2], {icon: redIcon}).addTo(map)
        .bindPopup(mark2[i].nama)
        .openPopup();
      
    });
  });
  


</script>
@endsection