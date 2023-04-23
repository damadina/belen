<div>
    <div class="mb-8">
        @livewire("trabajadores-crea")
    </div>

    <div class="flex justify-center items-center">
        <i class="fas fa-search mr-2"></i>
        <input wire:model='search' class="form-control w-100" placeholder="Escriba un nombre">
    </div>
    @if ($users->count())


            <table class="table table-striped mt-4">
                <thead>
                    <tr>

                        <th>Nombre</th>
                        <th>Email</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user )
                        <tr>

                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>


                            <td width="10px">
                                {{-- <a class="btn btn-primary" href="{{route('admin.users.edit',$user)}}">Editar</a> --}}
                                <i class="cursor-pointer fa-lg text-primary fas fa-edit" wire:click="edit({{$user}})"></i>
                            </td>


                            <td width="10px">

                            {{-- <a wire:click="$emit('deleteUser',{{$user->id}})" class="btn btn-danger">Eliminar</a> --}}
                            <i class="cursor-pointer fa-lg fas text-danger fa-eraser mr-2" wire:click="$emit('deleteTrabajador',{{$user}})"></i>
                            </td>



                        </tr>
                    @endforeach
                </tbody>

            </table>

        <div class="card-footer">
            {{$users->links()}}
        </div>
        @else
        <div class="card-body">
            <strong>No hay ningún usuario con ese nombre</strong>
        </div>
    @endif

    <x-dialog-modal wire:model='open_edit'>
        <x-slot name="title">
           Modificar datos del trabajador
        </x-slot>
        <x-slot name="content">
            <div>
                {!! Form::label('name', 'Nombre: ') !!}
                {!! Form::text('name', null, ['wire:model.defer' => 'name','class' => 'form-control'. ($errors->has('name')? ' is-invalid' : ''),'placeholder'=>'.Escriba el nombre del trabajador']) !!}
                <x-input-error for="name"/>
            </div>
            <div>
                {!! Form::label('email', 'Correo electrónico', ['class' => 'mt-4']) !!}
                {!! Form::text('email', null, ['wire:model.defer' => 'email','class' => 'form-control'. ($errors->has('email')? ' is-invalid' : ''),'placeholder'=>'.Escriba el correo electrónico del trabajador']) !!}
                <x-input-error for="email"/>
            </div>
            <div>
                {!! Form::label('password', 'Contraseña', ['class' => 'mt-4']) !!}

                <div class="input-group mb-3">
                    <input type="password" wire:model.defer="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="Nueva contraseña">

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                        </div>
                    </div>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                           {{ $message }}
                        </span>
                    @enderror


                </div>
            </div>

            <div>
                <div class="input-group mb-3">
                    <input type="password" wire:model="password_confirmation"    name="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        placeholder="{{ __('adminlte::adminlte.retype_password') }}">

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                        </div>
                    </div>

                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            </div>

            <div>
                {!! Form::label('', 'Lista de Roles: ', ['class' => 'mt-4']) !!}
                @foreach ($listaRoles as $role )
                    <div>
                        <label>
                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1', 'wire:model' => 'roles'])!!}
                            {{$role->name}}
                        </label>
                    </div>
                @endforeach
            </div>




        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open_edit',false)">
                Cancelar
            </x-secondary-button>
            <x-danger-button class="ml-4" wire:click="update" wire:laoding.attr="disabled" class="disabled:opacity-25">
                Modificar datos del trabajador
            </x-danger-button>
        </x-slot>

    </x-dialog-modal>

</div>
