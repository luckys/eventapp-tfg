@extends('admin.master')

@section('content')

    <!--body wrapper start-->
    <div class="wrapper">

        <div class="row">
            <div class="col-md-4">
                @include('admin.partials.message')
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-body">
                                <div class="profile-pic text-center">
                                    <img alt="" src="{{ asset('uploads/profiles/'.auth()->user()->photo) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-body">
                                <ul class="p-info">
                                    <li>
                                        <div class="title">Nombre</div>
                                        <div class="desk">{{ auth()->user()->firstname }}</div>
                                    </li>
                                    <li>
                                        <div class="title">Apellidos</div>
                                        <div class="desk">{{ auth()->user()->lastname }}</div>
                                    </li>
                                    <li>
                                        <div class="title">Correo</div>
                                        <div class="desk">{{ auth()->user()->email }}</div>
                                    </li>
                                    <li>
                                        <div class="title">Compañia</div>
                                        <div class="desk">{{ auth()->user()->company }}</div>
                                    </li>
                                </ul>
                                <br>
                                <a class="btn btn-primary pull-right" href="{{ url('admin/auth/user/profile/edit') }}" role="button">Actualizar Perfil</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-body">
                                <div class="profile-desk">
                                    <h1>{{ auth()->user()->fullname }}</h1>
                                    <span class="designation">{{ auth()->user()->company }}</span>
                                    <p>{{ auth()->user()->biography }}</p>
                                    <a class="btn p-follow-btn pull-left" href="#"> <i class="fa fa-check"></i> Following</a>

                                    <ul class="p-social-link pull-right">
                                        <li class="active">
                                            <a href="{{ auth()->user()->url_github }}" target="_blank">
                                                <i class="fa fa-github"></i>
                                            </a>
                                        </li>
                                        <li class="active">
                                            <a href="{{ auth()->user()->url_twitter }}" target="_blank">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection