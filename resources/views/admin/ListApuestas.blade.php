@extends('layouts.app2')
@include("parcial.Mensajes")
@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Lita de apuestas</div>
        <div class="panel-body">
            <table class="table table-hover">
               <form role="search"method="GET"  action="{{url("/admin/apuestas/list")}}">
                    <div class="col-lg-6">
                        <div class="input-group">
                            <input name="name" type="text" class="form-control" placeholder="Buscar por ID de apuesta">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit">Buscar</button>
      </span>
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                </form>
        </div><!-- /.row -->
                <tr>
                    <td><h4>#</h4></td>
                    <td><h4>Nick</h4></td>

                    <td><h4>ID Apuesta</h4></td>
                </tr>
                @foreach($apuestas as $apuesta)
                    <tr>
                        <td>{{$apuesta->id_apuesta }}</td>
                        <td>{{\App\User::findOrFail($apuesta->id_cliente)->nick}}</td>
                        <td> <a href="{{url("/verificar/".$apuesta->id_apuesta)}}">{{$apuesta->id_apuesta}}</a></td>
                    </tr>
                @endforeach


            </table>
        </div>
    </div>
@endsection

