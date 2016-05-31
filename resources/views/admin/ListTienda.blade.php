@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Lista de usuario</div>

                    <div class="panel-body">

                        @if( Auth::user()->rol=="admin")
                            <a class="btn btn-info" href="{{ url('/admin/registro') }}" role="button">
                                Nueva Tienda
                            </a>
                        @endif
                        @if( Auth::user()->rol=="tienda")
                            <a class="btn btn-info" href="{{ url('/tienda/registro') }}" role="button">
                                Nuevo usuario
                            </a>
                        @endif

                        <form class="navbar-form navbar-right" role="search"method="GET" >

                            <input type="text" class="form-control"  name="name"  placeholder="Nombre del cliente"  >

                            <button type="submit" class="btn btn-default">Buscar</button>
                        </form>
                        <table class="table table-striped">



                            <tr>
                                <th>ID</th>
                                <th>Stud</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Coins</th>
                                @if( Auth::user()->rol=="admin")
                                    <th>Creado por</th>
                                @endif
                                <th>Acciones</th>

                            </tr>
                            @foreach( $users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->nick}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->coins}}</td>
                                    @if( Auth::user()->rol=="admin")
                                        <td>{{$user->id_master}}-{{$user->master}}</td>
                                    @endif

                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Herramientas <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="/admin/tiendas/{{$user->id}}">Ultimos movimientos</a></li>
                                                <li><a href="">Editar</a></li>
                                                <li><a href="#">Suspender</a></li>
                                                <li role="separator" class="divider"></li>
                                                <li><a href="#">Eliminar</a></li>
                                            </ul>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </table>

                        {!!$users->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
