<div>
    <div class=" d-flex align-items-center justify-content-between mb-4">
        <button  class="btn-sm btn-danger text-center align-middle" wire:click="openModal">Nueva Tarea</button>
        {{-- <a  class="btn-sm btn-danger text-center align-middle" href="{{route('admin.trabajos.create')}}">Nueva Tarea</a> --}}
    </div>


    @if($tareas->count() != 0)


    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Tarea</th>
            <th scope="col">Tiempo</th>
            <th scope="col">Trabajador</th>
            <th scope="col">Tiempo</th>
            <th scope="col" class="text-right">Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($tareas as $item )
                <tr>

                    <td>{{$item->name}}</td>
                    <td>0</td>
                    <td>
                        Juan Fernández
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
            No hay niguna tarea para este trabao. Empieza a crearlas.
        </div>
    @endif


    <x-dialog-modal wire:model="modalOpen">
        <x-slot name="title">
           {{$trabajo->name}}
           <hr>
        </x-slot>
        <x-slot name="content">
            <div class="mb-2 grid grid-cols-2">
                <div class="mb-2">
                    <x-label value="Nombre de la tarea" class="text-red-800"/>
                    <x-input type="text" class="w-full" wire:model="nombreTarea"/>
                    <x-input-error for="nombreTarea"/>
                </div>
                NOMBRE{{$nombreTarea}}
                <div>
                    <x-label value="Tiempo estimado" class="text-red-800 ml-4"/>
                    <div class="ml-4">
                        <div class="flex">
                            <div>

                                <select class="form-select-sm">
                                    <option value="0">Horas</option>
                                    <option value=3600>1</option>
                                    <option value=7200>2</option>
                                    <option value="10800">3</option>
                                    <option value="14400">4</option>
                                    <option value="18000">5</option>
                                    <option value="21600">6</option>
                                    <option value="25200">7</option>
                                    <option value="28800">8</option>
                                </select>
                            </div>
                            <div class="ml-4">


                                <select class="form-select-sm">
                                    <option value="0">Minutos</option>
                                    <option value="900">15</option>
                                    <option value="1800">30</option>
                                    <option value="2700">45</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-2">
                <x-label value="Indicaciones para realizar la tarea" class="text-red-800"/>
                <x-input type="text" class="w-full" wire:model="descripcionTarea"/>
                <x-input-error for="descripcionTarea"/>
            </div>
            DESCRIPCIONtAREA{{$descripcionTarea}}

            <div class="mb-2">
                <x-label value="Mensaje informativo" class="text-red-800"/>
                <div class="grid grid-cols-4">
                    <div class="col-span-1">
                        <input type="checkbox" wire:model="importanteMensaje">
                        <label class="ml-1">Importante</label><br>
                        Importante {{var_export($importanteMensaje)}}

                    </div>
                    <div class="col-span-3">
                        <x-input type="text" wire:model="mensajeTarea" class="w-full mb-2"/>
                    </div>
                </div>
                MENSAJE {{$mensajeTarea}}
            </div>

            <div>
                <x-label value="Asignación" class="text-red-800 w-full bg-gray-100 text-center"/>
                <div>
                    <x-label value="LUNES" class="text-gray-800"/>
                    <div class="flex">
                        @foreach ($users as $item )
                            <label class="flex items-center ml-2">
                                <input type="checkbox" wire:model="lunes" name="{{$item->id}}" class="mr-1">
                                {{strtok($item->name," ")}}
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="w-full border-t-2">
                    <x-label value="MARTES" class="text-gray-800"/>
                    <div class="flex">
                        @foreach ($users as $item )
                            <label class="flex items-center ml-2">
                                <input type="checkbox" wire:model="martes" value="{{$item->id}}" class="mr-1">
                                {{strtok($item->name," ")}}
                            </label>

                        @endforeach
                    </div>

                </div>
                <div class="w-full border-t-2">
                    <x-label value="MIÉRCOLES" class="text-gray-800"/>
                    <div class="flex">
                        @foreach ($users as $item )
                            <label class="flex items-center ml-2">
                                <input type="checkbox" wire:model="miercoles" name="{{$item->id}}" class="mr-1">
                                {{strtok($item->name," ")}}
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="w-full border-t-2">
                    <x-label value="JUEVES" class="text-gray-800"/>
                    <div class="flex">
                        @foreach ($users as $item )
                            <label class="flex items-center ml-2">
                                <input type="checkbox" wire:model="jueves" name="{{$item->id}}" class="mr-1">
                                {{strtok($item->name," ")}}
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="w-full border-t-2">
                    <x-label value="VIERNES" class="text-gray-800"/>
                    <div class="flex">
                        @foreach ($users as $item )
                            <label class="flex items-center ml-2">
                                <input type="checkbox" wire:model="viernes" name="{{$item->id}}" class="mr-1">
                                {{strtok($item->name," ")}}
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="w-full border-t-2">
                    <x-label value="SÁBADO" class="text-gray-800"/>
                    <div class="flex">
                        @foreach ($users as $item )
                            <label class="flex items-center ml-2">
                                <input type="checkbox" wire:model="sabado" name="{{$item->id}}" class="mr-1">
                                {{strtok($item->name," ")}}
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="w-full border-t-2">
                    <x-label value="DOMINGO" class="text-gray-800"/>
                    <div class="flex">
                        @foreach ($users as $item )
                            <label class="flex items-center ml-2">
                                <input type="checkbox" wire:model="domingo" name="{{$item->id}}" class="mr-1">
                                {{strtok($item->name," ")}}
                            </label>
                        @endforeach
                    </div>
                </div>

            </div>









































        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('modalOpen',false)">
                Cancelar
            </x-secondary-button>
            <x-danger-button class="ml-4" wire:click="saveTarea">
                Crear tarea
            </x-danger-button>
        </x-slot>

    </x-modal-blade>



</div>



{{-- <x-dropdown align='left'>
    <x-slot name="trigger">
        <span class="inline-flex rounded-md">
            <button type="button" class="inline-flex items-center px-3 py-1 border border-transparent text-xs leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-catedral focus:outline-none transition">
               Horas
                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </span>
    </x-slot>
    <x-slot name="content">
        <div class="w-48">
            <p>Opcion 1</p>
            <p>Opcion 2</p>
          </div>
    </x-slot>
</x-dropdown> --}}
