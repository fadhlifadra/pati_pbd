@extends('adminbsb.main')

@section('content')
<!-- @php $group = 'laporan'; $page = 'data_marker'; @endphp -->
<div class="container-fluid">
    <!-- Basic Validation -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Tindak Lanjut</h2>
                </div>
                <div class="body">
                    {!! Form::model($data, ['url' => route('data_marker.update',$data->id),
                        'method' => 'put']) !!}
                        @include('data_marker._form')
                    {!! Form::close() !!}
                </div>
                <div class="footer bg-pink">
                <br>
            </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Validation -->
</div>
@endsection