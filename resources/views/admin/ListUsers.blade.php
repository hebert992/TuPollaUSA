@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel col-md-13 ">
            <div class="panel panel-default ">
                <div class="panel-heading">Lista de usuario</div>
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
                         <table class="table table-striped">



                             <tr>
                                 <th>ID</th>
                                 <th>Stud</th>
                                 <th>Nombre</th>
                                 <th>Correo</th>
                                 <th>Coins</th>
                                 @if( Auth::user()->rol=="admin")
                                     <th>Creado por</th>
                                 @endif
                                 <th>Acciones</th>
                                 
                             </tr>
                             @foreach( $users as $user)
                             <tr>
                                 <td>{{$user->id}}</td>
                                 <td>{{$user->nick}}</td>
                                 <td>{{$user->name}}</td>
                                 <td>{{$user->email}}</td>
                                 <td>{{$user->coins}}</td>
                                 @if( Auth::user()->rol=="admin")
                                     <td>{{$user->id_master}}-{{$user->master}}</td>
                                 @endif

                                 <td>
                                     <div class="btn-group">
                                         <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                             Herramientas <span class="caret"></span>
                                         </button>
                                         <ul class="dropdown-menu">
                                             <li><a href="/admin/recarga/{{$user->id}}">Recarga</a></li>
                                             <li><a href="/admin/editar/{{$user->id}}">Editar</a></li>
                                             <li role="separator" class="divider"></li>
                                             <li><a data-toggle="modal" data-target="#{{$user->id}}" href="#">Eliminar</a></li>
                                         </ul>
                                     </div>

                                 </td>
                             </tr>
                                 <!-- Small modal -->


                                 <div class="modal fade" id="{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                     <div class="modal-dialog modal-sm">
                                         <div class="modal-content">
                                             <div class="modal-header">
                                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                 <h4 class="modal-title">Seguro de Eliminar a  {{$user->nick}}</h4>
                                             </div>
                                             <div class="modal-body">

                                                 <form class="row" method="post" action="{{ url('/admin/borrar') }}">


                                                     <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                         <label class="col-xs-8 .col-sm-6 control-label">ID del Stud</label>
                                                         <input type="text" class="form-control  .col-xs-4 .col-sm-6" name="id" value="{{ $user->id}}" readonly>
                                                     </div>
                                                     {!! csrf_field() !!}
                                                     <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                         <label class="col-xs-8 .col-sm-6 control-label">Nombre Real</label>
                                                         <input type="text" class="form-control  .col-xs-4 .col-sm-6" name="name" value="{{ $user->name}}" readonly>
                                                     </div>
                                                     <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                         <label class="col-xs-8 .col-sm-6 control-label">Tipo de Usuario</label>
                                                         <input type="text" class="form-control  .col-xs-4 .col-sm-6" name="rol" value="{{ $user->rol}}" readonly>
                                                     </div>




                                             </div>
                                             <div class="modal-footer">

                                                 <button type="submit" class="btn btn-primary">Eliminar a {{$user->nick}}</button>
                                                 </form>
                                             </div>
                                         </div><!-- /.modal-content -->
                                     </div><!-- /.modal-dialog -->
                                 </div><!-- /.modal -->
                                 </div>
                             @endforeach
                         </table>
                         
                         {!!$users->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
