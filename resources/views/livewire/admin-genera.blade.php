<div>

            <div class="flex justify-center items-center">
                <div>
                    <label class="mr-2">Desde: </label>
                   {{--  {!! Form::date('fechaDesde', $fechaDesde,['wire:model'=>'fechaDesde']) !!} --}}
                   <input type="date"  value="{{$fechaDesde}}" min="{{$fechaDesdeMin}}" max="{{$fechaDesdeMax}}" wire:model='fechaDesde'>

                </div>
                <div class="ml-4">
                    <label class="mr-2">Hasta: </label>
                    <input type="date"  value="{{$fechaHasta}}" min="{{$fechaHastaMin}}" max="{{$fechaHastaMax}}" wire:model='fechaHasta'>
                </div>
            </div>
            <div class="flex justify-center items-center pt-4">
                <p>Dias: </p>
                <p class="ml-2 font-semibold">{{count($range)}}</p>
            </div>
            <div class="mx-auto flex justify-center items-center mt-10">
                <button type="button" class="btn btn-danger" wire:click="$emit('generaClick','{{$confirmationMensage}}')" {{$okPlantillas}}>
                    Generar
                </button>
             </div>
             <p class="text-center text-danger font-weight-bold pt-4">{{$message}}</p>
             {{-- {{$fechaDesde}} --}}
            {{-- <p>fechaDesde: {{$fechaDesde}}</p>
            <p>fechaDesdeMin: {{$fechaDesdeMin}}</p>
            <p>fechaDesdeMax: {{$fechaDesdeMax}}</p>
            <p>fechaHastaMin: {{$fechaHastaMin}}</p>
            <p>fechaHastaMax: {{$fechaHastaMax}}</p> --}}
</div>
