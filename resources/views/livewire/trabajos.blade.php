<div class="w-full">

    @foreach ($tareas as $item )
        @php
            $inicio = new DateTime($item->inicio);
            $fin = new DateTime($item->fin);
            $intervalo = $inicio->diff($fin)->format('%H Horas %i Minutos');
            $hours = floor($item->totalParado / 3600);
            $mins = floor($item->totalParado / 60 % 60);
        @endphp


        <div role="alert" class="mt-10">
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
                    @if($modeEdit)
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
                @endif
            </div>
        </div>
    @endforeach
</div>

