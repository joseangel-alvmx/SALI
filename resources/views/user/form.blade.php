
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('usuario') }}</label>
    <div>
        {{ Form::text('usuario', $user->usuario, ['class' => 'form-control' .
        ($errors->has('usuario') ? ' is-invalid' : ''), 'placeholder' => 'Usuario']) }}
        {!! $errors->first('usuario', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">Usuario <b>usuario</b></small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('nombre_usuario') }}</label>
    <div>
        {{ Form::text('nombre_usuario', $user->nombre_usuario, [
            'class' => 'form-control' . ($errors->has('nombre_usuario') ? ' is-invalid' : ''),
            'placeholder' => 'Nombre Usuario',
            'disabled' => str_contains(Request::url(), '/users/'.$user->id.'/edit')  // Verifica si la URL actual contiene '/user/edit'
        ]) }}
        @if (str_contains(Request::url(), '/users/'.$user->id.'/edit'))
            {{ Form::hidden('nombre_usuario', $user->nombre_usuario) }}
        @endif
        {!! $errors->first('nombre_usuario', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">Usuario <b>correo</b></small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('rol') }}</label>
    <div>
        {{ Form::select('rol', ['admin' => 'Admin', 'agente' => 'Agente', 'conta' => 'Contabilidad', 'super' => 'Supervisor'], $user->rol, ['class' => 'form-control' . ($errors->has('rol') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un rol']) }}
        {!! $errors->first('rol', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint"><b>Rol</b> usuario.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('estado') }}</label>
    <div>
        {{ Form::select('estado', [1 => 'Activo', 0 => 'Inactivo'], $user->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un estado']) }}
        {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint"><b>Estado</b> usuario.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('clave') }}</label>
    <div>
        {{ Form::password('clave', ['class' => 'form-control' . ($errors->has('clave') ? ' is-invalid' : ''), 'placeholder' => 'Clave']) }}
        {!! $errors->first('clave', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint"><b>Clave</b> usuario.</small>
    </div>
</div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="#" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Guardar</button>
            </div>
        </div>
    </div>
