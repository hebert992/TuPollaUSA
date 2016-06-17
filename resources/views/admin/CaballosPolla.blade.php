@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="alert alert-success" role="alert">POLLA : {{$polla->name}} -- PAGO :  {{$polla->pago}} -- FECHA :  {{$polla->fecha}}</div>
                <div class="panel panel-default">
                    @include("parcial.Mensajes")
                    <div class="panel-heading">Lista de Caballos de la polla</div>

                    <div class="panel-body">
                        <div class="panel-body">
                            <table class="table table-striped">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Propietario</th>
                                    <th>Jinete</th>
                                    <th>Peso</th>
                                    <th>MI</th>
                                    <th>Acciones</th>

                                </tr>
                                @foreach( $caballos as $caballo)
                                    <tr>
                                        <td>{{$caballo->name}}</td>
                                        <td>{{$caballo->propietario}}</td>
                                        <td>{{$caballo->jinete}}</td>
                                        <td>{{$caballo->peso}}</td>
                                        <td>{{$caballo->mi}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Herramientas <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{url("/admin/caballo/editar/$caballo->id_caballo")}}">Editar</a></li>


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