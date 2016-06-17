<div>
    <script src="{{asset('ckeditor\ckeditor.js')}}"></script>
    <script src="{{asset('ckeditor\samples\js\sample.js')}}"></script>

    <link rel="stylesheet" href="{{asset(('ckeditor\samples\css\sample.css'))}}">

    <!--- Titulo Field --->

    {!! Form::label('titulo', 'Titulo:') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control']) !!}


<!--- Contenido Field --->

    {!! Form::label('contenido', 'Contenido:') !!}
    {!! Form::textarea('contenido', null, ['class' => 'form-control','id' => 'editor']) !!}


<!--- Autor Field --->

    {!! Form::label('autor', 'Autor:') !!}
    {!! Form::text('autor', null, ['class' => 'form-control','readonly' => 'readonly' ])!!}



<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>
    <script>
        initSample();
    </script>
