@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Lista de usuario</div>
                @if(Session::has('flash_danger'))

                    <div class="alert alert-danger" role="alert">{{Session::get('flash_danger')}}</div>


                @endif

                @if(Session::has('flash_success'))

                    <div class="alert alert-success" role="alert">{{Session::get('flash_success')}}</div>
                    {{Session::flush()}}

                @endif
                     <div class="panel-body">
                         <form class="navbar-form navbar-right" role="search"method="GET" >
                             <div class="form-group">
                                 <input type="text" class="form-control"  name="name"  placeholder="Nombre del cliente"  >
                             </div>
                             <button type="submit" class="btn btn-default">Buscar</button>
                         </form>
                         <table class="table table-striped">



                             <tr>
                                 <th>ID</th>
                                 <th>Nombre</th>
                                 <th>Correo</th>
                                 <th>Acciones</th>
                                 
                             </tr>
                             @foreach( $users as $user)
                             <tr>
                                 <td>{{$user->id}}</td>
                                 <td>{{$user->name}}</td>
                                 <td>{{$user->email}}</td>
                                 <td>
                                     <div class="btn-group">
                                         <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                             Herramientas <span class="caret"></span>
                                         </button>
                                         <ul class="dropdown-menu">
                                             <li><a href="/admin/recarga/{{$user->id}}">Recarga</a></li>
                                             <li><a href="">Editar</a></li>
                                             <li><a href="#">Suspender</a></li>
                                             <li role="separator" class="divider"></li>
                                             <li><a href="#">Eliminar</a></li>
                                         </ul>
                                     </div>

                                 </td>
                             </tr>
                             @endforeach
                         </table>
                         
                         {!!$users->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
