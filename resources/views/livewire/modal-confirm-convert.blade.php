<div>
    <div class="modal fade {{$class}}" id="modal-confirm-convert" tabindex="-1" aria-labelledby="confirmConvertTitle"
        style="{{$style}}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-blue">
                <div>
                    <div class="modal-header modal-blue-header">
                        <h1 class="modal-title fs-10" id="confirmConvertTitle">Exportar Modelo</h1>
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
                            <p>Estas lineas han sido reasignadas correctamente</p>
                            <p>Quieres exportar estas lineas a un formato?</p>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="export()"
                        data->Exportar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
</script>