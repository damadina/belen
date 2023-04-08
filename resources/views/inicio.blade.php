<x-app-layout>
    @if($mensajeDia)
        <div class ="" role="alert">
            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
            {{$mensajeDia->titulo}}
            </div>
            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                <p>{{$mensajeDia->mensaje}}</p>
            </div>
        </div>

    @endif



    <div class="text-center mt-4">
        {{$fechaFormateada}}
    </div>




    @if($jornada)
        <div class="w-full p-4 sm:container ">
            <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                <p class="font-bold">Hola, {{$nombre}}</p>
                <p class="text-sm">Tienes {{$trabajos->count()}} trabajos programados para hoy. !que tengas un buen día!.</p>
              </div>

            @foreach ($trabajos as $trabajo )
                @php
                    $tareas = $trabajo->tareas;
                    $pendientes = 0;
                    foreach ($tareas as $tarea) {
                        if ($tarea->fin == null) {
                            $pendientes = $pendientes + 1;
                        }
                    }

                @endphp



                <div class="shadow-md bg-gray-50 mt-2 grid grid-cols-12 ">
                    <div class="p-2 col-span-10">
                       <p class="text-gray-900">{{$trabajo->name}}</p>
                       <p class="text-gray-800 mt-2 italic"> {{$trabajo->descripcion}}</p>
                    </div>

                    <div class="col-span-2 my-auto flex justify-end ">
                        <a href="{{route('trabajo',$trabajo,true)}}" class="flex">
                            <span class="icon-button-badge
                            @if($pendientes == 0)
                                bg-green-600
                            @endif

                            mr-2">{{$pendientes}}</span>
                            <i class="text-red-600 mr-4  text-2xl fas fa-chevron-right"></i>
                        </a>
                    </div>


                </div>
            @endforeach


        </div>
    @else
        <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
            <p class="font-bold">Hola, {{$nombre}}</p>
            <p class="text-sm">No tienes trabajos programados para hoy. !que tengas un buen día!.</p>
        </div>

    @endif
</x-app-layout>


