@extends('layouts.app2')

@section('content')
    @include("parcial.Mensajes")


        <div class="panel-body">
            <b> Selecciona un caballo para Cada una de las carreras verifica tu seleccion y cuando estes listo dale al boton enviar polla </b>
        </div>
    <form action="{{url("/apuestas")}}" method="post">
        {{csrf_field()}}
    <input type="hidden" class="form-control" name="id_nada" value="{{ $count=0 }}">
    <input type="hidden" class="form-control" name="id_cliente" value="{{Auth::user()->id}}">
    @foreach($pollas as $polla)
        <div class="panel panel-default">
            <div class="panel-heading">Carrera {{$polla->id_polla}} {{$polla->hipodromo}}   TupollaUSA.com {{$polla->fecha}} </div>
            <input type="hidden" class="form-control" name="id_nada" value="{{ $count+=1 }}">
            <input type="hidden" class="form-control" name="id_polla{{$count}}" value="{{ $polla->id_polla }}">

            <div class="panel-body">
                <p>
                    Seleccione el caballo de su preferencia para esta carrera
                </p>
                <select id="id{{$count}}"class="form-control" name="id_caballo{{$count}}" >
                    @foreach($caballos as $caballo)
                    @if($polla->id_polla === $caballo->id_polla)
                    <option value="{{$caballo->id_caballo}}">{{$caballo->posicion}}</option >
                    @endif
                    @endforeach
                </select>
                <div class="panel-body" id="body{{$count}}">

                </div>

            </div>



        </div>
    @endforeach
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    <i class="btn-lg">APOSTAR!</i>
                    <br>
                </button>
            </div>
        </div>

    </form>

    <script src="{{asset('js/caballos.js')}}"></script>
@endsection