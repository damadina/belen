<div class=" ">
   {{--  {{$section}} --}}

    <select  name="categoriaid" wire:model="categoriaid" class="w-75 form-select form-select-lg mx-4 mb-3 mt-4" >
        {{-- <option value="0" selected>Categorias</option> --}}
        @foreach ($categorias as $item )
            <option value={{$item->id}}>{{$item->name}}</option>
        @endforeach
    </select>


    @foreach ($plantillas as $plantilla )

        <div class=" mt-6 mx-4">
            <div class="cardt-body bg-gray-200">

                @if($trabajo->id == $plantilla->id)
                    <label>Nombre del trabajo</label>
                    <input wire:model.defer='trabajo.name' class="form-input w-full" placeholder="Ingrese un nombre para el trabajo">
                    @error('trabajo.name')
                        <p class="text-xs text-red-500">{{$message}}</p>
                    @enderror
                    <label class="mt-2">Descripción</label>
                    <input wire:model.defer='trabajo.descripcion' class="form-input w-full" placeholder="Ingrese una derscripción para el trabajo">
                    <div>
                        @error('trabajo.descripcion')
                            <p class="text-xs text-red-500">{{$message}}</p>
                        @enderror
                    </div>
                    <label class="mt-2">Tiempo estimado</label>
                    <div class="flex">
                        <div class="mb-3">

                            <select data-te-select-init>
                                @foreach ($horas as $hora)
                                <option value="{{intval($hora)*3600}}">{{$hora}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex-1">


                            <select  class="ml-4" name="categoriaid" wire:model="trabajo.categoria_id" class=" form-select" >
                               {{--  <option value="0" selected>Categorias</option> --}}
                                @foreach ($categorias as $categoria )
                                    <option value={{$categoria->id}}>{{$categoria->name}}</option>
                                @endforeach

                            </select>
                        </div>

                    </div>


                    <div>
                        <button class="btn btn-primary text-sm" wire:click='update'>Actualizar</button>
                        <button class="btn btn-danger text-sm" wire:click='cancel' >Cancelar</button>
                    </div>

                @else
                    <div x-data='{open:false}' >
                        <div class="flex cardt-title">
                            <p class="cardt-title ml-2 flex-1">{{$plantilla->name}}</p>
                            <span class="inline-flex items-center justify-center px-2 py-1 text-xs  leading-none text-gray-600 bg-gray-300 rounded-lg">{{$plantilla->categoria->name}}</span>
                        </div>
                        <hr>
                        <div class="flex p-1">
                            <label>Descripción:</label>
                            <p class="ml-2">{{$plantilla->descripcion}}</p>
                        </div>

                       {{--  <p class="pt-2" ><span class="font-semibold  mr-2">Descripción:</span>{{$plantilla->descripcion}}</p> --}}
                        {{-- <p class="pt-2"><span class="font-semibold  mr-2">Ovservaciones:</span>{{$plantilla->observaciones}}</p> --}}
                        <div class="flex justify-between items-center" >
                           {{--  <p class="pt-2" ><span class="font-semibold mr-2">Tiempo estimado:</span>{{$plantilla->Horas}}</p> --}}

                            <div class="flex p-1">
                                <label>Tiempo estimado:</label>
                                <p class="ml-2">{{$plantilla->Horas}}</p>
                            </div>


                            <div class="flex">
                                <div x-show='!open'>
                                    <p><i class=" mr-2 cursor-pointer text-blue-500 far fa-eye" x-on:click='open = !open' ></i><strong>Tareas: </strong> {{$plantilla->tareas->count()}}</p>
                                </div>
                                <div x-show='open'>
                                    <p><i class=" mr-2 cursor-pointer text-blue-500 fas fa-eye-slash" x-on:click='open = !open' ></i><strong>Tareas: </strong> {{$plantilla->tareas->count()}}</p>
                                </div>

                            </div>
                            <div>

                                <i class="cursor-pointer fa-lg text-primary fas fa-edit" wire:click="edit({{$plantilla}})"></i>
                                <i class="cursor-pointer fa-lg fas text-danger fa-eraser" wire:click="$emit('deleteTrabajo',{{$plantilla->id}})"></i>


                            </div>
                        </div>
                        <div x-show='open' >

                            @livewire('admin-ttarea',['trabajo' => $plantilla,'tipo' => 'normal',key(uniqid())])
                        </div>


                    </div>
                @endif
            </div>
        </div>

    @endforeach

    <div x-data='{open:false}' class="mt-4">
        @if($plantillas->count()==0)
            <div class="container bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                <p class="font-bold">No tienes ninguna plantilla de trabajo en esta categoría</p>
                <p>Empieza a crearlas</p>
            </div>
            @endif

        <a x-show='!open' x-on:click='open = true'    class="pt-2 flex items-center cursor-pointer mb-3">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
            Agregar nueva plantilla de trabajo
        </a>


            <div x-show='open' class="cardt mt-6 mx-4">

                <div class="cardt-body">
                    <p class="text-lg font-bold mb-4">Nuevo trabajo</p>


                    <div class="flex items-center">
                        <label class="w-48">Categoria</label>
                        <select  class="" name="newCategoria_id" wire:model="newCategoria_id" class=" form-select" >
                        {{--  <option value="0" selected>Categorias</option> --}}

                            @foreach ($categorias as $item )
                                    <option  value={{$item->id}}>{{$item->name}}</option>
                            @endforeach

                        </select>

                    </div>
                    @error('newCategoria_id')
                        <span class="text-sm text-red-500">{{$message}}</span>
                    @enderror





                    <div class="flex items-center mt-4">
                        <label class="w-48">Nombre</label>
                        <input wire:model.defer='name' class="form-input w-full">
                    </div>
                    @error('name')
                            <span class="text-sm text-red-500">{{$message}}</span>
                    @enderror
                    <div class="flex items-center mt-4">
                        <label class="w-48">Descripción</label>
                        <input wire:model.defer='descripcion' class="form-input w-full">
                    </div>
                    @error('descripcion')
                        <span class="text-sm text-red-500">{{$message}}</span>
                    @enderror
                    <div>

                    <div class="flex items-center mt-4">
                        <label class="w-48">Tiempo Estimado</label>
                        <select data-te-select-init wire:model="tiempoestimado">
                            @foreach ($horas as $hora)
                            <option value="{{intval($hora)*3600}}">{{$hora}}</option>
                            @endforeach
                        </select>
                    </div>





                    <div class="mt-2 flex justify-end items-center">
                        <button class="btn btn-primary text-sm"  wire:click='store' >Actualizar</button>
                        <button class="btn btn-danger text-sm ml-2" wire:click='resetCancel' x-on:click='open = false'>Cancelar</button>
                    </div>

                </div>

            </div>

    </div>

    {{-- <div class="card-footer">
        {{$plantillas->links()}}
    </div> --}}



</div>
