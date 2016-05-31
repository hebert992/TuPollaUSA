@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Recarga para {{$usuario->name}} </div>
                     <div class="panel-body">
                         @if(Session::has('flash_danger'))

                             <div class="alert alert-danger" role="alert">{{Session::get('flash_danger')}}</div>
                         @endif
                         <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/recarga') }}">
                             {!! csrf_field() !!}
                             <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                 <label class="col-md-4 control-label">ID del Usuario</label>

                                 <div class="col-md-6">
                                     <input type="text" class="form-control" name="id" value="{{ $usuario->id }}" readonly>

                                 </div>
                             </div>
                             <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                 <label class="col-md-4 control-label">Nombre</label>

                                 <div class="col-md-6">
                                     <input type="text" class="form-control" name="name" value="{{ $usuario->name }}" readonly>


                                 </div>
                             </div>
                             <div class="form-group{{ $errors->has('nick') ? ' has-error' : '' }}">
                                 <label class="col-md-4 control-label">Nick</label>

                                 <div class="col-md-6">
                                     <input type="text" class="form-control" name="nick" value="{{ $usuario->nick }}" readonly>


                                 </div>
                             </div>

                             <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                 <label class="col-md-4 control-label">Correo</label>

                                 <div class="col-md-6">
                                     <input type="email" class="form-control" name="email" value="{{ $usuario->email }} " readonly>


                                 </div>
                             </div>

                             <div class="form-group{{ $errors->has('monto') ? ' has-error' : '' }}">
                                 <label class="col-md-4 control-label">Monto BSF</label>

                                 <div class="col-md-6">
                                     <input type="text" class="form-control" name="monto">
                                     @if ($errors->has('monto'))
                                         <span class="help-block">
                                        <strong>{{ $errors->first('monto') }}</strong>
                                    </span>
                                     @endif

                                 </div>
                             </div>

                             <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                                 <label class="col-md-4 control-label">Tipo de Transaccion</label>

                                 <div class="col-md-6">
                                     <select class="form-control" name="tipo">
                                         <option>Seleciona el tipo de Transaccion</option>

                                     <option>transferencia</option>
                                     <option>efectivo</option>
                                     <option>deposito</option>

                                     </select>
                                     @if ($errors->has('tipo'))
                                         <span class="help-block">
                                        <strong>{{ $errors->first('tipo') }}</strong>
                                    </span>
                                     @endif


                                 </div>
                             </div>


                             <div class="form-group{{ $errors->has('referencia') ? ' has-error' : '' }}">
                                 <label class="col-md-4 control-label">Referencia</label>

                                 <div class="col-md-6">
                                     <input type="text" class="form-control" name="referencia">

                                     @if ($errors->has('referencia'))
                                         <span class="help-block">
                                        <strong>{{ $errors->first('referencia') }}</strong>
                                    </span>
                                     @endif
                                 </div>
                             </div>

                             <div class="form-group">
                                 <div class="col-md-6 col-md-offset-4">
                                     <button type="submit" class="btn btn-primary">
                                         <i class="fa fa-btn fa-user"></i>Recargar
                                     </button>
                                 </div>
                             </div>
                         </form>
                            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


