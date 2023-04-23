<div>
    <div class="mb-8">
        @livewire("roles-crea")
    </div>



    <div class="car-body">
        <table class="table table-striped">
            <thead>
                <tr>

                    <th>NOMBRE</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($roles as $role )

                    <tr>

                        <td>{{$role->name}}</td>

                        <td width="10px">
                            {{-- <a class="btn btn-secondary"  href="{{route('admin.roles.edit',$role)}}">Editar</a> --}}
                            <i class="cursor-pointer fa-lg text-primary fas fa-edit" wire:click="edit({{$role}})"></i>
                        </td>

                        <td width="10px">
                            <i class="cursor-pointer fa-lg fas text-danger fa-eraser mr-2" wire:click="$emit('deleteRole',{{$role}})"></i>

                            {{-- <form action="{{route('admin.roles.destroy',$role)}}" method="POST">
                                 @method('delete')
                                 @csrf
                                <button class="btn btn-danger" type="submit">Eliminar</button>
                            </form> --}}
                        </td>
                @empty
                    <tr>
                        <td colspan="4">No hay ningún rol refistrado</td>
                    </tr>
                @endforelse

            </tbody>

        </table>
        <x-dialog-modal wire:model='open_edit'>
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
                <x-secondary-button wire:click="$set('open_edit',false)">
                    Cancelar
                </x-secondary-button>
                <x-danger-button class="ml-4" wire:click="saveRol" wire:laoding.attr="disabled" class="disabled:opacity-25">
                    Modificar Rol
                </x-danger-button>
            </x-slot>

        </x-dialog-modal>
    </div>
</div>
