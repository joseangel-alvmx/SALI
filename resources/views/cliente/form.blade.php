
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('cliente') }}</label>
    <div>
        {{ Form::text('cliente', $cliente->cliente, ['class' => 'form-control' .
        ($errors->has('cliente') ? ' is-invalid' : ''), 'placeholder' => 'Cliente']) }}
        {!! $errors->first('cliente', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">cliente <b>cliente</b>.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('nombre_cliente') }}</label>
    <div>
        {{ Form::text('nombre_cliente', $cliente->nombre_cliente, ['class' => 'form-control' .
        ($errors->has('nombre_cliente') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Cliente']) }}
        {!! $errors->first('nombre_cliente', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint"><b>nombre del cliente</b>.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('agente') }}</label>
    <div>
        {{ Form::text('agente', $cliente->agente, ['class' => 'form-control' .
        ($errors->has('agente') ? ' is-invalid' : ''), 'placeholder' => 'Agente']) }}
        {!! $errors->first('agente', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint"><b>agente</b> cliente.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('referencia bbva') }}</label>
    <div>
        {{ Form::text('ref_bbva', $cliente->ref_bbva, ['class' => 'form-control' .
        ($errors->has('ref_bbva') ? ' is-invalid' : ''), 'placeholder' => 'Ref Bbva']) }}
        {!! $errors->first('ref_bbva', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint"><b>referencia bbva</b>.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('referencia bnx') }}</label>
    <div>
        {{ Form::text('ref_bnx', $cliente->ref_bnx, ['class' => 'form-control' .
        ($errors->has('ref_bnx') ? ' is-invalid' : ''), 'placeholder' => 'Ref Bnx']) }}
        {!! $errors->first('ref_bnx', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint"><b>referencia bnx</b>.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('referencia otros') }}</label>
    <div>
        {{ Form::text('ref_otr', $cliente->ref_otr, ['class' => 'form-control' .
        ($errors->has('ref_otr') ? ' is-invalid' : ''), 'placeholder' => 'Ref Otros']) }}
        {!! $errors->first('ref_otr', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint"><b>referencia otros</b>.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('vendedor') }}</label>
    <div>
        {{ Form::text('vendedor', $cliente->vendedor, ['class' => 'form-control' .
        ($errors->has('vendedor') ? ' is-invalid' : ''), 'placeholder' => 'Vendedor']) }}
        {!! $errors->first('vendedor', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">cliente <b>vendedor</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('nombre_vendedor') }}</label>
    <div>
        {{ Form::text('nombre_vendedor', $cliente->nombre_vendedor, ['class' => 'form-control' .
        ($errors->has('nombre_vendedor') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Vendedor']) }}
        {!! $errors->first('nombre_vendedor', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">cliente <b>nombre_vendedor</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('gerente') }}</label>
    <div>
        {{ Form::text('gerente', $cliente->gerente, ['class' => 'form-control' .
        ($errors->has('gerente') ? ' is-invalid' : ''), 'placeholder' => 'Gerente']) }}
        {!! $errors->first('gerente', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">cliente <b>gerente</b>.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('cedis') }}</label>
    <div>
        {{ Form::text('cedis', $cliente->cedis, ['class' => 'form-control' .
        ($errors->has('cedis') ? ' is-invalid' : ''), 'placeholder' => 'Cedis']) }}
        {!! $errors->first('cedis', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">cliente <b>cedis</b>.</small>
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
