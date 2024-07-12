<div>
    <div class="row row-deck row-cards">
        <div class="col-12">
            <div class="card">
                <div class="card-body border-bottom py-3">
                    <div class="d-flex flex-row justify-content-between pb-1 ">
                        <div class="d-flex gap-2 text-muted align-items-center">
                            <div>
                                <h4 class="m-0">Fecha de movimiento</h4>
                                <div class="d-flex align-items-center justify-content-center gap-1">
                                    <div
                                        class="form-control form-control-rounded border-blue d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-plus text-primary">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M12.5 21h-6.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v5" />
                                            <path d="M16 3v4" />
                                            <path d="M8 3v4" />
                                            <path d="M4 11h16" />
                                            <path d="M16 19h6" />
                                            <path d="M19 16v6" />
                                        </svg>
                                        <input name="movementDateStart" id="movementDateStart"
                                            class="no-border no-picker datepicker" placeholder="YYYY-MM-DD"
                                            wire:model.defer="movementDateStart"
                                            onchange="Livewire.dispatch('updateDates',{key: 'movementDateStart', value: this.value})"></input>
                                    </div>
                                    <p class="m-0"> - </p>
                                    <div
                                        class="form-control form-control-rounded border-blue d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-plus text-primary">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M12.5 21h-6.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v5" />
                                            <path d="M16 3v4" />
                                            <path d="M8 3v4" />
                                            <path d="M4 11h16" />
                                            <path d="M16 19h6" />
                                            <path d="M19 16v6" />
                                        </svg>
                                        <input name="movementDateEnd" id="movementDateEnd"
                                            class="no-border no-picker datepicker" placeholder="YYYY-MM-DD"
                                            wire:model.defer="movementDateEnd"
                                            onchange="Livewire.dispatch('updateDates',{key: 'movementDateEnd', value: this.value})"></input>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h4 class="m-0">Fecha de aplicacion</h4>
                                <div class="d-flex align-items-center justify-content-center gap-1">
                                    <div
                                        class="form-control form-control-rounded border-blue d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-plus text-primary">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M12.5 21h-6.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v5" />
                                            <path d="M16 3v4" />
                                            <path d="M8 3v4" />
                                            <path d="M4 11h16" />
                                            <path d="M16 19h6" />
                                            <path d="M19 16v6" />
                                        </svg>
                                        <input name="appDateStart" id="appDateStart"
                                            class="no-border no-picker datepicker" placeholder="YYYY-MM-DD"
                                            wire:model.live="appDateStart"
                                            onchange="Livewire.dispatch('updateDates',{key: 'appDateStart', value: this.value})"></input>
                                    </div>
                                    <p class="m-0"> - </p>
                                    <div
                                        class="form-control form-control-rounded border-blue d-flex align-items-center w-10">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-plus text-primary">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M12.5 21h-6.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v5" />
                                            <path d="M16 3v4" />
                                            <path d="M8 3v4" />
                                            <path d="M4 11h16" />
                                            <path d="M16 19h6" />
                                            <path d="M19 16v6" />
                                        </svg>
                                        <input name="appDateEnd" id="appDateEnd" class="no-border no-picker datepicker"
                                            placeholder="YYYY-MM-DD" wire:model.live="appDateEnd"
                                            onchange="Livewire.dispatch('updateDates',{key: 'appDateEnd', value: this.value})"></input>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown">
                                <div>
                                    <button class="table-state new-state no-btn-status" data-bs-toggle="dropdown">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="currentColor"
                                            class="icon icon-tabler icons-tabler-filled icon-tabler-filter">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M20 3h-16a1 1 0 0 0 -1 1v2.227l.008 .223a3 3 0 0 0 .772 1.795l4.22 4.641v8.114a1 1 0 0 0 1.316 .949l6 -2l.108 -.043a1 1 0 0 0 .576 -.906v-6.586l4.121 -4.12a3 3 0 0 0 .879 -2.123v-2.171a1 1 0 0 0 -1 -1z" />
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <div>
                                            <div class="form-check m-2">
                                                <input class="form-check-input" type="checkbox"
                                                    wire:model.live="showFechaMov" id="checkFechaMov">
                                                <label class="form-check-label" for="checkFechaMov">
                                                    Fecha movimiento
                                                </label>
                                            </div>
                                            <div class="form-check m-2">
                                                <input class="form-check-input" type="checkbox"
                                                    wire:model.live="showFechaApp" id="checkFechaApp">
                                                <label class="form-check-label" for="checkFechaApp">
                                                    Fecha Aplicación
                                                </label>
                                            </div>
                                            <div class="form-check m-2">
                                                <input class="form-check-input" type="checkbox"
                                                    wire:model.live="showFolio" id="checkFolio">
                                                <label class="form-check-label" for="checkFolio">
                                                    Folio
                                                </label>
                                            </div>
                                            <div class="form-check m-2">
                                                <input class="form-check-input" type="checkbox"
                                                    wire:model.live="showImporte" id="checkImporte">
                                                <label class="form-check-label" for="checkImporte">
                                                    Importe
                                                </label>
                                            </div>
                                            <div class="form-check m-2">
                                                <input class="form-check-input" type="checkbox"
                                                    wire:model.live="showReferencia" id="checkReferencia">
                                                <label class="form-check-label" for="checkReferencia">
                                                    Referencia Ban.
                                                </label>
                                            </div>
                                            <div class="form-check m-2">
                                                <input class="form-check-input" type="checkbox"
                                                    wire:model.live="showCodi" id="checkCodi">
                                                <label class="form-check-label" for="checkCodi">
                                                    Cod. Cliente
                                                </label>
                                            </div>
                                            <div class="form-check m-2">
                                                <input class="form-check-input" type="checkbox"
                                                    wire:model.live="showStatus" id="checkStatus">
                                                <label class="form-check-label" for="checkStatus">
                                                    Status
                                                </label>
                                            </div>
                                            <div class="form-check m-2">
                                                <input class="form-check-input" type="checkbox"
                                                    wire:model.live="showCobro" id="checkCobro">
                                                <label class="form-check-label" for="checkCobro">
                                                    Cobro
                                                </label>
                                            </div>
                                            @if ($userrol === 'admin' || $userrol === 'conta')
                                                <div class="form-check m-2">
                                                    <input class="form-check-input" type="checkbox"
                                                        wire:model.live="showRefUnica" id="checkRefUnica">
                                                    <label class="form-check-label" for="checkRefUnica">
                                                        Ref. Unica
                                                    </label>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary rounded" data-bs-toggle="modal" data-bs-target="#modal-export"
                            wire:click="$dispatch('openExportModal',{lineas: {{$lineasCollection}}})">Generar
                            Reporte</button>
                    </div>
                </div>
                <div class="table-responsive min-vh-100">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                            <tr>
                                @if($showFechaMov)
                                    <th>
                                        <div class="dropdown dropdown-checkboxes {{isset($classes['fecha_movimiento']) ? $classes['fecha_movimiento'] : ""}}"
                                            data-backdrop="static" data-keyboard="false">
                                            <button
                                                class="no-btn-table {{isset($classes['fecha_movimiento']) ? $classes['fecha_movimiento'] : ""}}"
                                                data-bs-toggle="dropdown" wire:click="showFiltersData('fecha_movimiento')"
                                                aria-expanded="{{$showFilters['fecha_movimiento']}}">
                                                Fecha Mov.
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="currentColor"
                                                    class="icon icon-tabler icons-tabler-filled icon-tabler-filter">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M20 3h-16a1 1 0 0 0 -1 1v2.227l.008 .223a3 3 0 0 0 .772 1.795l4.22 4.641v8.114a1 1 0 0 0 1.316 .949l6 -2l.108 -.043a1 1 0 0 0 .576 -.906v-6.586l4.121 -4.12a3 3 0 0 0 .879 -2.123v-2.171a1 1 0 0 0 -1 -1z" />
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end selection-dropdown bg-light {{isset($classes['fecha_movimiento']) ? $classes['fecha_movimiento'] : ""}}"
                                                style="{{isset($styles['fecha_movimiento']) ? $styles['fecha_movimiento'] : ""}}">
                                                @if ($showFilters['fecha_movimiento'])
                                                    @foreach ($dataCols['fecha_movimiento'] as $fecha)
                                                        <div>
                                                            <div class="form-check d-flex align-items-center ">
                                                                <input class="input" type="checkbox"
                                                                    wire:click="updateFilteredData('fecha_movimiento', '{{$fecha}}')"
                                                                    value="{{ isset($columnData['fecha_movimiento'][strval($fecha)]) }}"
                                                                    @checked(isset($columnData['fecha_movimiento'][strval($fecha)]))>
                                                                <label class="label p-2">{{ $fecha }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="d-flex justify-content-center">
                                                        <div class="spinner-border" role="status">
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </th>
                                @endif
                                @if($showFechaApp)
                                    <th>
                                        <div
                                            class="dropdown dropdown-checkboxes {{isset($classes['fecha_estado']) ? $classes['fecha_estado'] : ""}}">
                                            <button
                                                class="no-btn-table {{isset($classes['fecha_estado']) ? $classes['fecha_estado'] : ""}}"
                                                data-bs-toggle="dropdown" wire:click="showFiltersData('fecha_estado')"
                                                aria-expanded="{{$showFilters['fecha_estado']}}">
                                                Fecha Aplicación.
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="currentColor"
                                                    class="icon icon-tabler icons-tabler-filled icon-tabler-filter">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M20 3h-16a1 1 0 0 0 -1 1v2.227l.008 .223a3 3 0 0 0 .772 1.795l4.22 4.641v8.114a1 1 0 0 0 1.316 .949l6 -2l.108 -.043a1 1 0 0 0 .576 -.906v-6.586l4.121 -4.12a3 3 0 0 0 .879 -2.123v-2.171a1 1 0 0 0 -1 -1z" />
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end selection-dropdown bg-light {{isset($classes['fecha_estado']) ? $classes['fecha_estado'] : ""}}"
                                                style="{{isset($styles['fecha_estado']) ? $styles['fecha_estado'] : ""}}">
                                                @if ($showFilters['fecha_estado'])
                                                    @foreach ($dataCols['fecha_estado'] ?? [] as $fecha)
                                                        <div>
                                                            <div class="form-check d-flex align-items-center ">
                                                                <input class="input" type="checkbox"
                                                                    wire:click="updateFilteredData('fecha_estado', '{{$fecha}}')"
                                                                    value="{{ isset($columnData['fecha_estado'][strval($fecha)]) }}"
                                                                    @checked(isset($columnData['fecha_estado'][strval($fecha)]))>
                                                                <label class="label p-2">{{ $fecha }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="d-flex justify-content-center">
                                                        <div class="spinner-border" role="status">
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </th>
                                @endif
                                @if($showFolio)
                                    <th>
                                        <div class="dropdown dropdown-checkboxes {{isset($classes['folio_banco']) ? $classes['folio_banco'] : ""}}"
                                            data-backdrop="static" data-keyboard="false">
                                            <button
                                                class="no-btn-table {{isset($classes['folio_banco']) ? $classes['folio_banco'] : ""}}"
                                                data-bs-toggle="dropdown" wire:click="showFiltersData('folio_banco')"
                                                aria-expanded="{{$showFilters['folio_banco']}}">
                                                Folio
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="currentColor"
                                                    class="icon icon-tabler icons-tabler-filled icon-tabler-filter">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M20 3h-16a1 1 0 0 0 -1 1v2.227l.008 .223a3 3 0 0 0 .772 1.795l4.22 4.641v8.114a1 1 0 0 0 1.316 .949l6 -2l.108 -.043a1 1 0 0 0 .576 -.906v-6.586l4.121 -4.12a3 3 0 0 0 .879 -2.123v-2.171a1 1 0 0 0 -1 -1z" />
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end selection-dropdown bg-light {{isset($classes['folio_banco']) ? $classes['folio_banco'] : ""}}"
                                                style="{{isset($styles['folio_banco']) ? $styles['folio_banco'] : ""}}">
                                                @if ($showFilters['folio_banco'])
                                                    @foreach ($dataCols['folio_banco'] as $fecha)
                                                        <div>
                                                            <div class="form-check d-flex align-items-center ">
                                                                <input class="input" type="checkbox"
                                                                    wire:click="updateFilteredData('folio_banco', '{{$fecha}}')"
                                                                    value="{{ isset($columnData['folio_banco'][strval($fecha)]) }}"
                                                                    @checked(isset($columnData['folio_banco'][strval($fecha)]))>
                                                                <label class="label p-2">{{ $fecha }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="d-flex justify-content-center">
                                                        <div class="spinner-border" role="status">
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </th>
                                @endif
                                @if($showImporte)
                                    <th>
                                        <div class="dropdown dropdown-checkboxes {{isset($classes['importe']) ? $classes['importe'] : ""}}"
                                            data-backdrop="static" data-keyboard="false">
                                            <button
                                                class="no-btn-table {{isset($classes['importe']) ? $classes['importe'] : ""}}"
                                                data-bs-toggle="dropdown" wire:click="showFiltersData('importe')"
                                                aria-expanded="{{$showFilters['importe']}}">
                                                Importe
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="currentColor"
                                                    class="icon icon-tabler icons-tabler-filled icon-tabler-filter">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M20 3h-16a1 1 0 0 0 -1 1v2.227l.008 .223a3 3 0 0 0 .772 1.795l4.22 4.641v8.114a1 1 0 0 0 1.316 .949l6 -2l.108 -.043a1 1 0 0 0 .576 -.906v-6.586l4.121 -4.12a3 3 0 0 0 .879 -2.123v-2.171a1 1 0 0 0 -1 -1z" />
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end selection-dropdown bg-light {{isset($classes['importe']) ? $classes['importe'] : ""}}"
                                                style="{{isset($styles['importe']) ? $styles['importe'] : ""}}">
                                                @if ($showFilters['importe'])
                                                    @foreach ($dataCols['importe'] as $fecha)
                                                        <div>
                                                            <div class="form-check d-flex align-items-center ">
                                                                <input class="input" type="checkbox"
                                                                    wire:click="updateFilteredData('importe', '{{$fecha}}')"
                                                                    value="{{ isset($columnData['importe'][strval($fecha)]) }}"
                                                                    @checked(isset($columnData['importe'][strval($fecha)]))>
                                                                <label class="label p-2">{{ $fecha }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="d-flex justify-content-center">
                                                        <div class="spinner-border" role="status">
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </th>
                                @endif
                                @if($showReferencia)
                                    <th>
                                        <div class="dropdown dropdown-checkboxes {{isset($classes['referencia']) ? $classes['referencia'] : ""}}"
                                            data-backdrop="static" data-keyboard="false">
                                            <button
                                                class="no-btn-table {{isset($classes['referencia']) ? $classes['referencia'] : ""}}"
                                                data-bs-toggle="dropdown" wire:click="showFiltersData('referencia')"
                                                aria-expanded="{{$showFilters['referencia']}}">
                                                Referencia Bancaria
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="currentColor"
                                                    class="icon icon-tabler icons-tabler-filled icon-tabler-filter">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M20 3h-16a1 1 0 0 0 -1 1v2.227l.008 .223a3 3 0 0 0 .772 1.795l4.22 4.641v8.114a1 1 0 0 0 1.316 .949l6 -2l.108 -.043a1 1 0 0 0 .576 -.906v-6.586l4.121 -4.12a3 3 0 0 0 .879 -2.123v-2.171a1 1 0 0 0 -1 -1z" />
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end selection-dropdown bg-light {{isset($classes['referencia']) ? $classes['referencia'] : ""}}"
                                                style="{{isset($styles['referencia']) ? $styles['referencia'] : ""}}">
                                                @if ($showFilters['referencia'])
                                                    @foreach ($dataCols['referencia'] as $fecha)
                                                        <div>
                                                            <div class="form-check d-flex align-items-center ">
                                                                <input class="input" type="checkbox"
                                                                    wire:click="updateFilteredData('referencia', '{{$fecha}}')"
                                                                    value="{{ isset($columnData['referencia'][strval($fecha)]) }}"
                                                                    @checked(isset($columnData['referencia'][strval($fecha)]))>
                                                                <label class="label p-2">{{ $fecha }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="d-flex justify-content-center">
                                                        <div class="spinner-border" role="status">
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </th>
                                @endif
                                @if($showCodi)
                                    <th>
                                        <div class="dropdown dropdown-checkboxes {{isset($classes['cliente']) ? $classes['cliente'] : ""}}"
                                            data-backdrop="static" data-keyboard="false">
                                            <button
                                                class="no-btn-table {{isset($classes['cliente']) ? $classes['cliente'] : ""}}"
                                                data-bs-toggle="dropdown" wire:click="showFiltersData('cliente')"
                                                aria-expanded="{{$showFilters['cliente']}}">
                                                Cod. Cliente
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="currentColor"
                                                    class="icon icon-tabler icons-tabler-filled icon-tabler-filter">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M20 3h-16a1 1 0 0 0 -1 1v2.227l.008 .223a3 3 0 0 0 .772 1.795l4.22 4.641v8.114a1 1 0 0 0 1.316 .949l6 -2l.108 -.043a1 1 0 0 0 .576 -.906v-6.586l4.121 -4.12a3 3 0 0 0 .879 -2.123v-2.171a1 1 0 0 0 -1 -1z" />
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end selection-dropdown bg-light {{isset($classes['cliente']) ? $classes['cliente'] : ""}}"
                                                style="{{isset($styles['cliente']) ? $styles['cliente'] : ""}}">
                                                @if ($showFilters['cliente'])
                                                    @foreach ($dataCols['cliente'] as $fecha)
                                                        <div>
                                                            <div class="form-check d-flex align-items-center ">
                                                                <input class="input" type="checkbox"
                                                                    wire:click="updateFilteredData('cliente', '{{$fecha}}')"
                                                                    value="{{ isset($columnData['cliente'][strval($fecha)]) }}"
                                                                    @checked(isset($columnData['cliente'][strval($fecha)]))>
                                                                <label class="label p-2">{{ $fecha }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="d-flex justify-content-center">
                                                        <div class="spinner-border" role="status">
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </th>
                                @endif
                                @if($showStatus)
                                    <th>
                                        <div class="dropdown dropdown-checkboxes {{isset($classes['estado']) ? $classes['estado'] : ""}}"
                                            data-backdrop="static" data-keyboard="false">
                                            <button
                                                class="no-btn-table {{isset($classes['estado']) ? $classes['estado'] : ""}}"
                                                data-bs-toggle="dropdown" wire:click="showFiltersData('estado')"
                                                aria-expanded="{{$showFilters['estado']}}">
                                                Estatus
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="currentColor"
                                                    class="icon icon-tabler icons-tabler-filled icon-tabler-filter">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M20 3h-16a1 1 0 0 0 -1 1v2.227l.008 .223a3 3 0 0 0 .772 1.795l4.22 4.641v8.114a1 1 0 0 0 1.316 .949l6 -2l.108 -.043a1 1 0 0 0 .576 -.906v-6.586l4.121 -4.12a3 3 0 0 0 .879 -2.123v-2.171a1 1 0 0 0 -1 -1z" />
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end selection-dropdown bg-light {{isset($classes['estado']) ? $classes['estado'] : ""}}"
                                                style="{{isset($styles['estado']) ? $styles['estado'] : ""}}">
                                                @if ($showFilters['estado'])
                                                    @foreach ($dataCols['estado'] as $key => $fecha)
                                                        <div>
                                                            <div class="form-check d-flex align-items-center ">
                                                                <input class="input" type="checkbox"
                                                                    wire:click="updateFilteredData('estados.descripcion', '{{$fecha}}')"
                                                                    value="{{ isset($columnData['estados.descripcion'][strval($fecha)]) }}"
                                                                    @checked(isset($columnData['estados.descripcion'][strval($fecha)]))>
                                                                <label class="label p-2">{{ $fecha }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="d-flex justify-content-center">
                                                        <div class="spinner-border" role="status">
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </th>
                                @endif
                                @if($showCobro)
                                    <th>
                                        <div class="dropdown dropdown-checkboxes {{isset($classes['cobro']) ? $classes['cobro'] : ""}}"
                                            data-backdrop="static" data-keyboard="false">
                                            <button
                                                class="no-btn-table {{isset($classes['cobro']) ? $classes['cobro'] : ""}}"
                                                data-bs-toggle="dropdown" wire:click="showFiltersData('cobro')"
                                                aria-expanded="{{$showFilters['cobro']}}">
                                                No. Cobro
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="currentColor"
                                                    class="icon icon-tabler icons-tabler-filled icon-tabler-filter">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M20 3h-16a1 1 0 0 0 -1 1v2.227l.008 .223a3 3 0 0 0 .772 1.795l4.22 4.641v8.114a1 1 0 0 0 1.316 .949l6 -2l.108 -.043a1 1 0 0 0 .576 -.906v-6.586l4.121 -4.12a3 3 0 0 0 .879 -2.123v-2.171a1 1 0 0 0 -1 -1z" />
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end selection-dropdown bg-light {{isset($classes['cobro']) ? $classes['cobro'] : ""}}"
                                                style="{{isset($styles['cobro']) ? $styles['cobro'] : ""}}">
                                                @if ($showFilters['cobro'])
                                                    @foreach ($dataCols['cobro'] as $fecha)
                                                        <div>
                                                            <div class="form-check d-flex align-items-center ">
                                                                <input class="input" type="checkbox"
                                                                    wire:click="updateFilteredData('cobro', '{{$fecha}}')"
                                                                    value="{{ isset($columnData['cobro'][strval($fecha)]) }}"
                                                                    @checked(isset($columnData['cobro'][strval($fecha)]))>
                                                                <label class="label p-2">{{ $fecha }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="d-flex justify-content-center">
                                                        <div class="spinner-border" role="status">
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </th>
                                @endif
                                @if($showRefUnica)
                                    <th>
                                        <div class="dropdown dropdown-checkboxes {{isset($classes['referencia_unica']) ? $classes['referencia_unica'] : ""}}"
                                            data-backdrop="static" data-keyboard="false">
                                            <button
                                                class="no-btn-table {{isset($classes['referencia_unica']) ? $classes['referencia_unica'] : ""}}"
                                                data-bs-toggle="dropdown" wire:click="showFiltersData('referencia_unica')"
                                                aria-expanded="{{$showFilters['referencia_unica']}}">
                                                Ref. Unica
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="currentColor"
                                                    class="icon icon-tabler icons-tabler-filled icon-tabler-filter">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M20 3h-16a1 1 0 0 0 -1 1v2.227l.008 .223a3 3 0 0 0 .772 1.795l4.22 4.641v8.114a1 1 0 0 0 1.316 .949l6 -2l.108 -.043a1 1 0 0 0 .576 -.906v-6.586l4.121 -4.12a3 3 0 0 0 .879 -2.123v-2.171a1 1 0 0 0 -1 -1z" />
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end selection-dropdown bg-light {{isset($classes['referencia_unica']) ? $classes['referencia_unica'] : ""}}"
                                                style="{{isset($styles['referencia_unica']) ? $styles['referencia_unica'] : ""}}">
                                                @if ($showFilters['referencia_unica'])
                                                    @foreach ($dataCols['referencia_unica'] as $fecha)
                                                        <div>
                                                            <div class="form-check d-flex align-items-center ">
                                                                <input class="input" type="checkbox"
                                                                    wire:click="updateFilteredData('referencia_unica', '{{$fecha}}')"
                                                                    value="{{ isset($columnData['referencia_unica'][strval($fecha)]) }}"
                                                                    @checked(isset($columnData['referencia_unica'][strval($fecha)]))>
                                                                <label class="label p-2">{{ $fecha }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="d-flex justify-content-center">
                                                        <div class="spinner-border" role="status">
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </th>
                                @endif
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($lineas as $linea)
                                <tr>
                                    @if($showFechaMov)
                                        <td>{{ $linea->fecha_movimiento }}</td>
                                    @endif
                                    @if($showFechaApp)
                                        <td>{{ $linea->fecha_estado }}</td>
                                    @endif
                                    @if($showFolio)
                                        <td>{{ $linea->folio_banco }}</td>
                                    @endif
                                    @if($showImporte)
                                        <td>{{ $linea->importe }}</td>
                                    @endif
                                    @if($showReferencia)
                                        <td>{{ $linea->referencia }}</td>
                                    @endif
                                    @if($showCodi)
                                        <td>{{ $linea->cliente }}</td>
                                    @endif
                                    @if($showStatus)
                                        <td>
                                            <div
                                                class="table-state {{$linea->descripcion === 'Asignado' ? "assigned-state" : ($linea->descripcion === "Aplicado" ? "applied-state" : ($linea->descripcion === "Cancelado" ? "canceled-state" : ""))}}">
                                                {{ $linea->descripcion }}
                                            </div>
                                        </td>
                                    @endif
                                    @if($showCobro)
                                        <td>{{ $linea->cobro }}</td>
                                    @endif
                                    @if ($showRefUnica)
                                        <td>{{ $linea->referencia_unica}}</td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <div class="card-footer d-flex align-items-center">
                    {!! $lineas->links('tablar::pagination') !!}
                </div>
            </div>
        </div>
    </div>
    <livewire:modal-export />
</div>