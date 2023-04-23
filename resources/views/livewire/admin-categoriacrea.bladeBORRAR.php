<div>
   {{--  <button class="btn-sm btn-primary" >Nueva categoría</button> --}}
    <x-danger-button>
        Nueva categoría
    </x-danger-button>



    <x-dialog-modal wire:model='open'>
        <x-slot name="title">
            Nueva categoría
        </x-slot>
        <x-slot name="content">
            Contenido
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('openModaln',false)">
                Cancelar
            </x-secondary-button>
            <x-danger-button class="ml-4" wire:click="saveTarea">
                Crear categoría
            </x-danger-button>
        </x-slot>

    </x-dialog-modal>
</div>
