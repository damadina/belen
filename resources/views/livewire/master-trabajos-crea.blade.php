<div>
    <button class="btn-sm btn-danger" wire:click="openModal" >Nuevo trabajo</button>
    <x-dialog-modal wire:model="modalOpen">
        <x-slot name="title">
           NUEVO TRABAJO
           <hr>
        </x-slot>
        <x-slot name="content">
            <div class="mb-2">
                <x-label value="Nombre del tipo de trabajo" class="text-red-800"/>
                <x-input type="text" class="w-full" wire:model="name"/>
                <x-input-error for="name"/>

            </div>
            <div >
                <x-label value="Categoría" class="text-red-800"/>
                <select data-te-select-init wire:model="categoriaSelect">
                    <option value=null>Sin categoria</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->name}}</option>
                    @endforeach
                </select>

            </div>


        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('modalOpen',false)">
                Cancelar
            </x-secondary-button>
            <x-danger-button class="ml-4" wire:click="saveTrabajo">
                Crear trabajo
            </x-danger-button>
        </x-slot>

    </x-dialog-modal>

</div>
