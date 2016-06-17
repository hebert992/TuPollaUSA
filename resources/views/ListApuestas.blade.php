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
                                    <th>ID Polla</th>
                                    <th>Stud</th>
                                    <th>Verificar</th>
                                    <th>Fecha y Hora</th>



                                </tr>
                                @foreach( $apuestas as $apuesta)
                                    <tr>
                                        <td>{{$apuesta->id_apuesta}}</td>
                                        <td>{{\Illuminate\Foundation\Auth\User::findOrFail($apuesta->id_cliente)->nick}}</td>
                                        <td><a href="{{url("/verificar/$apuesta->id_apuesta")}}" >Verificar</a></td>
                                        <td>{{$apuesta->created_at}}</td>

                                    </tr>
                                @endforeach
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
