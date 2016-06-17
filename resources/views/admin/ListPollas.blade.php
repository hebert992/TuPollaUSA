@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    @include("parcial.Mensajes")
                    <div class="panel-heading">Lista de Pollas</div>

                    <div class="panel-body">


                        <div class="panel-body">

                            @if( Auth::user()->rol=="admin")
                                <a class="btn btn-info" href="{{ url('/admin/add/polla') }}" role="button">
                                    Nueva Carrera
                                </a>
                            @endif


                            <form class="navbar-form navbar-right" role="search"method="GET" >

                                <input type="text" class="form-control"  name="name"  placeholder="Buscar tipo de polla"  >

                                <button type="submit" class="btn btn-default">Buscar</button>
                            </form>


                        <table class="table table-striped">



                            <tr>
                                <th>Tipo</th>
                                <th>Hipodromo</th>
                                <th>Terreno</th>
                                <th>Pago</th>
                                <th>Fecha y Hora</th>

                                <th>Distancia</th>
                                <th>Acciones</th>


                            </tr>
                            @foreach( $pollas as $polla)
                                <tr>
                                    <td>{{$polla->name}}</td>
                                    <td>{{$polla->hipodromo}}</td>
                                    <td>{{$polla->terreno}}</td>
                                    <td>{{$polla->pago}}</td>
                                    <td>{{$polla->fecha}}</td>
                                    <td>{{$polla->distancia}}</td>

                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Herramientas <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{url("/admin/polla/$polla->id_polla/caballos")}}">Caballos</a></li>
                                                <li><a href="{{url("/admin/add/caballo/$polla->id_polla")}}">Agregar Caballos</a></li>
                                                <li><a href="{{url("/admin/add/resultado/$polla->id_polla")}}">Agregar Resultados</a></li>
                                                <li role="separator" class="divider"></li>
                                                <li><a href="{{url("/admin/polla/editar/$polla->id_polla")}}">Editar Carrera</a></li>

                                            </ul>

                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
