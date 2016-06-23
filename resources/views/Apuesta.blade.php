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
                <button type="button" data-target="#modal" data-toggle="modal" class="btn btn-primary">
                    <i class="btn-lg">APOSTAR!</i>
                    <br>
                </button>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">CONFIRMACION</h4>
                    </div>
                    <div class="modal-body">
                        <p>Estas seguro de tu apuesta?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">APOSTAR</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </form>

    <script src="{{asset('js/caballos.js')}}"></script>
@endsection