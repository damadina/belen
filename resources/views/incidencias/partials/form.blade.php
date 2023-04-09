<div class="form-group">
    {!! Form::label('incidencia', 'Incidencia: ') !!}
    {{-- {!! Form::text('name', null, ['class' => 'form-control'. ($errors->has('name')? ' is-invalid' : ''),'placeholder'=>'.Escriba un nombre para la categoria']) !!} --}}
    {!! Form::textarea('incidencia', null, [
        'class'      => 'form-control w-full',
        'rows'       => 4,
        'name'       => 'txt',
        'id'         => 'txt',
    ]) !!}



    @error('name')
        <span class="invalid-feedback">{{$message}}</span>
    @enderror
</div>
