@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Lista de recargas</div>
                   @include("parcial.Mensajes")
                    <div class="panel-body">

                        @if( Auth::user()->rol=="admin")
                            <a class="btn btn-info" href="{{ url('/admin/registro') }}" role="button">
                                Nueva Tienda
                            </a>
                        @endif
                        @if( Auth::user()->rol=="tienda")
                            <a class="btn btn-info" href="{{ url('/tienda/registro') }}" role="button">
                                Nuevo usuario
                            </a>
                        @endif

                        <form class="navbar-form navbar-right" role="search"method="GET" >

                            <input type="text" class="form-control"  name="name"  placeholder="Nombre del cliente"  >

                            <button type="submit" class="btn btn-default">Buscar</button>

                        </form>

                            <form class="navbar-form navbar-right" role="search"method="GET" >

                                <input type="text" class="form-control  datepicker" placeholder="Desde " name="date1" value="{{ old('date1') }}">
                                <input type="text" class="form-control  datepicker" placeholder="Hasta " name="date2" value="{{ old('date2') }}">

                                <button type="submit" class="btn btn-default">Buscar</button>

                            </form>


                        <table class="table table-striped">



                            <tr>
                                <th>Para</th>
                                <th>Tienda</th>
                                <th>Fecha</th>
                                <th>Monto BSF</th>
                                <th>Tipo</th>
                                <th>Acciones</th>

                            </tr>
                            @foreach( $recargass as $recargas)
                                    <!-- Modal -->
                            <div class="modal fade" id="detalles{{ $recargas->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="exampleModalLabel">Informacion detalla de la recarga</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label class="col-md-4 control-label">ID De la Transaccion</label>
                                                    <input type="text" class="form-control" name="id" value="{{ $recargas->id }}" readonly>
                                                </div>
                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label class="col-md-4 control-label">ID del Stud</label>
                                                    <input type="text" class="form-control" name="id" value="{{ $recargas->id_cliente }}" readonly>
                                                </div>
                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label class="col-md-4 control-label">Transaccion a favor de </label>
                                                    <input type="text" class="form-control" name="id" value="{{ $recargas->nick }}" readonly>
                                                </div>
                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label class="col-md-4 control-label">Monto</label>
                                                    <input type="text" class="form-control" name="id" value="{{ $recargas->monto }}" readonly>
                                                </div>
                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label class="col-md-4 control-label">Tipo</label>
                                                    <input type="text" class="form-control" name="id" value="{{ $recargas->tipo }}" readonly>
                                                </div>
                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label class="col-md-4 control-label">Referencia</label>
                                                    <input type="text" class="form-control" name="id" value="{{ $recargas->referencia}}" readonly>
                                                </div>
                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label class="col-md-4 control-label">Stud que realizo la recarga</label>
                                                    <input type="text" class="form-control" name="id" value="{{ $recargas->master }}" readonly>
                                                </div>
                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label class="col-md-4 control-label">Fecha y Hora de Recarga</label>
                                                    <input type="text" class="form-control" name="id" value="{{ $recargas->created_at }}" readonly>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->

                            <div class="modal fade" id="recarga{{$recargas->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Seguro de Eliminar esta recarga</h4>
                                        </div>
                                        <div class="modal-body">

                                            <form class="row" method="post" action="{{ url('/admin/borrar/recarga') }}">


                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label class="col-xs-8 .col-sm-6 control-label">ID Recarga </label>
                                                    <input type="text" class="form-control  .col-xs-4 .col-sm-6" name="id_transaccion" value="{{$recargas->id}}" readonly>
                                                </div>
                                                {!! csrf_field() !!}
                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label class="col-xs-8 .col-sm-6 control-label">De</label>
                                                    <input type="text" class="form-control  .col-xs-4 .col-sm-6" name="master" value="{{ $recargas->master}}" readonly>
                                                </div>
                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label class="col-xs-8 .col-sm-6 control-label">Para</label>
                                                    <input type="text" class="form-control  .col-xs-4 .col-sm-6" name="nick" value="{{ $recargas->nick}}" readonly>
                                                </div>
                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label class="col-xs-8 .col-sm-6 control-label">Monto</label>
                                                    <input type="text" class="form-control  .col-xs-4 .col-sm-6" name="monto" value="{{ $recargas->monto}}" readonly>
                                                </div>




                                        </div>
                                        <div class="modal-footer">

                                            <button type="submit" class="btn btn-primary">Eliminar Recarga</button>
                                            </form>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

                                <tr>
                                    <td>{{$recargas->nick}}</td>
                                    <td>{{$recargas->master}}</td>
                                    <td>{{$recargas->created_at}}</td>
                                    <td>{{$recargas->monto}}</td>
                                    <td>{{$recargas->tipo}}</td>

                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Herramientas <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a data-toggle="modal" data-target="#detalles{{ $recargas->id }}" href="#">Detalles</a></li>

                                                <li role="separator" class="divider"></li>
                                                <li><a data-toggle="modal" data-target="#recarga{{ $recargas->id }}" href="#">Eliminar</a></li>
                                            </ul>

                                        </div>

                                    </td>
                                </tr>

                            @endforeach
                        </table>


                        {!!$recargass->render() !!}
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
