@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/tienda/registro') }}">
                            {!! csrf_field() !!}
                            <div class="form-group{{ $errors->has('nick') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Nombre de Usuario</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nick" value="{{ old('nick') }}">

                                    @if ($errors->has('nick'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nick') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Correo</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Nombre</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Apellido</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="apellido" value="{{ old('apellido') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('apellido') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Telefono</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="telefono" value="{{ old('telefono') }}">

                                    @if ($errors->has('telefono'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('pais') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Pais</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="pais" value="{{ old('pais') }}">

                                    @if ($errors->has('pais'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('pais') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('ciudad') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Ciudad</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="ciudad" value="{{ old('ciudad') }}">

                                    @if ($errors->has('ciudad'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('ciudad') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Direccion</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="direccion" value="{{ old('direccion') }}">

                                    @if ($errors->has('direccion'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Fecha de Nacimiento</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control  datepicker" placeholder="1992/12/31" name="date" value="{{ old('date') }}">

                                    @if ($errors->has('date'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Contraseña</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Confirmar contraseña</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i>Registrar
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