<div class="pt-6">

    @foreach ($trabajo->tareas as $item )
        <div class="cardt mt-6 mx-4">
            <div class="cardt-body">
                @if ($tarea->id == $item->id)
                    <div class="flex items-center">
                        <label class="w-32">Nombre</label>
                        <input wire:model='tarea.name' class="form-input w-full">
                    </div>
                    @error('tarea.name')
                            <span class="text-sm text-red-500">{{$message}}</span>
                        @enderror
                    <div class="flex items-center mt-4">
                        <label class="w-32">Mensaje</label>
                        <input wire:model='tarea.descripcion' class="form-input w-full">
                    </div>
                    @error('tarea.descripcion')
                            <span class="text-sm text-red-500">{{$message}}</span>
                        @enderror
                    <div class="mt-2 flex justify-end items-center">
                        <button class="btn btn-primary text-sm" wire:click='update'>Actualizar</button>
                        <button class="btn btn-danger text-sm ml-2" wire:click='cancel'>Cancelar</button>
                    </div>

                @else

                    <div>
                        <h1><i class="fas fa-wrench text-blue-500 mr-1"></i><strong>Tarea: </strong> {{$item->name}}</h1>
                    </div>
                    <div>
                        <p class="mt-1"><strong>Descripción: </strong>{{$item->descripcion}}
                    </div>
                    @if($tipo != "addToDia")
                        <div class="flex justify-end items-center mt-4 mb-2">

                            <i class="cursor-pointer fa-lg text-primary fas fa-edit" wire:click='edit({{$item}})'></i>
                           {{--  <i class="cursor-pointer ml-2 fa-lg fas text-danger fa-eraser" wire:click="$emit('deleteTarea',{{$item->id}})'" ></i> --}}
                            @if($trabajo->tareas->count() !=1)
                                 <i class="cursor-pointer ml-2 fa-lg fas text-danger fa-eraser" wire:click="$emit('deleteTarea',{{$item->id}})" ></i>
                                {{-- <i class="cursor-pointer ml-2 fa-lg fas text-danger fa-eraser" wire:click="delete({{$item->id}})" ></i> --}}
                            @endif
                        </div>
                    @endif
                @endif
            </div>
        </div>
    @endforeach

    @if($tipo != "addToDia")
        <div x-data='{open:false}' class="mt-4">
                <a x-show='!open' x-on:click='open = true'    class="flex items-center cursor-pointer">
                    <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
                    Agregar nueva tarea
                </a>

                <div x-show='open' class="cardt mt-6 mx-4">
                    <div class="cardt-body">
                        <p class="text-lg font-bold mb-4">Nueva tarea</p>


                        <div class="flex items-center">
                            <label class="w-32">Nombre</label>
                            <input wire:model='name' class="form-input w-full">
                        </div>
                        @error('name')
                            <span class="text-sm text-red-500">{{$message}}</span>
                        @enderror
                        <div class="flex items-center mt-4">
                            <label class="w-32">Descripción</label>
                            <input wire:model='descripcion' class="form-input w-full">
                        </div>
                        @error('descripcion')
                            <span class="text-sm text-red-500">{{$message}}</span>
                        @enderror
                        <div class="mt-2 flex justify-end items-center">
                            <button class="btn btn-primary text-sm"  wire:click='store' >Actualizar</button>
                            <button class="btn btn-danger text-sm ml-2" wire:click='resetCancel' x-on:click='open = false'>Cancelar</button>
                        </div>
                    </div>

                </div>
        </div>
    @endif
</div>
