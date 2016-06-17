@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($noticias, ['route' => ['noticias.update', $noticias->id], 'method' => 'patch']) !!}

        @include('noticias.fields')

    {!! Form::close() !!}
</div>
@endsection
