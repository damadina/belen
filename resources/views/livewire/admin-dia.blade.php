<div>

    <div class="flex items-center">
        <select  name="diaid" wire:model="diaid" label="Item" class="w-48 form-select form-select-lg mx-4 mb-3 mt-4" >
            @foreach ($dias as $item )
                <option value={{$item->id}}>{{$item->dia}}</option>
            @endforeach
        </select>

        <div class="flex-1">
        @livewire('add-ttrabajo',['diaSelected' => $diaSelected, key(uniqid())])
        </div>
        <div class="mr-4">
            @livewire('admin-cargabilidad',['dia' => $diaid,key(uniqid()) ] );
        </div>


    </div>

    @if($diaSelected->trabajos()->count() == 0)
        <div class="container bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
            <p class="font-bold">No tienes ningún trabajo para este día</p>
            <p>Empieza a añadir</p>
        </div>
    @else

        @foreach ($trabajos as $key => $item )

                <div class="cardt mt-6 mx-4">
                    <div class="cardt-body bg-gray-200">
                        <div x-data='{open:false}' >
                            <div class="flex cardt-title">
                                <p class="cardt-title ml-2 flex-1">{{$item->name}}</p>

                                <span class="inline-flex items-center justify-center px-2 py-1 text-xs  leading-none text-gray-600 bg-gray-300 rounded-lg">{{$item->categoria->name}}</span>


                                    {{-- <div class="ml-2 px-2 bg-gray-300">
                                        <label class="text-xs">Seleccionar</label>
                                        <input type="checkbox" wire:model="Selects" value="{{$item->id}}">
                                    </div> --}}

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
                               {{--  {!! Form::date('name', \Carbon\Carbon::now()); !!} --}}

                                <div class="flex items-center">
                                    <select   wire:change= 'clickSelect({{$item}},$event.target.value)' class="form-select" aria-label="Default select example">
                                        <option
                                        @if($item->trabajador == null)
                                        selected
                                        @endif
                                        value="">No seleccionado</option>
                                        @foreach ($users as $user )

                                            <option

                                            @if ($item->trabajador != null AND $user->id == $item->trabajador->id)
                                                selected
                                            @endif
                                            value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>

                                </div>




                                <div class="flex">
                                    <div x-show='!open'>
                                        <p><i class=" mr-2 cursor-pointer text-blue-500 far fa-eye" x-on:click='open = !open' ></i><strong>Tareas: </strong> {{$item->tareas->count()}}</p>
                                    </div>
                                    <div x-show='open'>
                                        <p><i class=" mr-2 cursor-pointer text-blue-500 fas fa-eye-slash" x-on:click='open = !open' ></i><strong>Tareas: </strong> {{$item->tareas->count()}}</p>
                                    </div>

                                </div>


                                    <div>

                                        <i class="cursor-pointer fa-lg text-primary fas fa-sign-out-alt" wire:click="retirar({{$item}})"></i>
                                    </div>


                            </div>

                            <div x-show='open'>
                                @livewire('admin-ttarea',['trabajo' => $item, 'tipo' => 'addToDia',key(uniqid())])
                            </div>


                        </div>
                    </div>
                </div>




















            {{-- FIN Card Trabajo --}}

        @endforeach

    @endif
</div>



