@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Agregar Caballos</div>
                    <div class="panel-body">
                        <div class="alert alert-success" role="alert">Le recordamos que el registro no se podra modificar en el futuro.</div>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/caballo/editar') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('id_polla') ? ' has-error' : '' }}">


                                <div class="col-md-6">


                                    @if ($errors->has('id_master'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('id_master') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('id_polla') ? ' has-error' : '' }}">


                                <div class="col-md-6">


                                    @if ($errors->has('id_master'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('id_master') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Nombre</label>
                                <input type="hidden" class="form-control" name="id" value="{{ $caballo->id_caballo }}">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{$caballo->name }}" >

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('posicion') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Posicion</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="posicion" value="{{$caballo->posicion}}"  readonly>

                                    @if ($errors->has('posicion'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('posicion') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('propietario') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Propietario</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="propietario" placeholder="" value="{{$caballo->propietario }}">

                                    @if ($errors->has('propietario'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('propietario') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('entrenador') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Entrenador</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="entrenador" placeholder="" value="{{ $caballo->entrenador}}">

                                    @if ($errors->has('entrenador'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('entrenador') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('jinete') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Jinete</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="jinete" placeholder="" value="{{ $caballo->jinete}}">

                                    @if ($errors->has('jinete'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('jinete') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('peso') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Peso</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="peso" placeholder="132" value="{{ $caballo->peso }}">

                                    @if ($errors->has('peso'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('peso') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('mi') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">MI</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="mi" placeholder=12/1" value="{{ $caballo->mi }}">

                                    @if ($errors->has('mi'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('mi') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i>Actualizar Caballo
                                    </button>
                                </div>
                            </div>
                        </form>
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