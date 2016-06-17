@extends('layouts.app')

@section('content')

<div class="container">
    <div class="panel-default">
    <div class="panel-heading"> {!! $noticias->titulo !!}</div>
        <div class="panel-body">
            {!! $noticias->contenido !!}
        </div>
        <div class="panel-footer">Publicado: {{$noticias->created_at}}
    </div>
</div>
    <br>
@endsection
