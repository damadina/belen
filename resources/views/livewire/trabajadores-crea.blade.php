<div>
    <button class="btn-sm btn-danger" wire:click="openModal" >Nuevo trabajador</button>

    <x-dialog-modal wire:model='modalOn'>
        <x-slot name="title">
            Nuevo trabajador
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
                {{-- Password field --}}
                <div class="input-group mb-3">
                    <input type="password" wire:model.defer="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="{{ __('adminlte::adminlte.password') }}">

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



            <div class="mb-2">

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('modalOn',false)">
                Cancelar
            </x-secondary-button>
            <x-danger-button class="ml-4" wire:click="saveTrabajador" wire:laoding.attr="disabled" class="disabled:opacity-25">
                Crear trabajador
            </x-danger-button>
        </x-slot>

    </x-dialog-modal>

</div>
