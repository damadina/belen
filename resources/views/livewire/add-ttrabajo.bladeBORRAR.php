<div>


    <x-danger-button wire:click="clicAdd({{$diaSelected}})"  >
        Añadir trabajo
    </x-danger-button>


    <x-dialog-modal wire:model='openModal'>
        <x-slot name="title">

            <select  name="categoriaid" wire:model="categoriaid" class="w-75 form-select form-select-lg mx-4 mb-3 mt-4" >
                {{-- <option value="0" selected>Categorias</option> --}}
                @foreach ($categorias as $item )
                    <option value={{$item->id}}>{{$item->name}}</option>
                @endforeach
            </select>
        </x-slot>
        <x-slot name="content">

            @foreach ($trabajos as $item )



                <div>

                    <div class="cardt mt-6 mx-4">
                        <div class="cardt-body bg-gray-200">
                            <div x-data='{open:false}' >
                                <div class="flex cardt-title">
                                    <p class="cardt-title ml-2 flex-1">{{$item->name}}</p>

                                    <span class="inline-flex items-center justify-center px-2 py-1 text-xs  leading-none text-gray-600 bg-gray-300 rounded-lg">{{$item->categoria->name}}</span>


                                    <div class="ml-2 px-2 bg-gray-300">
                                        <label class="text-xs">Seleccionar</label>
                                        <input type="checkbox" wire:model="Selects" value="{{$item->id}}">
                                    </div>

                                </div>

                                <hr>

                                <div class="flex p-1">
                                    <label>Descripción:</label>
                                    <p class="ml-2">{{$item->descripcion}}</p>
                                </div>


                                <div class="flex justify-between items-center" >
                                    <div class="flex p-1">
                                        <label>Tiempo estimado:</label>
                                        <p class="ml-2">{{$item->Horas}}</p>
                                    </div>

                                    <div class="flex">
                                        <div x-show='!open'>
                                            <p><i class=" mr-2 cursor-pointer text-blue-500 far fa-eye" x-on:click='open = !open' ></i><strong>Tareas: </strong> {{$item->tareas->count()}}</p>
                                        </div>
                                        <div x-show='open'>
                                            <p><i class=" mr-2 cursor-pointer text-blue-500 fas fa-eye-slash" x-on:click='open = !open' ></i><strong>Tareas: </strong> {{$item->tareas->count()}}</p>
                                        </div>

                                    </div>


                                </div>

                                <div x-show='open'>
                                    @livewire('admin-ttarea',['trabajo' => $item, 'tipo' => 'addToDia',key(uniqid())])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>










               {{--  <x-Show-Ttrabajo :trabajo='$item' tipo='addToDia' :diaSelected='$diaSelected'/> --}}
            @endforeach
        </x-slot>
        <x-slot name="footer">
            <x-button wire:click="cancelar()" >
                Cancelar
            </x-danger-button>
            <x-danger-button class="ml-4" wire:click="confirmarAdd()" >
                Añadir
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>






</div>
