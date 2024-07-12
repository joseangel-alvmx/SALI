<div>
    <div class="modal fade {{$class}}" id="modal-export" tabindex="-1" aria-labelledby="aplicarAsignacionTitle"
        style="{{$style}}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-blue">
                <div>
                    <div class="modal-header modal-blue-header">
                        <h1 class="modal-title fs-10" id="aplicarAsignacionTitle">Exportar Modelo</h1>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check records-icon">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                            <path d="M9 12l2 2l4 -4" />
                        </svg>
                    </div>
                    <div class="modal-body">
                        @if ($lineas != null)
                            <!-- Text input for title -->
                            <p>En que formato quieres exportar este documento:</p>
                            <!-- Select user with dropdown -->
                            <x-select name="export_selected" :options="$options" label="Exportación Opciones"
                                wire:model="export_selected" />
                        @else
                            <p>Espere un momento</p>
                            <div class="d-flex justify-content-center">
                                <div class="spinner-border" role="status">
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="spinner-border {{$loading?"":"d-none"}}" id="spinner-footer" role="status"></div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="exportButton"
                        wire:click="openExport()">Exportar</button>
                </div>
            </div>
        </div>
    </div>
</div>