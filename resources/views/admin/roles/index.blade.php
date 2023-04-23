@extends('adminlte::page')
@section('title', 'Personal')

@section('content_header')
    <h1>Lista de Roles</h1>
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-primary" role="alert">
            <strong>OK!   </strong> {{session('info')}}

        </div>
    @endif

    @livewire('roles-list')


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @vite(['resources/css/app.css', 'resources/css/common.css','resources/js/app.js'])


@stop

@section('js')
<script>
    Livewire.on('deleteRole', role => {

        Swal.fire({
            title: 'Estás seguro?',
            text: "Eliminación de rol",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, borralo!'
            }).then((result) => {

                if (result.value == true) {

                    Livewire.emitTo('roles-list','delete',role);

                    Swal.fire(
                    'Eliminado',
                    'El rol ha sido eliminado correctamente',
                    'success'
                    )
                }
            })

    })



</script>
@stop
