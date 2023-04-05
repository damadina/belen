@extends('adminlte::page')
@section('title', 'Administración')

@section('content_header')
    <h1>Modificar mensaje</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::model($mensaje,['route' => ['admin.mensajes.update',$mensaje], 'method' => 'put']) !!}
                @include('admin.mensajes.partials.form')

                {!! Form::submit('Actualizar mensaje', ['class' => 'btn btn-primary mt-2']) !!}
        {!! Form::close() !!}

    </div>
</div>
@stop





@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
