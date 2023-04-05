<x-app-layout>
    @php
        $diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

            /* $diaHoy = $diassemana[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
     */
    @endphp
    @foreach ($proximosDias as $item )
        @php
            setlocale(LC_ALL,"es_ES.utf8");
            $date=date_create($item->dia);
            $diaLetra = date_format($date,'w');
            $diaNumero = date_format($date,'d');
            $mes =  date_format($date,'n');
            $fecha = $diassemana[$diaLetra]." ".$diaNumero." de ".$meses[$mes-1];
        @endphp
        <div class="container pt-4 pb-4">
            <div class="w-96 mx-auto">
                <div class=" flex  justify-between items-center  rounded-lg bg-white p-6 shadow-lg dark:bg-neutral-700 ">
                <p class="my-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">{{$fecha}}</p>

                <a href="{{route('verdia',$item->dia)}}">
                    <span class="material-symbols-outlined">visibility</span>
                </a>
                </div>
            </div>
        </div>

    @endforeach
    </x-app-layout>
