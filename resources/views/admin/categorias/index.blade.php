@extends('adminlte::page')
@section('title', 'Personal')
@section('plugins.Sweetalert2',true)
@section('content_header')
    <h1>Listado de Categorías</h1>
@stop

@section('content')
    @if(session('info'))
    <div class="alert alert-primary" role="alert">
        <strong>OK!   </strong> {{session('info')}}

    </div>


    @endif


    @livewire('categoria-list')






@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @vite(['resources/css/app.css', 'resources/css/common.css','resources/js/app.js'])


@stop

@section('js')
    <script>
        Livewire.on('deleteCategoria', categoria => {

            Swal.fire({
                title: 'Estás seguro?',
                text: "Los tipos de trabajo asocciados a esta categoria se quedan sin categoria ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonText: 'NO',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminala'
                }).then((result) => {

                    if (result.value == true) {

                        Livewire.emitTo('categoria-list','delete',categoria);

                        Swal.fire(
                        'Eliminado',
                        'El trabajo ha sido eliminado correctamente',
                        'success'
                        )
                    }
            })

        })



    </script>







@stop
