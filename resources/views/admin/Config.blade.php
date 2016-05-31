@extends('layouts.app2')

@section('content')
    @include("parcial.Mensajes")


    <div class="panel panel-default">
        <div class="panel-heading">Configuraciones de las apuestas</div>

<form action="{{url("admin/config")}}" method="POST">
{{csrf_field()}}
        <div class="panel-body">
            <p>
                Seleciona DESACTIVAR para impedir que lo usuarios puedan apostar o Activar para permitir que apuesten.
            </p>
            <select class="form-control" name="apuesta" >
                <option value="0">ACTIVAR</option >
                        <option value="1">DESACTIVAR</option >



            </select>


        </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-user"></i>Guarda Configuracion
            </button>
        </div>
    </div>
</form>


    </div>
@endsection