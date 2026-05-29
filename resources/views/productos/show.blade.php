@extends('layouts.app')

@section('titulo', 'Detalle del Producto')

@section('contenido')

    <div class="card">
        <h2>📋 Detalle: {{ $producto->nombre }}</h2>

        <table style="width:auto; min-width:400px;">
            <tr>
                <th>ID</th>
                <td>{{ $producto->id }}</td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td>{{ $producto->nombre }}</td>
            </tr>
            <tr>
                <th>SKU</th>
                <td>{{ $producto->sku }}</td>
            </tr>
            <tr>
                <th>Categoría</th>
                <td>{{ $producto->categoria->nombre }}</td>
            </tr>
            <tr>
                <th>Precio</th>
                <td>Bs. {{ number_format($producto->precio, 2) }}</td>
            </tr>
            <tr>
                <th>Stock</th>
                <td>{{ $producto->stock }}</td>
            </tr>
            <tr>
                <th>Disponible</th>
                <td>{{ $producto->disponible ? '✅ Sí' : '❌ No' }}</td>
            </tr>
            <tr>
                <th>Creado</th>
                <td>{{ $producto->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            <tr>
                <th>Actualizado</th>
                <td>{{ $producto->updated_at->format('d/m/Y H:i') }}</td>
            </tr>
        </table>

        <div style="margin-top:1.5rem;">
            <a href="{{ route('productos.edit', $producto) }}" class="btn btn-warning">✏️ Editar</a>
            <a href="{{ route('productos.index') }}" class="btn btn-secondary">⬅️ Volver</a>
        </div>
    </div>

@endsection