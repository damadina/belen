<div class="form-group">
    {!! Form::label('dia', 'Fecha: ') !!}
    {!! Form::date('dia', null,['class' => 'h5'. ($errors->has('dia')? ' is-invalid' : '')] ) !!}
    @error('dia')
        <span class="invalid-feedback">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('titulo', 'Título: ') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control'. ($errors->has('titulo')? ' is-invalid' : ''),'placeholder'=>'.Escriba un mensaje para todos los trabajadores']) !!}
    @error('titulo')
        <span class="invalid-feedback">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('mensaje', 'Mensaje: ') !!}
    {!! Form::text('mensaje', null, ['class' => 'form-control'. ($errors->has('mensaje')? ' is-invalid' : ''),'placeholder'=>'.Escriba un mensaje para todos los trabajadores']) !!}
    @error('mensaje')
        <span class="invalid-feedback">{{$message}}</span>
    @enderror
</div>
