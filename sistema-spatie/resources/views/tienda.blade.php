@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tienda</h2>

    {{-- Comprobación por ROL --}}
    @if (Auth::user()->hasRole('cliente'))
        <h4>Eres un cliente</h4>
    @endif

    {{-- Comprobación por PERMISO --}}
    @if (Auth::user()->hasPermissionTo('validar_venta'))
        <button class="btn btn-primary">Validar venta</button>
    @endif
</div>
@endsection
