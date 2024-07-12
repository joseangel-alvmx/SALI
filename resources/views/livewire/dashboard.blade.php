<div class="row g-2 align-items-center">
    <div class="d-flex justify-content-center w-100 flex-column gap-2 mx-auto">
        <div class="d-flex flex-row flex-wrap gap-1 justify-self-center">
            <div class="w-100 d-flex flex-row my-3">
                <div class="w-50">
                    <div class="d-flex align-items-center justify-content-center gap-1">
                        <div class="form-control form-control-rounded border-blue d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-plus text-primary">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12.5 21h-6.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v5" />
                                <path d="M16 3v4" />
                                <path d="M8 3v4" />
                                <path d="M4 11h16" />
                                <path d="M16 19h6" />
                                <path d="M19 16v6" />
                            </svg>
                            <input name="dateStart" id="dateStart" class="no-border no-picker datepicker"
                                placeholder="YYYY-MM-DD" wire:model.defer="dateStart"
                                onchange="Livewire.dispatch('updateDates',{key: 'dateStart', value: this.value})"></input>
                        </div>
                        <p class="m-0"> - </p>
                        <div class="form-control form-control-rounded border-blue d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-plus text-primary">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12.5 21h-6.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v5" />
                                <path d="M16 3v4" />
                                <path d="M8 3v4" />
                                <path d="M4 11h16" />
                                <path d="M16 19h6" />
                                <path d="M19 16v6" />
                            </svg>
                            <input name="dateEnd" id="dateEnd" class="no-border no-picker datepicker"
                                placeholder="YYYY-MM-DD" wire:model.defer="dateEnd"
                                onchange="Livewire.dispatch('updateDates',{key: 'dateEnd', value: this.value})"></input>
                        </div>
                    </div>
                </div>
                <div class="d-flex mx-2 gap-2">
                    <div class="form-control form-control-rounded border-blue d-flex align-items-center">
                        <x-select name="month_selected" :options="$months" label="Month" class="no-border no-picker"
                            wire:model.live="month_selected" />
                    </div>
                    <div class="form-control form-control-rounded border-blue d-flex align-items-center">
                        <x-select name="year_selected" :options="$years" label="Year" class="no-border no-picker" wire:model.live="year_selected" />
                    </div>
                </div>

            </div>
            <div
                class="total-records-container-filled {{$userrol != "admin" && $userrol != "super" ? "records-container-lg" : ""}}">
                <div>
                    <h3> Total Registros:</h3>
                    <div class="records-number">{{$countTotalRegisters}}</div>
                </div>
                <i class="ti ti-file-search text-light" style="font-size: 40px;"></i>
            </div>
            <div
                class="unassigned-records-container-filled {{$userrol != "admin" && $userrol != "super" ? "records-container-lg" : ""}}">
                <div>
                    <h3> Registros sin asignar:</h3>
                    <div class="records-number">{{$countUnassignedRegisters}}</div>
                </div>
                <i class="ti ti-file-plus text-light" style="font-size: 40px;"></i>
            </div>
            <div
                class="assigned-records-container-filled {{$userrol != "admin" && $userrol != "super" ? "records-container-lg" : ""}}">
                <div>
                    <h3> Registros asignados:</h3>
                    <div class="records-number">{{$countAssignedRegisters}}</div>
                </div>
                <i class="ti ti-file-search text-light" style="font-size: 40px;"></i>
            </div>
            <div
                class="applied-records-container-filled {{$userrol != "admin" && $userrol != "super" ? "records-container-lg" : ""}}">
                <div>
                    <h3> Registros aplicados:</h3>
                    <div class="records-number">{{$countAppliedRegisters}}</div>
                </div>
                <i class="ti ti-file-plus text-light" style="font-size: 40px;"></i>
            </div>
            <div
                class="canceled-records-container-filled {{$userrol != "admin" && $userrol != "super" ? "records-container-lg" : ""}}">
                <div>
                    <h3> Registros cancelados:</h3>
                    <div class="records-number">{{$countCanceledRegisters}}</div>
                </div>
                <i class="ti ti-file-minus text-light" style="font-size: 40px;"></i>
            </div>
            @if($userrol == "admin" || $userrol == "super")
                <div
                    class="unassigned-records-container-filled {{$userrol != "admin" && $userrol != "super" ? "records-container-lg" : ""}}">
                    <div>
                        <h3> Registros no identificados:</h3>
                        <div class="records-number">{{$countNoIdRegisters}}</div>
                    </div>
                    <i class="ti ti-file-plus text-light" style="font-size: 40px;"></i>
                </div>
            @endif
        </div>
        <div class="d-flex gap-1 flex-row flex-wrap">
            <div
                class="total-records-container {{$userrol != "admin" && $userrol != "super" ? "records-container-lg" : ""}}">
                <div>
                    <h3> Total Registros:</h3>
                    <div class="records-number-sm">{{$countTotal}}</div>
                </div>
                <i class="ti ti-coin-filled" style="font-size: 40px; color: #0085ff"></i>
            </div>
            <div
                class="unassigned-records-container {{$userrol != "admin" && $userrol != "super" ? "records-container-lg" : ""}}">
                <div>
                    <h3> Registros sin asignar:</h3>
                    <div class="records-number-sm">{{$countUnassigned}}</div>
                </div>
                <i class="ti ti-coin-filled" style="font-size: 40px; color: #c0c0c0"></i>
            </div>
            <div
                class="assigned-records-container {{$userrol != "admin" && $userrol != "super" ? "records-container-lg" : ""}}">
                <div>
                    <h3> Registros asignados:</h3>
                    <div class="records-number-sm">{{$countAssigned}}</div>
                </div>
                <i class="ti ti-coin-filled" style="font-size: 40px; color: #efe500;"></i>
            </div>
            <div
                class="applied-records-container {{$userrol != "admin" && $userrol != "super" ? "records-container-lg" : ""}}">
                <div>
                    <h3> Registros aplicados:</h3>
                    <div class="records-number-sm">{{$countApplied}}</div>
                </div>
                <i class="ti ti-coin-filled" style="font-size: 40px; color: #0abf04;"></i>
            </div>
            <div
                class="canceled-records-container {{$userrol != "admin" && $userrol != "super" ? "records-container-lg" : ""}}">
                <div>
                    <h3> Registros cancelados:</h3>
                    <div class="records-number-sm">{{$countCanceled}}</div>
                </div>
                <i class="ti ti-coin-filled" style="font-size: 40px; color: #f20505;"></i>
            </div>
            @if($userrol == "admin" || $userrol == "super")
                <div
                    class="unassigned-records-container {{$userrol != "admin" && $userrol != "super" ? "records-container-lg" : ""}}">
                    <div>
                        <h3> Registros no identificados:</h3>
                        <div class="records-number-sm">{{$countNoId}}</div>
                    </div>
                    <i class="ti ti-coin-filled" style="font-size: 40px; color: #c0c0c0"></i>
                </div>
            @endif
        </div>
    </div>
    <div class="d-flex gap-2 mt-3 flex-wrap justify-content-center">
        <div class="card p-3">
            <livewire:deposited-chart />
        </div>
        <div class="card p-3">
            <h3>Usuarios</h3>
            <livewire:user-metrics-table />
        </div>
    </div>
    <div class="card p-3">
        <livewire:applied-chart />
    </div>
</div>