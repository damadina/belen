<div>

    <div class="mb-8">
        @livewire("categoria-crea")
    </div>


    @if ($categorias->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>NOMBRE</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $item )

                    <tr>

                        <td>{{$item->name}}</td>

                        <td width="10px">
                            <i class="cursor-pointer fa-lg text-primary fas fa-edit" wire:click="edit({{$item}})"></i>
                        </td>

                        <td width="10px">
                            <i class="cursor-pointer fa-lg fas text-danger fa-eraser mr-2" wire:click="$emit('deleteCategoria',{{$item}})"></i>
                        </td>
                @endforeach


            </tbody>

        </table>
    @else
        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
            <p class="font-bold">No hay ninguna categoría creada</p>
            <p>Empieza a crearlas.</p>
        </div>
    @endif
    <x-dialog-modal wire:model='open_edit'>
        <x-slot name="title">
            Editar categoría
        </x-slot>
        <x-slot name="content">
            <div class="mb-2">
                <x-label value="Nombre de la Categoría" class="text-red-800"/>
                <x-input type="text" class="w-full" wire:model="name"/>
                <x-input-error for="name"/>
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open_edit',false)">
                Cancelar
            </x-secondary-button>
            <x-danger-button class="ml-4" wire:click="update" wire:laoding.attr="disabled" class="disabled:opacity-25">
                Modificar categoría
            </x-danger-button>
        </x-slot>

    </x-dialog-modal>

</div>
