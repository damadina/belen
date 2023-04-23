<div>



    <div class=" d-flex align-items-center justify-content-between mb-4">
        <div class="mb-8">
            @livewire("master-trabajos-crea")
        </div>

       {{--  <button  class="btn-sm btn-danger text-center align-middle" wire:click="openModal" >Nuevo Trabajo</button> --}}
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

                <th scope="col">Tiempo</th>
                <th scope="col" class="text-right">Acciones</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($trabajos as $item )
                    <tr>

                        <td>{{$item->name}}</td>
                        @if($item->categoria == null)
                            <td>Sin categoría</td>
                        @else
                            <td>{{$item->categoria->name}}</td>
                        @endif

                        <td>0</td>
                        <td class="text-right flex justify-end items-center">
                            {{-- <a href="{{route('admin.trabajos.edit',$item)}}"><i class="cursor-pointer fa-lg text-primary fas fa-edit" ></i></a> --}}
                           {{--  <i class="cursor-pointer fa-lg fas text-danger fa-eraser mr-2" wire:click="deleteTrabajo({{$item}})"></i> --}}

                           <i class="cursor-pointer fa-lg text-primary fas fa-edit" ></i></a>
                           <i class="cursor-pointer fa-lg fas text-danger fa-eraser mr-2" wire:click="$emit('deleteT',{{$item}})"></i>

                           <a href="{{route('admin.partes',$item)}}" class="btn-sm btn-primary"><i class="fa fa-cog"></i> | Tareas</a>
                          {{-- @livewire('master-tareas-list',['trabajo' => $item], key($item->id)) --}}

                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    @else


            @if($categoriaSelect == 1)
            <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                <p class="font-bold">No hay ningún trabajo creado </p>
                <p>Empieza a crearlos.</p>
            </div>
            @else
            <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                <p class="font-bold">No hay ningún trabajo creado para esta categoría</p>
                <p>Empieza a crearlos.</p>
            </div>
            @endIf

    @endif

    <x-dialog-modal wire:model="modalOpen">
        <x-slot name="title">
           NUEVO TRABAJO
           <hr>
        </x-slot>
        <x-slot name="content">
            <div class="mb-2">
                <x-label value="Nombre del tipo de trabajo" class="text-red-800"/>
                <x-input type="text" class="w-full" wire:model="name"/>
                <x-input-error for="name"/>
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
