@extends('adminbsb.main')

@section('content')
<!-- @php $group = 'laporan'; $page = 'data_marker'; @endphp -->
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div id="mapid" style="width: 100%; height: 500px;"></div>

<script>
var curlocation = [0,0];
if(curlocation[0]==0 && curlocation[1]==0){
curlocation = [-6.75347, 111.03999]
}

var map = L.map('mapid').setView([-6.75347, 111.03999], 12);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
id: 'mapbox/streets-v11'
}).addTo(map);






map.attributionControl.setPrefix(false);
var marker = new L.marker(curlocation,{
draggable:'true'
});

marker.on('dragend', function(event){
var position = marker.getLatLng();
marker.setLatLng(position).update();
$("#Latitude").val(position.lat);
$("#Longitude").val(position.lng).keyup;
});

$("#Latitude, #Longitude").change(function(){
var position = [parseInt( $("#Latitude").val()), parseInt( $("#Longitude").val())];
marker.setLatLng(position,{
draggable:'true'
}).bindPopup(position).update();
map.panTo(position);
});
map.addLayer(marker);




</script>



<div class="body">
    {!! Form::open(['url' => route('data_marker.store'),
        'method' => 'post','files' => 'true' ]) !!}
        <div class="form-grup">
            <label for="">Latitude : </label>
            <input type="text" class="form-control" name="latitude" id="Latitude">
        </div>
        <div class="form-grup">
            <label for="">Longitude : </label>
            <input type="text" class="form-control" name="longitude" id="Longitude">
        </div>
        <div class="form-grup">
            <label for="">Nama : </label>
            <input type="text" class="form-control" name="nama" id="Nama">
        </div>
        <br>
        <div style="float: right;">
            {!! Form::submit ('Simpan',['class'=>'btn btn-primary btn-lg waves-effect']) !!}
        </div>
    {!! Form::close() !!}
</div>


@endsection
