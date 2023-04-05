@extends('adminlte::page')
@section('title', 'Administración')

@section('content_header')
    <h1>Modificar Categoria</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::model($categoria,['route' => ['admin.categorias.update',$categoria], 'method' => 'put']) !!}
                @include('admin.categorias.partials.form')

                {!! Form::submit('Actualizar Categoria', ['class' => 'btn btn-primary mt-2']) !!}
        {!! Form::close() !!}

    </div>
</div>
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
