@extends('adminbsb.main')

@section('content')
<!-- @php $group = 'master'; $page = 'user'; @endphp -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Beranda Data Armada
                    </h2>

                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <p><a class="btn bg-green waves-effect" href="{{ route('user.create') }}"> <i class="material-icons">person_add</i> <span><b>Tambah User</b></span></a> </p>
                            <div class="table-responsive">
                                {!! $dataTable->table(['class' => 'table-striped', 'width' => '100%']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer bg-red">
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