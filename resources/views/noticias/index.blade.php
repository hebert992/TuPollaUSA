@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')
<div class="panel panel-default">
        <div class="panel-heading">Noticias </div>
            <div class="panel-body">
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('noticias.create') !!}">Crear Noticia</a>



            @if($noticias->isEmpty())
                <div class="well text-center">No existen noticias.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Titulo</th>

			<th>Autor</th>
                    <th width="50px">Acciones</th>
                    </thead>
                    <tbody>
                     
                    @foreach($noticias as $noticias)
                        <tr>
                            <td>{!! $noticias->titulo !!}</td>

					<td>{!! $noticias->autor !!}</td>
                            <td>
                                <a href="{!! route('noticias.edit', [$noticias->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('noticias.delete', [$noticias->id]) !!}" onclick="return confirm('Are you sure wants to delete this noticias?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
</div>
@endsection