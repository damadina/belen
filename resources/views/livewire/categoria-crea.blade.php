<div>
    <button class="btn-sm btn-danger" wire:click="openModal" >Nueva categoría</button>



    <x-dialog-modal wire:model='modalOn'>
        <x-slot name="title">
            Nueva categoría
        </x-slot>
        <x-slot name="content">
            <div class="mb-2">
                <x-label value="Nombre de la Categoría" class="text-red-800"/>
                <x-input type="text" class="w-full" wire:model="name"/>
                <x-input-error for="name"/>
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('modalOn',false)">
                Cancelar
            </x-secondary-button>
            <x-danger-button class="ml-4" wire:click="saveCategoria" wire:laoding.attr="disabled" class="disabled:opacity-25">
                Crear categoría
            </x-danger-button>
        </x-slot>

    </x-dialog-modal>

</div>
