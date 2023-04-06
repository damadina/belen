@extends('adminlte::page')
@section('title', 'Personal')
@section('plugins.Sweetalert2',true)
@section('content_header')
    <h1>Lista de Trabajadores</h1>
@stop

@section('content')
    @if(session('info'))
    <div class="alert alert-primary" role="alert">
        <strong>OK!   </strong> {{session('info')}}

    </div>
@endif

    @livewire('admin-user')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
    <script>
        Livewire.on('deleteUser', userId => {

            Swal.fire({
                title: 'Estás seguro?',
                text: "!! Con la eliminación del trabajador se eliminarán todos sus trabajos realizados !!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {

                    if (result.value == true) {

                        Livewire.emitTo('admin-user','delete',userId);

                        Swal.fire(
                        'Eliminado',
                        'El trabajador ha sido eliminado correctamente',
                        'success'
                        )
                    }
                })

        })



    </script>
@stop
