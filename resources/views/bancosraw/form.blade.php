
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('banco') }}</label>
    <div>
        {{ Form::text('banco', $bancosraw->banco, ['class' => 'form-control' .
        ($errors->has('banco') ? ' is-invalid' : ''), 'placeholder' => 'Banco']) }}
        {!! $errors->first('banco', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">estado de cuenta <b>banco</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('cuenta') }}</label>
    <div>
        {{ Form::text('cuenta', $bancosraw->cuenta, ['class' => 'form-control' .
        ($errors->has('cuenta') ? ' is-invalid' : ''), 'placeholder' => 'Cuenta']) }}
        {!! $errors->first('cuenta', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">estado de cuenta <b>cuenta</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('fecha_valor') }}</label>
    <div>
        {{ Form::text('fecha_valor', $bancosraw->fecha_valor, ['class' => 'form-control' .
        ($errors->has('fecha_valor') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Valor']) }}
        {!! $errors->first('fecha_valor', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">estado de cuenta <b>fecha_valor</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('folio_banco') }}</label>
    <div>
        {{ Form::text('folio_banco', $bancosraw->folio_banco, ['class' => 'form-control' .
        ($errors->has('folio_banco') ? ' is-invalid' : ''), 'placeholder' => 'Folio Banco']) }}
        {!! $errors->first('folio_banco', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">estado de cuenta <b>folio_banco</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('transaccion') }}</label>
    <div>
        {{ Form::text('transaccion', $bancosraw->transaccion, ['class' => 'form-control' .
        ($errors->has('transaccion') ? ' is-invalid' : ''), 'placeholder' => 'Transaccion']) }}
        {!! $errors->first('transaccion', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">estado de cuenta <b>transaccion</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('cargo_abono') }}</label>
    <div>
        {{ Form::text('cargo_abono', $bancosraw->cargo_abono, ['class' => 'form-control' .
        ($errors->has('cargo_abono') ? ' is-invalid' : ''), 'placeholder' => 'Cargo Abono']) }}
        {!! $errors->first('cargo_abono', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">estado de cuenta <b>cargo_abono</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('importe') }}</label>
    <div>
        {{ Form::text('importe', $bancosraw->importe, ['class' => 'form-control' .
        ($errors->has('importe') ? ' is-invalid' : ''), 'placeholder' => 'Importe']) }}
        {!! $errors->first('importe', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">estado de cuenta <b>importe</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('moneda') }}</label>
    <div>
        {{ Form::text('moneda', $bancosraw->moneda, ['class' => 'form-control' .
        ($errors->has('moneda') ? ' is-invalid' : ''), 'placeholder' => 'Moneda']) }}
        {!! $errors->first('moneda', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">estado de cuenta <b>moneda</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('folio_aceptacion') }}</label>
    <div>
        {{ Form::text('folio_aceptacion', $bancosraw->folio_aceptacion, ['class' => 'form-control' .
        ($errors->has('folio_aceptacion') ? ' is-invalid' : ''), 'placeholder' => 'Folio Aceptacion']) }}
        {!! $errors->first('folio_aceptacion', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">estado de cuenta <b>folio_aceptacion</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('referencia') }}</label>
    <div>
        {{ Form::text('referencia', $bancosraw->referencia, ['class' => 'form-control' .
        ($errors->has('referencia') ? ' is-invalid' : ''), 'placeholder' => 'Referencia']) }}
        {!! $errors->first('referencia', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">estado de cuenta <b>referencia</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('tipo_movimiento') }}</label>
    <div>
        {{ Form::text('tipo_movimiento', $bancosraw->tipo_movimiento, ['class' => 'form-control' .
        ($errors->has('tipo_movimiento') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Movimiento']) }}
        {!! $errors->first('tipo_movimiento', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">estado de cuenta <b>tipo_movimiento</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('fecha_carga') }}</label>
    <div>
        {{ Form::text('fecha_carga', $bancosraw->fecha_carga, ['class' => 'form-control' .
        ($errors->has('fecha_carga') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Carga']) }}
        {!! $errors->first('fecha_carga', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">estado de cuenta <b>fecha_carga</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('estatus') }}</label>
    <div>
        {{ Form::text('estatus', $bancosraw->estatus, ['class' => 'form-control' .
        ($errors->has('estatus') ? ' is-invalid' : ''), 'placeholder' => 'Estatus']) }}
        {!! $errors->first('estatus', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">estado de cuenta <b>estatus</b> instruction.</small>
    </div>
</div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="#" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Submit</button>
            </div>
        </div>
    </div>
