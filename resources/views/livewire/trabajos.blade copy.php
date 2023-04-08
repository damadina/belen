<div>
   {{--  @php
        $fecha=date_create()->format('Y-m-d');
        $modeEdit = true;
        if ($dia <> $fecha) {
           $modeEdit  = false;
        }

    @endphp --}}
    @foreach ($tareas as $item )
        {{-- <div class=" w-full flex justify-center pt-4 pb-4"> --}}
            <div class="block w-full
            @if ($item->botonFinalizar == "Finalizado")

            @else
            h-screen
            @endif

            rounded-lg bg-white p-6 shadow-lg mb-4">

               {{--  <span class=" h-5   justify-center px-2 py-1 text-xs font-bold leading-none text-indigo-100 bg-indigo-700 rounded">{{'Tarea '.$loop->index+1}}</span> --}}
                @php
                    $inicio = new DateTime($item->inicio);
                    $fin = new DateTime($item->fin);
                    $intervalo = $inicio->diff($fin)->format('%H Horas %i Minutos');
                    $hours = floor($item->totalParado / 3600);
                    $mins = floor($item->totalParado / 60 % 60);
                @endphp


                <p class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50 mt-4">{{$item->name}}</P>
                @if ($item->botonFinalizar != "Finalizado")
                    <p class="mb-4 pt-4 text-base text-neutral-600 dark:text-neutral-200">{{$item->descripcion}}</p>
                @endif
                @if ($item->botonFinalizar == "Finalizado")
                <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                    <p class="font-bold">Tarea realizada en {{$intervalo}}</p>
                    <p class="text-sm"><strong>Iniciada a las:</strong> {{$item->inicio}}  <strong>Finalizada a las:</strong> {{$item->fin}}   <strong>Total Parado:</strong> Horas: {{$hours}}  Minutos: {{$mins}}</p>
                  </div>
                @else
                    @if($modeEdit)
                        <div class="flex justify-center items-center h-screen">
                            @if($item->botonIniciar == "Iniciar")

                                <button wire:click="cambiaEstado({{$item}},'Iniciar')"  class=" w-28 h-28 rounded-full bg-red-600 hover:bg-blue-700 text-white font-bold py-2 px-4 ">
                                    <p>{{$item->botonIniciar}}</p>
                                </button>
                            @else
                                <button  wire:click="cambiaEstado({{$item}},'{{$item->botonParar}}')" class="w-28 h-28 rounded-full bg-green-600 hover:bg-blue-700 text-white font-bold py-2 px-4 ">
                                    <p>{{$item->botonParar}}</p>
                                </button>

                                @if ($item->botonParar == "Parar")


                                    <button wire:click="cambiaEstado({{$item}},'Finalizar')" class="ml-10 w-28 h-28 rounded-full bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 ">
                                        <p>{{$item->botonFinalizar}}</p>
                                    </button>
                                @endif
                            @endif

                        </div>
                    @endif
                @endif

            </div>
        {{-- </div> --}}
    @endforeach
</div>

