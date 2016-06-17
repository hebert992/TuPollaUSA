@extends('layouts.app2')

@section('content')
    @include("parcial.Mensajes")

<center>


    <p>
    <h3 class="text-center">Programacion</h3>
    A continuacion se publican las carreras en las que se jugara la polla esta semana; se les recuerda a nustros distinguidos clientes que la polla se juagara el sabado en las ultimas 6 carreras del Hipodromo Gulfstream Park
    </p>
    <input type="hidden" class="form-control" name="id_nada" value="{{ $count1=0 }}">
@foreach($pollas as $polla)
    <input type="hidden" class="form-control" name="id_nada" value="{{ $count=0 }}">
        <input type="hidden" class="form-control" name="id_nada" value="{{ $count1++ }}">

        <li class="dropdown">
            <a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown"> Carrera {{$polla->caballos_numero}} {{$polla->hipodromo}}  TupollaUSA.com  <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>

                    <div class="panel panel-default">

                        <div class="panel-body">
                            <ul>
                                <li><b>Fecha y Hora:</b> {{$polla->fecha}}</li>
                                <li><b>Tipo de Carrera:</b> {{$polla->name}}</li>
                                <li><b>Purse:</b> ${{$polla->pago}}</li>
                                <li><b>Distancia:</b> {{$polla->distancia}}</li>
                                <li><b>Terrerno:</b> {{$polla->terreno}}</li>
                            </ul>
                        </div>


                        <table class="table table-striped table-hover">
                            <tr>
                                <td><b>Puerta</b></td>
                                <td><b>Caballo</b></td>
                                <td><b>Dueño</b></td>
                                <td><b>Jinete</b></td>
                                <td><b>Entrenador</b></td>
                                <td><b>Peso</b></td>
                                <td><b>MI</b></td>

                            </tr>

                                @foreach($caballos as $caballo)
                                    @if($caballo->id_polla===$polla->id_polla)
                                    <tr>
                                        <input type="hidden" class="form-control" name="id_nada" value="{{ $count+=1 }}">
                                <td class="caballo{{$count}}"><b>{{$count}}</b></td>
                                <td>{{$caballo->name}}</td>
                                <td>{{$caballo->propietario}}</td>
                                <td>{{$caballo->jinete}}</td>
                                <td>{{$caballo->entrenador}}</td>
                                <td>{{$caballo->peso}}</td>
                                <td>{{$caballo->mi}}</td>
                                    </tr>
                                    @endif
                                @endforeach


                        </table>
                    </div>
                </li>
            </ul>
        </li>

@endforeach
    <br>
@endsection