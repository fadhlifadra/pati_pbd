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
                <div class="footer bg-pink">
                <br>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    {!! $dataTable->scripts() !!}
@endsection