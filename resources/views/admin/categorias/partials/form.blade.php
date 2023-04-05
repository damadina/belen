<div class="form-group">
    {!! Form::label('name', 'Nombre: ') !!}
    {!! Form::text('name', null, ['class' => 'form-control'. ($errors->has('name')? ' is-invalid' : ''),'placeholder'=>'.Escriba un nombre para la categoria']) !!}
    @error('name')
        <span class="invalid-feedback">{{$message}}</span>
    @enderror
</div>

{{-- @error('permisos')
    <br>
    <small class="text-danger">{{$message}}</small>
    <br>
@enderror

@foreach ($permissions as $permiso )
    <div>
        <label>
            {!! Form::checkbox('permissions[]', $permiso->id, null, ['class' => 'mr-1']) !!}
            {{$permiso->name}}
        </label>
    </div>
@endforeach
 --}}
