<div>
    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
        <div class="flex">
        <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
        <div>
            <p class="font-bold">{{$trabajo->name}}</p>
            <p class="text-sm">{{$trabajo->descripcion}}</p>
        </div>
        </div>
    </div>



    <div class="w-full">


        @foreach ($tareas as $item )
            @php
                $inicio = new DateTime($item->inicio);
                $fin = new DateTime($item->fin);
                $intervalo = $inicio->diff($fin)->format('%H Horas %i Minutos');
                $hours = floor($item->totalParado / 3600);
                $mins = floor($item->totalParado / 60 % 60);
            @endphp



            @if ($item->botonFinalizar == "Finalizado")
                @continue
            @endif



            <div  class="mt-10">
                <div class="bg-blue-200 font-bold rounded-t px-4 py-2">
                    {{$item->name}}
                    <p class="mb-4 pt-2 text-base text-neutral-600 dark:text-neutral-200 italic ">{{$item->descripcion}}</p>
                </div>
                <div class="border border-t-0 border-blue-400 rounded-b bg-gray-100 px-4 py-3 text-red-700">
                    @if ($item->botonFinalizar == "Finalizado")

                        <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                            <p class="font-bold">Tarea realizada en {{$intervalo}}</p>
                            <p class="text-sm"><strong>Iniciada a las:</strong> {{$item->inicio}}  <strong>Finalizada a las:</strong> {{$item->fin}}   <strong>Total Parado:</strong> Horas: {{$hours}}  Minutos: {{$mins}}</p>
                        </div>
                    @else

                        <div class="flex justify-center items-center ">
                            @if($item->botonIniciar == "Iniciar")

                                <button wire:click="cambiaEstado({{$item}},'Iniciar')"  class=" text-xs w-20 h-20 rounded-full bg-red-600 hover:bg-blue-700 text-white font-bold py-2 px-auto ">
                                    <p>{{$item->botonIniciar}}</p>
                                </button>
                            @else
                                <button  wire:click="cambiaEstado({{$item}},'{{$item->botonParar}}')" class="text-xs w-20 h-20 rounded-full bg-green-600 hover:bg-blue-700 text-white font-bold py-2 px-auto  ">
                                    <p>{{$item->botonParar}}</p>
                                </button>

                                @if ($item->botonParar == "Parar")
                                    <button wire:click="cambiaEstado({{$item}},'Finalizar')" class="ml-10 text-xs w-20 h-20 rounded-full bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-auto  ">
                                        <p>{{$item->botonFinalizar}}</p>
                                    </button>
                                @endif
                            @endif

                        </div>

                    @endif
                </div>
            </div>
        @endforeach
    </div>

</div>
