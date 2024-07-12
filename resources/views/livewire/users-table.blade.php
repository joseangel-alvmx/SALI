<div class="card">
    <div class="card-header">
        <h3 class="card-title">Usuario</h3>
    </div>
    <div class="card-body border-bottom py-3">
        <div class="d-flex">
            <div class="text-muted">
                Mostrando
                <div class="mx-2 d-inline-block">
                    <input type="text" class="form-control form-control-sm" value="20" size="3"
                            aria-label="Invoices count" wire:model.live.debounce.300ms="pages">
                </div>
                lineas
            </div>
            <div class="ms-auto text-muted">
                Buscar:
                <div class="ms-2 d-inline-block">
                    <input wire:model.live.debounce.300ms="search" type="text" class="form-control form-control-sm"
                            aria-label="Search invoice">
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive min-vh-100">
        <table class="table card-table table-vcenter text-nowrap datatable">
            <thead>
            <tr>
                </th>
                    <th class="text-start">Usuario</th>
                    <th class="text-start">Nombre Usuario</th>
                    <th class="text-start">Rol</th>
                    <th class="text-start">Estado</th>
                <th class="w-1"></th>
            </tr>
            </thead>

            <tbody>
            @foreach ($users as $user)
                <tr>
                        <td>{{ $user->usuario }}</td>
                        <td>{{ $user->nombre_usuario }}</td>
                        <td>{{ $user->rol }}</td>
                        <td>{{ $user->estado?"Activo":"Inactivo" }}</td>

                    <td>
                        <div class="btn-list flex-nowrap">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle align-text-top"
                                        data-bs-toggle="dropdown">
                                    Acciones
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item"
                                        href="{{ route('users.show',$user->id) }}">
                                        Ver
                                    </a>
                                    <a class="dropdown-item"
                                        href="{{ route('users.edit',$user->id) }}">
                                        Editar
                                    </a>
                                    <form
                                        action="{{ route('users.destroy',$user->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                onclick="if(!confirm('Do you Want to Proceed?')){return false;}"
                                                class="dropdown-item text-red"><i
                                                class="fa fa-fw fa-trash"></i>
                                            Borrar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>
    <div class="card-footer d-flex align-items-center">
        {!! $users->links('tablar::pagination') !!}
    </div>
</div>