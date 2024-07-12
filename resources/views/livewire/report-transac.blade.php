<div>
    <div class="row row-deck row-cards">
        <div class="col-12">
            <div class="card">
                <div class="card-body border-bottom py-3">
                    <div class="d-flex flex-row justify-content-between pb-1 ">
                        <div class="d-flex gap-2 text-muted align-items-center">
                            <div>
                                <h4 class="m-0">Fecha de registro</h4>
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
                                        <input name="registerDateStart" id="registerDateStart"
                                            class="no-border no-picker datepicker" placeholder="YYYY-MM-DD"
                                            wire:model.defer="registerDateStart" onchange="Livewire.dispatch('updateDates',{key: 'registerDateStart', value: this.value})"></input>
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
                                        <input name="registerDateEnd" id="registerDateEnd"
                                            class="no-border no-picker datepicker" placeholder="YYYY-MM-DD"
                                            wire:model.defer="registerDateEnd" onchange="Livewire.dispatch('updateDates',{key: 'registerDateEnd', value: this.value})"></input>
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
                                                    wire:model.live="showUsuario" id="checkUsuario">
                                                <label class="form-check-label" for="checkUsuario">
                                                    Usuario
                                                </label>
                                            </div>
                                            <div class="form-check m-2">
                                                <input class="form-check-input" type="checkbox"
                                                    wire:model.live="showFechaReg" id="checkFechaReg">
                                                <label class="form-check-label" for="checkFechaReg">
                                                    Fecha Registro
                                                </label>
                                            </div>
                                            <div class="form-check m-2">
                                                <input class="form-check-input" type="checkbox"
                                                    wire:model.live="showDescripcion" id="checkDescripcion">
                                                <label class="form-check-label" for="checkDescripcion">
                                                    Descripción
                                                </label>
                                            </div>
                                            <div class="form-check m-2">
                                                <input class="form-check-input" type="checkbox"
                                                    wire:model.live="showOperacion" id="checkOperacion">
                                                <label class="form-check-label" for="checkOperacion">
                                                    Operación
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary rounded" data-bs-toggle="modal" data-bs-target="#modal-export"
                            wire:click="$dispatch('openExportModal',{lineas: {{$transacCollection}}})">Generar
                            Reporte</button>
                    </div>
                </div>
                <div class="table-responsive min-vh-100">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                            <tr>
                                @if($showUsuario)
                                    <th>
                                        <div
                                            class="dropdown dropdown-checkboxes {{isset($classes['usuario']) ? $classes['usuario'] : ""}}">
                                            <button
                                                class="no-btn-table {{isset($classes['usuario']) ? $classes['usuario'] : ""}}"
                                                data-bs-toggle="dropdown" wire:click="showFiltersData('usuario')"
                                                aria-expanded="{{$showFilters['usuario']}}">
                                                Usuario
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="currentColor"
                                                    class="icon icon-tabler icons-tabler-filled icon-tabler-filter">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M20 3h-16a1 1 0 0 0 -1 1v2.227l.008 .223a3 3 0 0 0 .772 1.795l4.22 4.641v8.114a1 1 0 0 0 1.316 .949l6 -2l.108 -.043a1 1 0 0 0 .576 -.906v-6.586l4.121 -4.12a3 3 0 0 0 .879 -2.123v-2.171a1 1 0 0 0 -1 -1z" />
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end selection-dropdown bg-light {{isset($classes['usuario']) ? $classes['usuario'] : ""}}"
                                                style="{{isset($styles['usuario']) ? $styles['usuario'] : ""}}">
                                                @if ($showFilters['usuario'])
                                                    @foreach ($dataCols['usuario'] ?? [] as $fecha)
                                                        <div>
                                                            <div class="form-check d-flex align-items-center ">
                                                                <input class="input" type="checkbox"
                                                                    wire:click="updateFilteredData('usuario', '{{$fecha}}')"
                                                                    value="{{ isset($columnData['usuario'][strval($fecha)]) }}"
                                                                    @checked(isset($columnData['usuario'][strval($fecha)]))>
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
                                @if($showFechaReg)
                                    <th>
                                        <div
                                            class="dropdown dropdown-checkboxes {{isset($classes['fecha_registro']) ? $classes['fecha_registro'] : ""}}" data-backdrop="static" data-keyboard="false">
                                            <button
                                                class="no-btn-table {{isset($classes['fecha_registro']) ? $classes['fecha_registro'] : ""}}"
                                                data-bs-toggle="dropdown" wire:click="showFiltersData('fecha_registro')"
                                                aria-expanded="{{$showFilters['fecha_registro']}}">
                                                Fecha Registro
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="currentColor"
                                                    class="icon icon-tabler icons-tabler-filled icon-tabler-filter">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M20 3h-16a1 1 0 0 0 -1 1v2.227l.008 .223a3 3 0 0 0 .772 1.795l4.22 4.641v8.114a1 1 0 0 0 1.316 .949l6 -2l.108 -.043a1 1 0 0 0 .576 -.906v-6.586l4.121 -4.12a3 3 0 0 0 .879 -2.123v-2.171a1 1 0 0 0 -1 -1z" />
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end selection-dropdown bg-light {{isset($classes['fecha_registro']) ? $classes['fecha_registro'] : ""}}"
                                                style="{{isset($styles['fecha_registro']) ? $styles['fecha_registro'] : ""}}">
                                                @if ($showFilters['fecha_registro'])
                                                    @foreach ($dataCols['fecha_registro'] as $fecha)
                                                        <div>
                                                            <div class="form-check d-flex align-items-center ">
                                                                <input class="input" type="checkbox"
                                                                    wire:click="updateFilteredData('fecha_registro', '{{$fecha}}')"
                                                                    value="{{ isset($columnData['fecha_registro'][strval($fecha)]) }}"
                                                                    @checked(isset($columnData['fecha_registro'][strval($fecha)]))>
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
                                @if($showDescripcion)
                                    <th>
                                        <div
                                            class="dropdown dropdown-checkboxes {{isset($classes['descripcion']) ? $classes['descripcion'] : ""}}" data-backdrop="static" data-keyboard="false">
                                            <button
                                                class="no-btn-table {{isset($classes['descripcion']) ? $classes['descripcion'] : ""}}"
                                                data-bs-toggle="dropdown" wire:click="showFiltersData('descripcion')"
                                                aria-expanded="{{$showFilters['descripcion']}}">
                                                Descripción
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="currentColor"
                                                    class="icon icon-tabler icons-tabler-filled icon-tabler-filter">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M20 3h-16a1 1 0 0 0 -1 1v2.227l.008 .223a3 3 0 0 0 .772 1.795l4.22 4.641v8.114a1 1 0 0 0 1.316 .949l6 -2l.108 -.043a1 1 0 0 0 .576 -.906v-6.586l4.121 -4.12a3 3 0 0 0 .879 -2.123v-2.171a1 1 0 0 0 -1 -1z" />
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end selection-dropdown bg-light {{isset($classes['descripcion']) ? $classes['descripcion'] : ""}}"
                                                style="{{isset($styles['descripcion']) ? $styles['descripcion'] : ""}}">
                                                @if ($showFilters['descripcion'])
                                                    @foreach ($dataCols['descripcion'] as $fecha)
                                                        <div>
                                                            <div class="form-check d-flex align-items-center ">
                                                                <input class="input" type="checkbox"
                                                                    wire:click="updateFilteredData('descripcion', '{{$fecha}}')"
                                                                    value="{{ isset($columnData['descripcion'][strval($fecha)]) }}"
                                                                    @checked(isset($columnData['descripcion'][strval($fecha)]))>
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
                                @if($showOperacion)
                                    <th>
                                        <div
                                            class="dropdown dropdown-checkboxes {{isset($classes['operacion']) ? $classes['operacion'] : ""}}" data-backdrop="static" data-keyboard="false">
                                            <button
                                                class="no-btn-table {{isset($classes['operacion']) ? $classes['operacion'] : ""}}"
                                                data-bs-toggle="dropdown" wire:click="showFiltersData('operacion')"
                                                aria-expanded="{{$showFilters['operacion']}}">
                                                Operación
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="currentColor"
                                                    class="icon icon-tabler icons-tabler-filled icon-tabler-filter">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M20 3h-16a1 1 0 0 0 -1 1v2.227l.008 .223a3 3 0 0 0 .772 1.795l4.22 4.641v8.114a1 1 0 0 0 1.316 .949l6 -2l.108 -.043a1 1 0 0 0 .576 -.906v-6.586l4.121 -4.12a3 3 0 0 0 .879 -2.123v-2.171a1 1 0 0 0 -1 -1z" />
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end selection-dropdown bg-light {{isset($classes['operacion']) ? $classes['operacion'] : ""}}"
                                                style="{{isset($styles['operacion']) ? $styles['operacion'] : ""}}">
                                                @if ($showFilters['operacion'])
                                                    @foreach ($dataCols['operacion'] as $fecha)
                                                        <div>
                                                            <div class="form-check d-flex align-items-center ">
                                                                <input class="input" type="checkbox"
                                                                    wire:click="updateFilteredData('operacion', '{{$fecha}}')"
                                                                    value="{{ isset($columnData['operacion'][strval($fecha)]) }}"
                                                                    @checked(isset($columnData['operacion'][strval($fecha)]))>
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
                            @foreach ($transacs as $transac)
                                <tr>
                                    @if($showUsuario)
                                        <td>{{ $transac->usuario }}</td>
                                    @endif
                                    @if($showFechaReg)
                                        <td>{{ $transac->fecha_registro }}</td>
                                    @endif
                                    @if($showDescripcion)
                                        <td>{{ $transac->descripcion }}</td>
                                    @endif
                                    @if($showOperacion)
                                        <td>{{ $transac->operacion }}</td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <div class="card-footer d-flex align-items-center">
                    {!! $transacs->links('tablar::pagination') !!}
                </div>
            </div>
        </div>
    </div>
    <livewire:modal-export />
</div>