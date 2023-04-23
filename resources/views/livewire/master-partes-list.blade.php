<div>



    <div class=" d-flex align-items-center justify-content-between mb-4">
        <div class="mb-8">
            @livewire("master-partes-crea",['trabajo' => $trabajo])
        </div>
    </div>

    @if($partes->count() != 0)
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Parte</th>
                <th scope="col">Tiempo Estimado</th>
                <th scope="col">L</th>
                <th scope="col">M</th>
                <th scope="col">Mi</th>
                <th scope="col">J</th>
                <th scope="col">V</th>
                <th scope="col">S</th>
                <th scope="col">D</th>
                <th scope="col" class="text-right">Acciones</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($partes as $item )

                    <tr>

                        <td>{{$item->tarea}}</td>
                        <td>{{$item->tiempo}}</td>
                        <td>
                            @if($item->lunes == null)

                            @else
                                @if(count($item->lunes)==1)
                                    <i class="fas fa-user text-xs text-gray-500"></i>
                                @else
                                    <i class="fas fa-user-friends text-xs text-gray-500"></i>
                                @endif

                            @endif
                            @if($item->mensajeLunes)
                                @if($item->importanteLunes)
                                    <i class="fas fa-volume-up text-xs text-red-500"></i>
                                @else
                                <i class="fas fa-volume-up text-xs text-gray-500"></i>
                                @endif
                            @endif
                        </td>
                        <td>
                            @if($item->martes == null)

                            @else
                                @if(count($item->martes)==1)
                                    <i class="fas fa-user text-xs text-gray-500"></i>
                                @else
                                    <i class="fas fa-user-friends text-xs text-gray-500"></i>
                                @endif

                            @endif
                            @if($item->mensajeMartes)
                                @if($item->importanteMartes)
                                    <i class="fas fa-volume-up text-xs text-red-500"></i>
                                @else
                                <i class="fas fa-volume-up text-xs text-gray-500"></i>
                                @endif
                            @endif
                        </td>
                        <td>
                            @if($item->miercoles == null)

                            @else
                                @if(count($item->miercoles)==1)
                                    <i class="fas fa-user text-xs text-gray-500"></i>
                                @else
                                    <i class="fas fa-user-friends text-xs text-gray-500"></i>
                                @endif

                            @endif
                            @if($item->mensajeMiercoles)
                                @if($item->importanteMiercoles)
                                    <i class="fas fa-volume-up text-xs text-red-500"></i>
                                @else
                                <i class="fas fa-volume-up text-xs text-gray-500"></i>
                            @endif
                        @endif
                        </td>
                        <td>
                            @if($item->jueves == null)

                        @else
                            @if(count($item->jueves)==1)
                                <i class="fas fa-user text-xs text-gray-500"></i>
                            @else
                                <i class="fas fa-user-friends text-xs text-gray-500"></i>
                            @endif

                        @endif
                        @if($item->mensajeJueves)
                            @if($item->importanteJueves)
                                <i class="fas fa-volume-up text-xs text-red-500"></i>
                            @else
                            <i class="fas fa-volume-up text-xs text-gray-500"></i>
                            @endif
                        @endif
                        </td>
                        <td>

                            @if($item->viernes == null)

                            @else
                                @if(count($item->viernes)==1)
                                    <i class="fas fa-user text-xs text-gray-500"></i>
                                @else
                                    <i class="fas fa-user-friends text-xs text-gray-500 "></i>
                                @endif
                            @endif
                            @if($item->mensajeViernes)
                                @if($item->importanteViernes)
                                    <i class="fas fa-volume-up text-xs text-red-500"></i>
                                @else
                                <i class="fas fa-volume-up text-xs text-gray-500"></i>
                            @endif
                        @endif
                        </td>
                        <td>
                            @if($item->sabado == null)

                            @else
                                @if(count($item->sabado)==1)
                                    <i class="fas fa-user text-xs text-gray-500"></i>
                                @else
                                    <i class="fas fa-user-friends text-xs text-gray-500"></i>
                                @endif

                            @endif
                            @if($item->mensajeSabado)
                                @if($item->importanteSabado)
                                    <i class="fas fa-volume-up text-xs text-red-500"></i>
                                @else
                                <i class="fas fa-volume-up text-xs text-gray-500"></i>
                            @endif
                        @endif
                        </td>

                        <td>
                            @if($item->domingo == null)

                            @else
                                @if(count($item->domingo)==1)
                                    <i class="fas fa-user text-xs text-gray-500"></i>
                                @else
                                    <i class="fas fa-user-friends text-xs text-gray-500"></i>
                                @endif

                            @endif
                            @if($item->mensajeDonimgo)
                            @if($item->importanteDonimgo)
                                <i class="fas fa-volume-up text-xs text-red-500"></i>
                            @else
                            <i class="fas fa-volume-up text-xs text-gray-500"></i>
                            @endif
                        @endif
                        </td>





                        <td class="text-right flex justify-end items-center">
                            {{-- <a href="{{route('admin.trabajos.edit',$item)}}"><i class="cursor-pointer fa-lg text-primary fas fa-edit" ></i></a> --}}
                           {{--  <i class="cursor-pointer fa-lg fas text-danger fa-eraser mr-2" wire:click="deleteTrabajo({{$item}})"></i> --}}

                           <i class="cursor-pointer fa-lg text-primary fas fa-edit mr-2" wire:click="edit({{$item}})" ></i>
                           <i class="cursor-pointer fa-lg fas text-danger fa-eraser mr-2" wire:click="$emit('deleteT',{{$item}})"></i>

                           {{-- <a href="{{route('admin.partes',$item)}}" class="btn-sm btn-primary"><i class="fa fa-cog"></i> | Tareas</a> --}}
                          {{-- @livewire('master-tareas-list',['trabajo' => $item], key($item->id)) --}}

                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    @else



        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
            <p class="font-bold">No hay ningún parte creado para este trabajo</p>
            <p>Empieza a crearlos.</p>
        </div>


    @endif

    <x-dialog-modal wire:model="modalOpen">
        <x-slot name="title">
           NUEVO PARTE
           <hr>
        </x-slot>
        <x-slot name="content">
            {{$trabajo->name}}
            <hr>
            <div class="mt-2 mb-2 grid grid-cols-3 items-center">
                <div class="col-span-2">
                    <x-label value="Tarea" class="text-red-800"/>
                    <x-input type="text" class="w-full" wire:model.defer="tarea"/>
                    <x-input-error for="tarea"/>
                </div>

                <div class="col-span-1">
                    <x-label value="Tiempo estimado" class="text-red-800 pl-4"/>
                    <div class="px-2 text-xs">
                        <div class="flex">
                            <div>

                                <select class="form-select-sm" wire:model="horas">
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


                                <select class="form-select-sm" wire:model="minutos">
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

            <hr class="mt-4">


            <div>

                <div class="bg-gray-100 py-2 my-4 border-2">
                    <x-label value="LUNES" class=" pl-2 text-red-700 underline"/>

                    <div class="ml-2 text-xs">
                        <label class="text-gray-400 italic text-xs">Mensaje</label>
                        <div class="grid grid-cols-4 items-center">
                            <div class="col-span-3">
                                <x-input type="text" wire:model.defer="mensajeLunes" class="w-full text-xs mb-2"/>
                            </div>

                            <div class="col-span-1 pl-4">
                                <input type="checkbox" wire:model="importanteLunes">
                                <label class="ml-1">Importante</label><br>
                            </div>

                        </div>
                        <hr>
                    </div>

                    <label class="text-gray-400 italic text-xs ml-2">Turno</label>
                    <div class="ml-2 grid grid-cols-2 justify-center  items-center">
                        <div class="items-center">
                            <label>
                                <input type="radio" wire:model="lunesTurno" value="1" />
                                Mañana
                            </label>
                            <label class="ml-2">
                                <input type="radio" wire:model="lunesTurno" value="2" />
                                Tarde
                            </label>
                            <label class="ml-2">
                                <input type="radio" wire:model="lunesTurno" value="3" />
                                Indiferente
                            </label>
                        </div>
                        <div>
                            <div class="flex">
                                <span class=" mr-1">Prioridad:</span>
                                <span class="font-semibold">{{$rangeSliderLunes}}</span>
                            </div>
                            <input type="range" min="0" max="100" step="5" value="50" wire:model="rangeSliderLunes" />

                        </div>

                    </div>
                    <hr>
                    <label class="text-gray-400 italic text-xs ml-2">Trabajador</label>
                    <div class="flex overflow-x-auto ">
                        @foreach ($users as $item )
                            <label class="flex items-center ml-2">
                                <input type="checkbox" wire:model="lunes" value="{{$item->id}}" class="mr-1">
                                {{strtok($item->name," ")}}
                            </label>
                        @endforeach
                    </div>

                </div>

                <div class="py-2 my-4 border-2">
                    <x-label value="MARTES" class="pl-2 text-red-700 underline"/>
                    <div class="mb-2 ml-2 text-xs">
                        <label class="text-gray-400 italic text-xs">Mensaje</label>
                        <div class="grid grid-cols-4 items-center">
                            <div class="col-span-3">
                                <x-input type="text" wire:model="mensajeMartes" class="w-full text-xs mb-2"/>
                            </div>

                            <div class="col-span-1 pl-4">
                                <input type="checkbox" wire:model="importanteMartes">
                                <label class="ml-1">Importante</label><br>
                            </div>

                        </div>

                    </div>
                    <label class="text-gray-400 italic text-xs ml-2">Turno</label>
                    <div class="ml-2 grid grid-cols-2 justify-center  items-center">
                        <div class="items-center">
                            <label>
                                <input type="radio" wire:model="martesTurno" value="1" />
                                Mañana
                            </label>
                            <label class="ml-2">
                                <input type="radio" wire:model="martesTurno" value="2" />
                                Tarde
                            </label>
                            <label class="ml-2">
                                <input type="radio" wire:model="martesTurno" value="3" />
                                Indiferente
                            </label>
                        </div>
                        <div>
                            <div class="flex">
                                <span class=" mr-1">Prioridad:</span>
                                <span class="font-semibold">{{$rangeSliderMartes}}</span>
                            </div>
                            <input type="range" min="0" max="100" step="5" value="50" wire:model="rangeSliderMartes" />

                        </div>

                    </div>
                    <hr>
                    <label class="text-gray-400 italic text-xs ml-2">Trabajador</label>
                    <div class="flex overflow-x-auto">
                        @foreach ($users as $item )
                            <label class="flex items-center ml-2">
                                <input type="checkbox" wire:model="martes" value="{{$item->id}}" class="mr-1">
                                {{strtok($item->name," ")}}
                            </label>

                        @endforeach
                    </div>

                </div>

                <div class="bg-gray-100 py-2 my-4 border-2">
                    <x-label value="MIÉRCOLES" class="pl-2 text-red-700 underline"/>
                    <div class="mb-2 ml-2 text-xs">
                        <label class="text-gray-400 italic text-xs">Mensaje</label>
                        <div class="grid grid-cols-4 items-center">
                            <div class="col-span-3">
                                <x-input type="text" wire:model="mensajeMiercoles" class="w-full text-xs mb-2"/>
                            </div>

                            <div class="col-span-1 pl-4">
                                <input type="checkbox" wire:model="importanteMiercoles">
                                <label class="ml-1">Importante</label><br>
                            </div>

                        </div>

                    </div>
                    <label class="text-gray-400 italic text-xs ml-2">Turno</label>
                    <div class="ml-2 grid grid-cols-2 justify-center  items-center">
                        <div class="items-center">
                            <label>
                                <input type="radio" wire:model="miercolesTurno" value="1" />
                                Mañana
                            </label>
                            <label class="ml-2">
                                <input type="radio" wire:model="miercolesTurno" value="2" />
                                Tarde
                            </label>
                            <label class="ml-2">
                                <input type="radio" wire:model="miercolesTurno" value="3" />
                                Indiferente
                            </label>
                        </div>
                        <div>
                            <div class="flex">
                                <span class=" mr-1">Prioridad:</span>
                                <span class="font-semibold">{{$rangeSliderMiercoles}}</span>
                            </div>
                            <input type="range" min="0" max="100" step="5" value="50" wire:model="rangeSliderMiercoles" />

                        </div>

                    </div>
                    <hr>
                    <label class="text-gray-400 italic text-xs ml-2">Trabajador</label>
                    <div class="flex overflow-x-auto">
                        @foreach ($users as $item )
                            <label class="flex items-center ml-2">
                                <input type="checkbox" wire:model="miercoles" value="{{$item->id}}" class="mr-1">
                                {{strtok($item->name," ")}}
                            </label>
                        @endforeach
                    </div>

                </div>
                <div class="py-2 my-4 border-2">
                    <x-label value="JUEVES" class="pl-2 text-red-700 underline"/>
                    <div class="mb-2 ml-2 text-xs">
                        <label class="text-gray-400 italic text-xs">Mensaje</label>
                        <div class="grid grid-cols-4 items-center">
                            <div class="col-span-3">
                                <x-input type="text" wire:model="mensajeJueves" class="w-full text-xs mb-2"/>
                            </div>

                            <div class="col-span-1 pl-4">
                                <input type="checkbox" wire:model="importanteJueves">
                                <label class="ml-1">Importante</label><br>
                            </div>

                        </div>

                    </div>
                    <label class="text-gray-400 italic text-xs ml-2">Turno</label>
                    <div class="ml-2 grid grid-cols-2 justify-center  items-center">
                        <div class="items-center">
                            <label>
                                <input type="radio" wire:model="juevesTurno" value="1" />
                                Mañana
                            </label>
                            <label class="ml-2">
                                <input type="radio" wire:model="juevesTurno" value="2" />
                                Tarde
                            </label>
                            <label class="ml-2">
                                <input type="radio" wire:model="juevesTurno" value="3" />
                                Indiferente
                            </label>
                        </div>
                        <div>
                            <div class="flex">
                                <span class=" mr-1">Prioridad:</span>
                                <span class="font-semibold">{{$rangeSliderJueves}}</span>
                            </div>
                            <input type="range" min="0" max="100" step="5" value="50" wire:model="rangeSliderJueves" />

                        </div>

                    </div>
                    <hr>

                    <label class="text-gray-400 italic text-xs ml-2">Trabajador</label>
                    <div class="flex overflow-x-auto">
                        @foreach ($users as $item )
                            <label class="flex items-center ml-2">
                                <input type="checkbox" wire:model="jueves" value="{{$item->id}}" class="mr-1">
                                {{strtok($item->name," ")}}
                            </label>
                        @endforeach
                    </div>

                </div>
                <div class="bg-gray-100 py-2 my-4 border-2">
                    <x-label value="VIERNES"  class="pl-2 text-red-700 underline"/>
                    <div class="mb-2 ml-2 text-xs">
                        <label class="text-gray-400 italic text-xs">Mensaje</label>
                        <div class="grid grid-cols-4 items-center">
                            <div class="col-span-3">
                                <x-input type="text" wire:model="mensajeViernes" class="w-full text-xs mb-2"/>
                            </div>

                            <div class="col-span-1 pl-4">
                                <input type="checkbox" wire:model="importanteViernes">
                                <label class="ml-1">Importante</label><br>
                            </div>

                        </div>

                    </div>
                    <label class="text-gray-400 italic text-xs ml-2">Turno</label>
                    <div class="ml-2 grid grid-cols-2 justify-center  items-center">
                        <div class="items-center">
                            <label>
                                <input type="radio" wire:model="viernesTurno" value="1" />
                                Mañana
                            </label>
                            <label class="ml-2">
                                <input type="radio" wire:model="viernesTurno" value="2" />
                                Tarde
                            </label>
                            <label class="ml-2">
                                <input type="radio" wire:model="viernesTurno" value="3" />
                                Indiferente
                            </label>
                        </div>
                        <div>
                            <div class="flex">
                                <span class=" mr-1">Prioridad:</span>
                                <span class="font-semibold">{{$rangeSliderViernes}}</span>
                            </div>
                            <input type="range" min="0" max="100" step="5" value="50" wire:model="rangeSliderViernes" />

                        </div>

                    </div>
                    <hr>
                    <label class="text-gray-400 italic text-xs ml-2">Trabajador</label>

                    <div class="flex overflow-x-auto">
                        @foreach ($users as $item )
                            <label class="flex items-center ml-2">
                                <input type="checkbox" wire:model="viernes" value="{{$item->id}}" class="mr-1">
                                {{strtok($item->name," ")}}
                            </label>
                        @endforeach
                    </div>

                </div>
                <div class="py-2 my-4 border-2">
                    <x-label value="SÁBADO" class="pl-2 text-red-700 underline"/>
                    <div class="mb-2 ml-2 text-xs">
                        <label class="text-gray-400 italic text-xs">Mensaje</label>
                        <div class="grid grid-cols-4 items-center">
                            <div class="col-span-3">
                                <x-input type="text" wire:model="mensajeSabado" class="w-full text-xs mb-2"/>
                            </div>

                            <div class="col-span-1 pl-4">
                                <input type="checkbox" wire:model="importanteSabado">
                                <label class="ml-1">Importante</label><br>
                            </div>

                        </div>

                    </div>
                    <label class="text-gray-400 italic text-xs ml-2">Turno</label>
                    <div class="ml-2 grid grid-cols-2 justify-center  items-center">
                        <div class="items-center">
                            <label>
                                <input type="radio" wire:model="sabadoTurno" value="1" />
                                Mañana
                            </label>
                            <label class="ml-2">
                                <input type="radio" wire:model="sabadoTurno" value="2" />
                                Tarde
                            </label>
                            <label class="ml-2">
                                <input type="radio" wire:model="sabadoTurno" value="3" />
                                Indiferente
                            </label>
                        </div>
                        <div>
                            <div class="flex">
                                <span class=" mr-1">Prioridad:</span>
                                <span class="font-semibold">{{$rangeSliderSabado}}</span>
                            </div>
                            <input type="range" min="0" max="100" step="5" value="50" wire:model="rangeSliderSabado" />

                        </div>

                    </div>
                    <hr>
                    <label class="text-gray-400 italic text-xs ml-2">Trabajador</label>
                    <div class="flex overflow-x-auto">
                        @foreach ($users as $item )
                            <label class="flex items-center ml-2">
                                <input type="checkbox" wire:model="sabado" value="{{$item->id}}" class="mr-1">
                                {{strtok($item->name," ")}}
                            </label>
                        @endforeach
                    </div>

                </div>
                <div class="bg-gray-100 my-4 border-2">
                    <x-label value="DOMINGO" class="pl-2 text-red-700 underline"/>
                    <div class="mb-2 ml-2 text-xs">
                        <label class="text-gray-400 italic text-xs">Mensaje</label>
                        <div class="grid grid-cols-4 items-center">
                            <div class="col-span-3">
                                <x-input type="text" wire:model="mensajeDomingo" class="w-full text-xs mb-2"/>
                            </div>

                            <div class="col-span-1 pl-4">
                                <input type="checkbox" wire:model="importanteDomingo">
                                <label class="ml-1">Importante</label><br>
                            </div>

                        </div>

                    </div>
                    <label class="text-gray-400 italic text-xs ml-2">Turno</label>
                    <div class="ml-2 grid grid-cols-2 justify-center  items-center">
                        <div class="items-center">
                            <label>
                                <input type="radio" wire:model="domingoTurno" value="1" />
                                Mañana
                            </label>
                            <label class="ml-2">
                                <input type="radio" wire:model="domingoTurno" value="2" />
                                Tarde
                            </label>
                            <label class="ml-2">
                                <input type="radio" wire:model="domingoTurno" value="3" />
                                Indiferente
                            </label>
                        </div>
                        <div>
                            <div class="flex">
                                <span class=" mr-1">Prioridad:</span>
                                <span class="font-semibold">{{$rangeSliderDomingo}}</span>
                            </div>
                            <input type="range" min="0" max="100" step="5" value="50" wire:model="rangeSliderDomingo" />

                        </div>

                    </div>
                    <hr>
                    <label class="text-gray-400 italic text-xs ml-2">Trabajador</label>
                    <div class="flex overflow-x-auto">
                        @foreach ($users as $item )
                            <label class="flex items-center ml-2">
                                <input type="checkbox" wire:model="domingo" value="{{$item->id}}" class="mr-1">
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
            <x-danger-button class="ml-4" wire:click="update" wire:laoding.attr="disabled" class="disabled:opacity-25" >
                Modificar parte
            </x-danger-button>
        </x-slot>

    </x-modal-blade>



</div>


