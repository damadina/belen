<div class="form-group">
    {!! Form::label('name', 'Nombre: ') !!}
    {!! Form::text('name', null, ['class' => 'form-control'. ($errors->has('name')? ' is-invalid' : ''),'placeholder'=>'.Escriba el nombre del trabajador']) !!}
    @error('name')
        <span class="invalid-feedback">{{$message}}</span>
    @enderror

    {!! Form::label('email', 'Correo electrónico', ['class' => 'mt-4']) !!}
    {!! Form::text('email', null, ['class' => 'form-control'. ($errors->has('email')? ' is-invalid' : ''),'placeholder'=>'.Escriba el correo electrónico del trabajador']) !!}
    @error('email')
        <span class="invalid-feedback">{{$message}}</span>
    @enderror

   {{--  {!! Form::label('password', 'Contraseña', ['class' => 'mt-4']) !!}
    {!! Form::text('password', null, ['class' => 'form-control'. ($errors->has('password')? ' is-invalid' : ''),'placeholder'=>'.Escriba una contraseña']) !!}
    @error('password')
        <span class="invalid-feedback">{{$message}}</span>
    @enderror --}}

    @if(!@isset($modeEdit))

        {!! Form::label('password', 'Contraseña', ['class' => 'mt-4']) !!}
        {{-- Password field --}}
        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                placeholder="{{ __('adminlte::adminlte.password') }}">

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Confirm password field --}}
        <div class="input-group mb-3">
            <input type="password" name="password_confirmation"
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

    @endif

    {!! Form::label('', 'Lista de Roles: ', ['class' => 'mt-4']) !!}

    @foreach ($roles as $role )
        <div>
            <label>
                {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                {{$role->name}}
            </label>
        </div>
    @endforeach


</div>


