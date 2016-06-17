@extends('layouts.app2')
@include("parcial.Mensajes")
@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Tabla de ganadores</div>
        <div class="panel-body">
    <table class="table table-hover">

        <tr>

            <td><h4>Posicion</h4></td>
            <td><h4>Nick</h4></td>
            <td><h4>Puntos</h4></td>
            <td><h4>ID Apuesta</h4></td>
        </tr>

            @foreach($definitiva as $definitivas)
            <tr>
            <td>{{$final+=1 }}</td>
            <td>{{$definitivas[0]}}</td>
            <td>{{$definitivas[1]}}</td>
            <td> <a href="{{url("/verificar/".$definitivas[2])}}">{{$definitivas[2]}}</a></td>
        </tr>
            @endforeach


    </table>
        </div>
    </div>
@endsection

