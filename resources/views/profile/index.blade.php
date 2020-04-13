@extends('adminbsb.main')

@section('content')
@php $group = 'home'; $page = 'profile'; @endphp
<div class="container-fluid">
    <!-- Basic Validation -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Edit Profile</h2>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="material-icons">library_books</i> Edit Profile
                        </li>
                    </ol>
                </div>
                <div class="body">
                    {!! Form::model($user, ['url' => route('profile.update', $user->id),
                        'method' => 'put' , 'id' => 'form_validation']) !!}
                        @include('profile._form')
                    {!! Form::close() !!}
                </div>
                <div class="footer bg-red">
                <br>
            </div>
        </div>
    </div>
    <!-- #END# Basic Validation -->
</div>
@endsection
