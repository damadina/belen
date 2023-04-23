<div>
    <button class="btn-sm btn-danger" wire:click="openModal" >Nuevo rol</button>

    <x-dialog-modal wire:model='modalOn'>
        <x-slot name="title">
            Nuevo rol
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                {!! Form::label('name', 'Nombre: ') !!}
                {!! Form::text('name', null, ['wire:model.defer' => 'name','class' => 'form-control'. ($errors->has('name')? ' is-invalid' : ''),'placeholder'=>'.Escriba un nombre para el Rol']) !!}
                @error('name')
                    <span class="invalid-feedback">{{$message}}</span>
                @enderror
            </div>
            <strong class="mb-2">Permisos:</strong>
            @error('permisos')
                <br>
                <small class="text-danger">{{$message}}</small>
                <br>
            @enderror

            @foreach ($listaPermisos as $permiso )
                <div>
                    <label>
                        {!! Form::checkbox('permisos[]', $permiso->id, null, ['wire:model' => 'permisos','class' => 'mr-1']) !!}
                        {{$permiso->name}}
                    </label>
                </div>
            @endforeach
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('modalOn',false)">
                Cancelar
            </x-secondary-button>
            <x-danger-button class="ml-4" wire:click="saveRol" wire:laoding.attr="disabled" class="disabled:opacity-25">
                Crear Rol
            </x-danger-button>
        </x-slot>

    </x-dialog-modal>
</div>
