@extends('adminlte::page')
@section('title', 'Administración')

@section('content_header')
    <h1>Crear nueva categoria</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' =>'admin.categorias.store']) !!}
                    @include('admin.categorias.partials.form')

                    {!! Form::submit('Crear Categoria', ['class' => 'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}

        </div>
    </div>
@stop

@section('css')


@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
