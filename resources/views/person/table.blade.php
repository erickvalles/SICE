@if(!isset($imported))
<h4 class="info-title">{{ "Se ha(n) obtenido {$people->total()} resultado(s)." }}</h4>
@endif
<table class="table">
    <thead>
    <tr>
        <th class="text-center">Código</th>
        <th>Nombre</th>
        <th class="text-center">Acciones</th>
    </tr>
    </thead>
    <tbody>
    @forelse($people as $person)
        <tr>
            @php
                setlocale(LC_TIME,'Spanish');
                \Carbon\Carbon::setUtf8(true);
            @endphp
            <td class="text-center">{{$person->codigo}}</td>
            <td class="text-center">{{$person->fullName }}</td>
            <td>
                <a href="{{ route('student.show', $person->codigo) }}">
                    <button type="button" data-toggle="tooltip" data-placement="top" class="btn btn-info btn-fab" title="Detalles del usuario">
                        <i class="material-icons">more_vert</i>
                    </button>
                </a>
                <a href="{{ route('student.edit', $person->codigo) }}">
                    <button type="button" data-toggle="tooltip" data-placement="top" class="btn btn-success btn-fab" title="Editar">
                        <i class="material-icons">edit</i>
                    </button>
                </a>
                @if(!isset($imported))
                    <a href="#" onclick="confirmDelete(event, '{{ $person->fullName }}', '{{ route('student.destroy', $person->codigo) }}')">
                        <button type="button" class="btn btn-danger btn-fab" title="Eliminar">
                            <i class="material-icons">delete_forever</i>
                        </button>
                    </a>
                @endif
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="3">
                No se han obtenido resultados de la búsqueda
            </td>
        </tr>
    @endforelse
    </tbody>
    <tfoot>
    <tr>
        <td class="text-center" colspan="3">
            {{ $people->render('layouts.pagination') }}
        </td>
    </tr>
    </tfoot>
</table>
