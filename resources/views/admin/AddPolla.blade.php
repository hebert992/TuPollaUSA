@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Agregando polla</div>
                    <div class="panel-body">
                        <div class="alert alert-success" role="alert">Le recordamos que el registro no se podra modificar en el futuro.</div>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/add/polla') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('id_master') ? ' has-error' : '' }}">


                                <div class="col-md-6">
                                    <input type="hidden" class="form-control" name="id_master" value="{{ Auth::user()->id }}">

                                    @if ($errors->has('id_master'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('id_master') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Tipo de Carrera</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('hipodromo') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Hipodromo</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="hipodromo" value="{{ old('hipodromo') }}">

                                    @if ($errors->has('hipodromo'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('hipodromo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('pago') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Pago</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="pago" value="{{ old('pago') }}">

                                    @if ($errors->has('pago'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('pago') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('distancia') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Distancia</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="distancia" value="{{ old('distancia') }}">

                                    @if ($errors->has('distancia'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('distancia') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('fecha') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Fecha de Corrida</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control datepicker" placeholder="1999/12/31" name="fecha" value="{{ old('fecha') }}">

                                    @if ($errors->has('fecha'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('fecha') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('hora') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Hora de la Corrida</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control time" name="hora" id="#time" placeholder="Ejemplo : 21:41:00" value="{{ old('hora') }}">

                                    @if ($errors->has('hora'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('hora') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('terreno') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Terreno</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="tipo">
                                        <option>Seleciona el Terreno de la Carrera</option>

                                        <option>arena</option>
                                        <option>grava</option>
                                        <option>sesped</option>

                                    </select>
                                    @if ($errors->has('tipo'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('tipo') }}</strong>
                                    </span>
                                    @endif


                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('caballos_numero') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Cantida de Caballos</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="caballos_numero" value="{{ old('caballos_numero') }}">

                                    @if ($errors->has('caballos_numero'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('caballos_numero') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>








                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i>Agregar Polla
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        $('.datepicker').datepicker({
            format: "yyyy/mm/dd",
            language: "es",
            autoclose: true
        });
    </script>
@endsection