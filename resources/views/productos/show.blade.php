@extends('layouts.app')

@section('titulo', 'Detalle del Producto')

@section('contenido')

<div class="page-header">
    <h1>📋 Detalle del Producto</h1>
    <a href="{{ route('productos.index') }}" class="btn btn-secondary">← Volver</a>
</div>

<div class="card">
    <p class="section-title">{{ $producto->nombre }}</p>

    <table class="detail-table">
        <tbody>
            <tr>
                <th>ID</th>
                <td><span class="badge badge-blue">{{ $producto->id }}</span></td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td><strong>{{ $producto->nombre }}</strong></td>
            </tr>
            <tr>
                <th>SKU</th>
                <td>
                    <code style="background:#edf2f7; padding:0.2rem 0.6rem;
                                 border-radius:5px; font-size:0.85rem;">
                        {{ $producto->sku }}
                    </code>
                </td>
            </tr>
            <tr>
                <th>Categoría</th>
                <td><span class="badge badge-blue">{{ $producto->categoria->nombre }}</span></td>
            </tr>
            <tr>
                <th>Precio</th>
                <td>
                    <strong style="font-size:1.1rem; color:#276749;">
                        Bs. {{ number_format($producto->precio, 2) }}
                    </strong>
                </td>
            </tr>
            <tr>
                <th>Stock</th>
                <td>
                    <span class="{{ $producto->stock > 0 ? 'badge badge-green' : 'badge badge-red' }}">
                        {{ $producto->stock }} unidades
                    </span>
                </td>
            </tr>
            <tr>
                <th>Disponible</th>
                <td>
                    @if($producto->disponible)
                        <span class="badge badge-green">● Disponible</span>
                    @else
                        <span class="badge badge-red">● No disponible</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Creado</th>
                <td style="color:#718096; font-size:0.85rem;">
                    {{ $producto->created_at->format('d/m/Y H:i') }}
                </td>
            </tr>
            <tr>
                <th>Actualizado</th>
                <td style="color:#718096; font-size:0.85rem;">
                    {{ $producto->updated_at->format('d/m/Y H:i') }}
                </td>
            </tr>
        </tbody>
    </table>

    <div class="form-actions">
        <a href="{{ route('productos.edit', $producto) }}" class="btn btn-warning">
            ✏️ Editar
        </a>

        <form action="{{ route('productos.destroy', $producto) }}"
              method="POST" style="display:inline"
              onsubmit="return confirm('¿Estás seguro de eliminar «{{ $producto->nombre }}»?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">🗑 Eliminar</button>
        </form>

        <a href="{{ route('productos.index') }}" class="btn btn-secondary">← Volver al listado</a>
    </div>
</div>

@endsection