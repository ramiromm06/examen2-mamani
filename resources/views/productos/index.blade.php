@extends('layouts.app')

@section('titulo', 'Lista de Productos')

@section('contenido')

<div class="page-header">
    <h1>📦 Productos</h1>
    <a href="{{ route('productos.create') }}" class="btn btn-success">
        + Nuevo Producto
    </a>
</div>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>SKU</th>
            <th>Categoría</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($productos as $producto)
            <tr>
                <td>
                    <span class="badge badge-blue">{{ $producto->id }}</span>
                </td>
                <td>
                    <strong>{{ $producto->nombre }}</strong>
                </td>
                <td>
                    <code style="background:#edf2f7; padding:0.2rem 0.5rem;
                                 border-radius:5px; font-size:0.8rem;">
                        {{ $producto->sku }}
                    </code>
                </td>
                <td>
                    <span class="badge badge-blue">{{ $producto->categoria->nombre }}</span>
                </td>
                <td>
                    <strong style="color:#276749;">
                        Bs. {{ number_format($producto->precio, 2) }}
                    </strong>
                </td>
                <td>
                    <span class="{{ $producto->stock > 0 ? 'badge badge-green' : 'badge badge-red' }}">
                        {{ $producto->stock }} uds.
                    </span>
                </td>
                <td>
                    @if($producto->disponible)
                        <span class="badge badge-green">● Disponible</span>
                    @else
                        <span class="badge badge-red">● No disponible</span>
                    @endif
                </td>
                <td>
                    <div style="display:flex; gap:0.4rem; flex-wrap:wrap;">
                        <a href="{{ route('productos.show', $producto) }}"
                           class="btn btn-primary btn-sm">Ver</a>

                        <a href="{{ route('productos.edit', $producto) }}"
                           class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('productos.destroy', $producto) }}"
                              method="POST" style="display:inline"
                              onsubmit="return confirm('¿Estás seguro de eliminar «{{ $producto->nombre }}»? Esta acción no se puede deshacer.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8">
                    <div class="empty-state">
                        📭
                        <p>No hay productos registrados aún.</p>
                    </div>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection