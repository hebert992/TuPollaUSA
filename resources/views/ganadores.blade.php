@extends('layouts.app2')
@include("parcial.Mensajes")
@section('content')
    <table class="table table-hover">

        <tr>

            <td><h3>Posicion</h3></td>
            <td><h3>Nick</h3></td>
            <td><h3>Puntos</h3></td>
            <td><h3>ID Apuesta</h3></td>
        </tr>

            @foreach($definitiva as $definitivas)
            <tr>
            <td>{{$final+=1 }}</td>
            <td>{{$definitivas[0]}}</td>
            <td>{{$definitivas[1]}}</td>
            <td>{{$definitivas[2]}}</td>
        </tr>
            @endforeach


    </table>
@endsection

