@extends('layouts.app')

@section('titulo', 'Lista de Productos')

@section('contenido')

    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1rem;">
        <h1>📦 Lista de Productos</h1>
        <a href="{{ route('productos.create') }}" class="btn btn-success">➕ Nuevo Producto</a>
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
                <th>Disponible</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->sku }}</td>
                    <td>{{ $producto->categoria->nombre }}</td>
                    <td>Bs. {{ number_format($producto->precio, 2) }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>{{ $producto->disponible ? '✅ Sí' : '❌ No' }}</td>
                    <td>
                        {{-- Ver --}}
                        <a href="{{ route('productos.show', $producto) }}"
                           class="btn btn-primary">Ver</a>

                        {{-- Editar --}}
                        <a href="{{ route('productos.edit', $producto) }}"
                           class="btn btn-warning">Editar</a>

                        {{-- Eliminar --}}
                        <form action="{{ route('productos.destroy', $producto) }}"
                              method="POST" style="display:inline"
                              onsubmit="return confirm('¿Estás seguro de eliminar este producto?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" style="text-align:center;">No hay productos registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection