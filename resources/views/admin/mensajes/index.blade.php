@extends('adminlte::page')
@section('title', 'Personal')
@section('plugins.Sweetalert2',true)
@section('content_header')
    <h1>Lista de Mensajes Coorporativos</h1>
@stop

@section('content')
    @if(session('info'))
    <div class="alert alert-primary" role="alert">
        <strong>OK!   </strong> {{session('info')}}

    </div>


    @endif


   <div class="card">
    <div class="card-header">
        <a href="{{route('admin.mensajes.create')}}">Nuevo Mensaje</a>
    </div>

    <div class="car-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>FECHA</th>
                    <th>MENSAJE</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mensajes as $mensaje )

                    <tr>
                        <td>{{$mensaje->creado}}</td>
                        <td>{{$mensaje->mensaje}}</td>

                        <td width="10px">
                            <a class="btn btn-secondary"  href="{{route('admin.mensajes.edit',$mensaje)}}">Editar</a>
                        </td>

                        <td width="10px">
                            <form class="formulario-eliminar" action="{{route('admin.mensajes.destroy',$mensaje)}}" method="POST">
                                 @method('delete')
                                 @csrf
                                <button class="btn btn-danger" type="submit">Eliminar</button>
                            </form>
                        </td>
                @empty
                    <tr>
                        <td colspan="4">No hay mensaje refistrado</td>
                    </tr>
                @endforelse

            </tbody>



        </table>
    </div>
   </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
@if(session('eliminar') == 'ok')
<script>

    Swal.fire(
        'Eliminado',
        'El trabajador ha sido eliminado correctamente',
        'success'
        )
</script>


@endif






<script>
    $('.formulario-eliminar').submit(function(e){
        e.preventDefault();
        Swal.fire({
            title: 'Estás seguro',
            text: "Quieres eliminar este mensaje ",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {

                if (result.value == true) {

                    /* Swal.fire(
                    'Eliminado',
                    'El trabajador ha sido eliminado correctamente',
                    'success'
                    ) */
                    this.submit();
                }
        })

    });








</script>
@stop

