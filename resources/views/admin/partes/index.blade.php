@extends('adminlte::page')
@section('title', 'Personal')
@section('plugins.Sweetalert2',true)
@section('content_header')
    <h1>PARTES DE TRABAJO</h1>
    Trabajo: {{$trabajo->name}}
@stop

@section('content')
@if(session('info'))
    <div class="alert alert-primary" role="alert">
        <strong>OK!   </strong> {{session('info')}}

    </div>
@endif
    @livewire('master-partes-list',['trabajo' => $trabajo])
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @vite(['resources/css/app.css', 'resources/css/common.css','resources/js/app.js'])





@stop

@section('js')
    <script>
        Livewire.on('deleteT', trabajo => {

            Swal.fire({
                title: 'Estás seguro?',
                text: "!! Con la eliminación del trabajo se elimirán todas las tareas !!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonText: 'NO',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, borralo!'
                }).then((result) => {

                    if (result.value == true) {

                        Livewire.emitTo('master-trabajos-list','deleteTrabajo',trabajo);

                        Swal.fire(
                        'Eliminado',
                        'El trabajo ha sido eliminado correctamente',
                        'success'
                        )
                    }
            })

        })

        /* Livewire.on('deleteTarea', tareaId => {

            Swal.fire({
                title: '¿Estás seguro?. Esta acción no se puede revertir',
                text: "Vas ha eliminar la tarea",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, borralo!'
                }).then((result) => {

                    if (result.value == true) {

                        Livewire.emitTo('admin-ttarea','delete',tareaId);

                        Swal.fire(
                        'Tarea eliminado',
                        'La tarea ha sido eliminado correctamente',
                        'success'
                        )
                    }
                })

        }) */



    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
@stop
