@extends('adminlte::page')
@section('title', 'Administración')
@section('plugins.Sweetalert2',true)
@section('content_header')
    <h1>Borradores </h1>
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-primary" role="alert">
            <strong>OK!   </strong> {{session('info')}}
        </div>
    @endif
    <div class="container table-wrapper-scroll-y my-custom-scrollbar ">
        <table class=" table table-striped mt-10 ">
            <thead>
            <tr>

                <th scope="col">Fecha</th>
                <th scope="col">Nombre</th>
                <th scope="col"></th>

            </tr>
            </thead>
            <tbody>

                    @foreach ($borradores as $item )
                        <tr>
                            @php
                                $t = strtotime($item->fecha);
                                $date = date('D d-M-Y',$t);
                            @endphp
                            <td>{{$date}}</td>
                            <td>{{$item->name}}</td>
                            <td class="flex">
                                <button type="button" class="btn btn-primary">Editar</button>
                                <form action="{{route('admin.rrhh.destroy',$item->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger ml-2">Eliminar</button>
                                </form>
                            </td>
                        </tr>

                    @endforeach

            </tbody>
        </table>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @vite(['resources/css/app.css', 'resources/css/common.css','resources/js/app.js'])
   <style>
    .my-custom-scrollbar {
        position: relative;
        height: 400px;
        overflow: auto;
        }
        .table-wrapper-scroll-y {
        display: block;
        }
    </style>
@stop

@section('js')
    <script>
        Livewire.on('deleteTrabajo', plantillaId => {

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

                        Livewire.emitTo('admin-ttrabajo','delete',plantillaId);

                        Swal.fire(
                        'Eliminado',
                        'El trabajo ha sido eliminado correctamente',
                        'success'
                        )
                    }
                })

        })



    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
@stop
