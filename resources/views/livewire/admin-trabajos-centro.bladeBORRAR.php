<div>
    <div class=" d-flex align-items-center justify-content-between mb-4">
        <button  class="btn-sm btn-danger text-center align-middle" wire:click="openModal" >Nuevo Trabajo</button>
        {{-- {!!Form::select('categoria',$categorias,null,['class' => 'form-control w-25', "wire:model" => 'categoriaSelect'] ) !!} --}}
        <select data-te-select-init wire:model="categoriaSelect">
            <option value="0">Todas las Categorias</option>
            @foreach ($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->name}}</option>
            @endforeach
        </select>
    </div>

    @if($trabajos->count() != 0)
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Trabajo</th>
                <th scope="col">Categoría</th>
                <th scope="col">Tareas</th>
                <th scope="col">Tiempo</th>
                <th scope="col" class="text-right">Acciones</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($trabajos as $item )
                    <tr>

                        <td>{{$item->name}}</td>
                        <td>{{$item->categoria->name}}</td>
                        <td>

                            <a  href="{{route('admin.tareas.index',$item)}}" class="btn-sm btn-primary">{{$item->tareas->count()}}<i class="fa fa-wrench ml-2"></i></a>
                        {{--  <a  class="btn-sm btn-primary " href="{{route('admin.trabajos.create')}}"><i class="mr-2 fas fa-eye"></i>{{'tareas '.$item->tareas->count()}}</a> --}}
                        </td>
                        <td>0</td>
                        <td class="text-right">
                            <a href="{{route('admin.trabajos.edit',$item)}}"><i class="cursor-pointer fa-lg text-primary fas fa-edit" ></i></a>
                           {{--  <i class="cursor-pointer fa-lg fas text-danger fa-eraser mr-2" wire:click="deleteTrabajo({{$item}})"></i> --}}
                            <i class="cursor-pointer fa-lg fas text-danger fa-eraser mr-2" wire:click="$emit('deleteT',{{$item}})"></i>

                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    @else

        <div class="alert alert-primary" role="alert">
            @if($categoriaSelect == 1)
                No hay nigún trabajo. Empieza a crearlos.
            @else
                No hay nigún trabajo con esta categoría. Empieza a crearlos.
            @endIf
        </div>
    @endif

    <x-dialog-modal wire:model="modalOpen">
        <x-slot name="title">
           NUEVO TRABAJO
           <hr>
        </x-slot>
        <x-slot name="content">
            <div class="mb-2">
                <x-label value="Nombre del tipo de trabajo" class="text-red-800"/>
                <x-input type="text" class="w-full" wire:model="nombreTipoTrabajo"/>
                <x-input-error for="nombreTipoTrabajo"/>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('modalOpen',false)">
                Cancelar
            </x-secondary-button>
            <x-danger-button class="ml-4" wire:click="saveTrabajo">
                Crear trabajo
            </x-danger-button>
        </x-slot>

    </x-dialog-modal>



</div>
