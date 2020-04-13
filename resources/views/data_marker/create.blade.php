@extends('adminbsb.main')

@section('content')
<!-- @php $group = 'laporan'; $page = 'data_marker'; @endphp -->
<div class="container-fluid">
    <!-- Basic Validation -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                <img src="https://www.inka.co.id/assets/logo/logo-md.png" width="110px" align="right">
                    <h2>Laporan Monitoring Audit</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ route('data_marker.index') }}">
                                <i class="material-icons">library_books</i> Beranda Laporan Monitoring     
                            </a>
                        </li>
                        <li class="active">
                            <i class="material-icons">library_books</i> Tambah Laporan Monitoring Audit
                        </li>
                    </ol>
                </div>
                <div class="body">
                    {!! Form::open(['url' => route('data_marker.store'),
                        'method' => 'post','files' => 'true' ]) !!}
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