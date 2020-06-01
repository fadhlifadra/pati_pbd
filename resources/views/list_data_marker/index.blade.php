@extends('adminbsb.main')

@section('content')
<!-- @php $group = 'laporan'; $page = 'laporan_resume'; @endphp -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                
                    <h2>
                        Data Marker
                    </h2>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="material-icons">library_books</i> Beranda Data Marker
                        </li>
                    </ol>
                </div>

                <div class="body">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            
                            <div class="table-responsive">
                                {!! $dataTable->table(['class' => 'table-striped', 'width' => '100%']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer bg-green">
                <br>
            </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="DetailModal" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Detail</h4>
            </div>
            <div id="mapid" style="width: 100%; height: 600px;"></div>
                <script>
                    var map = L.map('mapid').setView([-6.75347, 111.03999], 12);

                    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                        id: 'mapbox/streets-v11'
                    }).addTo(map);

                    
                    $.getJSON('http://127.0.0.1:8000/home/json3/', function(mark3){
                    $.each(mark, function(i, field){
                        
                        var lat=parseFloat(mark3[i].latitude);
                        var long=parseFloat(mark3[i].longitude);

                        
                        L.marker([lat , long]).addTo(map)
                        .openPopup();

                    });
                });
                </script>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    {!! $dataTable->scripts() !!}
@endsection