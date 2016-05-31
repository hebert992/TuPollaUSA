@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Agregar Caballos</div>
                    <div class="panel-body">
                        <div class="alert alert-success" role="alert">Le recordamos que el registro no se podra modificar en el futuro.</div>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/add/resultado') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('id_polla') ? ' has-error' : '' }}">


                                <div class="col-md-6">
                                    <input type="hidden" class="form-control" name="id_polla" value="{{ $polla->id_polla }}">

                                    @if ($errors->has('id_master'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('id_master') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('id_polla') ? ' has-error' : '' }}">


                                <div class="col-md-6">
                                    <input type="hidden" class="form-control" name="id_master" value="{{ Auth::user()->id }}">

                                    @if ($errors->has('id_master'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('id_master') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('win') ? ' has-error' : '' }}">
                                <label class="col-md-3 control-label">WIN</label>

                                <div class="col-md-4">
                                <input type="text" class="form-control"placeholder="Colocar la posicion del caballo ganador." name="win" value="{{old("win") }}" >

                                @if ($errors->has('win'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('win') }}</strong>
                                    </span>
                                @endif
                            </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="pago_win" placeholder="Pago" value="{{old("pago_win") }}" >

                                    @if ($errors->has('pago_win'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('pago_win') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('place') ? ' has-error' : '' }}">
                                <label class="col-md-3 control-label">PLACE</label>

                                <div class="col-md-4">
                                    <input type="text" class="form-control" placeholder="Colocar la posicion del caballo ganador." name="place" value="{{old("place") }}" >

                                    @if ($errors->has('place'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('place') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="pago_place" placeholder="Pago" value="{{old("pago_place") }}" >

                                    @if ($errors->has('pago_place'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('pago_place') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('show') ? ' has-error' : '' }}">
                                <label class="col-md-3 control-label">SHOW</label>

                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="show" placeholder="Colocar la posicion del caballo ganador." value="{{old("show") }}" >

                                    @if ($errors->has('show'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('show') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="pago_show" placeholder="Pago" value="{{old("pago_show") }}" >

                                    @if ($errors->has('pago_show'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('pago_show') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i>Agregar Resultados
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