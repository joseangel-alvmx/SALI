<table class="table">
    <thead>
        <tr class="border-bottom">
            <th class="text-start">Nombre</th>
            <th class="text-start">Asignados</th>
            <th class="text-start">Aplicados</th>
            <th class="text-start">Cancelados</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr class="border-bottom py-3">
                <td>{{ $user->Nombre  }}</td>
                <td>{{ $user->Asignado  }}</td>
                <td>{{ $user->Aplicado  }}</td>
                <td>{{ $user->Cancelado  }}</td>
            </tr>
        @endforeach
    </tbody>
</table>