<div>
    <x-button wire:click="ver()" >
        <i class="fas fa-tasks"></i>
    </x-button>
    <x-dialog-modal wire:model='openModal'>
        <x-slot name="title">
           Horas asignadas
        </x-slot>

        <x-slot name="content">
            @isset($lista)
                @foreach ($lista as $key => $each )
                <div class="mt-2">
                <span class="h5">{{$key}}:</span>
                <span class="h5 ml-2"> {{$each}} Horas</span>
                </div>
                @endforeach
            @endisset

        </x-slot>
        <x-slot name="footer">
            <x-button wire:click="cerrar()" >
                Cerrar
            </x-danger-button>
        </x-slot>

    </x-dialog-modal>

</div>
