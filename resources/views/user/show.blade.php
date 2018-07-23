@extends('layouts.main')

@section('title', $user->name)
@section('type', 'profile-page sidebar-collapse')

@section('content')
    <div class="page-header header-filter" data-parallax="true" style=" background-image: url('../assets/img/kit/cita.jpg'); "></div>
    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 ml-auto mr-auto">
                        <div class="profile">
                            <div class="avatar">
                                <img id="photo" src="http://www.cuvalles.udg.mx/spec/Fotos/{{ $user->name }}.jpg"
                                     onerror="this.src='{{ asset('assets/img/blank_user.png') }}';"
                                     class="img-raised rounded-circle img-fluid"
                                     style="object-fit: cover; object-position: center; height: 160px; width: 160px">
                            </div>
                            <div class="name">
                                <h3 class="title">{{ $user->name }}</h3>
                                <h6>{{ $user->email }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="content">
                    <div class="description text-center">
                        <h6 style="color: #3C4858;">Creado el:</h6>
                        <p>
                            {{ $user->created_at }}
                        </p>
                        <h6 style="color: #3C4858;">Última modificación el:</h6>
                        <p>
                            {{ $user->updated_at }}
                        </p>
                        <a href="{{ route('user.edit', $user->id) }}">
                            <button type="button" data-toggle="tooltip" data-placement="top" class="btn btn-success" title="Editar">
                                <i class="material-icons">edit</i>
                            </button>
                        </a>
                        <a onclick="deleteInShow(event, '{{ $user->name }}', '{{ route('user.destroy', $user->id) }}', '{{ route('user.index') }}');">
                            <button type="button" data-toggle="tooltip" data-placement="top" class="btn btn-danger" title="Eliminar">
                                <i class="material-icons">delete</i>
                            </button>
                        </a>
                    </div>
                    @if(is_null($user->client))
                        <div class="col-md-12 text-center">
                            <div class="info">
                                <h4>Este usuario no tiene cliente oauth.</h4>
                            </div>
                        </div>
                    @else
                        <div class="col-md-12 text-center">
                            <div class="info">
                                <div class="icon icon-info text-center">
                                    <i class="material-icons">code</i>
                                </div>
                                <h4 class="info-title text-center">Información del alumno:</h4>
                                <h6>Clave secreta:</h6>
                                <p>
                                    {{ $user->client->secret }}
                                </p>
                                <h6>Creado el:</h6>
                                <p>
                                    {{ $user->client->created_at }}
                                </p>
                                <h6>Última modificación el:</h6>
                                <p>
                                    {{ $user->client->updated_at }}
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
                <br>
            </div>
        </div>
    </div>
@stop