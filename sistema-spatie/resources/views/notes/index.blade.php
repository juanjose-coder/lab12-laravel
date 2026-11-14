@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Listado de notas</h2>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notes as $note)
                <tr>
                    <td>{{ $note->id }}</td>
                    <td>{{ $note->title }}</td>
                    <td>
                        {{-- @can verifica si el usuario tiene el permiso destroy_notes --}}
                        @can('destroy_notes')
                            <form action="{{ route('notes.destroy', $note->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Eliminar nota</button>
                            </form>
                        @else
                            Usted no puede eliminar esta nota
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
