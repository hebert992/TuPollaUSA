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
                                    <th>Propietario</th>
                                    <th>Jinete</th>
                                    <th>Peso</th>



                                </tr>
                                @foreach( $caballos as $caballo)
                                    <tr>
                                        <td>{{$caballo->propietario}}</td>
                                        <td>{{$caballo->jinete}}</td>
                                        <td>{{$caballo->peso}}</td>

                                    </tr>
                                @endforeach
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection