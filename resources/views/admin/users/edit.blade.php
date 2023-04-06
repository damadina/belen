@extends('adminlte::page')
@section('title', 'Administración')



@section('content_header')
    <h1>Modifar datos trabajador</h1>
@stop



@section('content')
@section('content')
    @if(session('info'))
    <div class="alert alert-primary" role="alert">
        <strong>OK!   </strong> {{session('info')}}

    </div>
@endif


<div class="card">
    <div class="card-body">
        {!! Form::model($user,['route' => ['admin.users.update',$user], 'method' => 'put']) !!}
                @include('admin.users.partials.form')

                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary mt-2']) !!}
        {!! Form::close() !!}

    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')

@stop
