@extends('adminlte::page')
@section('title', 'Personal')
@section('plugins.Sweetalert2',true)
@section('content_header')
    <h1>Generador partes de trabajo</h1>
@stop

@section('content')
@if(session('info'))
<div class="alert alert-primary" role="alert">
    <strong>OK!   </strong> {{session('info')}}

</div>


@endif


<div class="container pt-10  ">
   @livewire('admin-genera')
</div>












@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @vite(['resources/css/app.css', 'resources/css/common.css','resources/js/app.js'])
@stop

@section('js')
<script>
    Livewire.on('generaClick', fechaDesde => {

    Swal.fire({
        title: 'Crear partes de trabajo para los siguientes días',
        text:  fechaDesde,
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, generar!'
        }).then((result) => {

            if (result.value == true) {

                Livewire.emitTo('admin-genera','genera',fechaDesde);

                /* Swal.fire(
                'Eliminado',
                'El trabajo ha sido eliminado correctamente',
                'success'
                ) */
            }
    })

    })

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
@stop
