@extends('layouts.app')

@section('titulo', 'Editar Producto')

@section('contenido')

<div class="page-header">
    <h1>✏️ Editar Producto</h1>
    <a href="{{ route('productos.index') }}" class="btn btn-secondary">← Volver</a>
</div>

<div class="card">
    <p class="section-title">Editando: <strong>{{ $producto->nombre }}</strong></p>

    <form action="{{ route('productos.update', $producto) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-grid">

            {{-- Nombre --}}
            <div class="form-group full">
                <label for="nombre">Nombre del producto</label>
                <input type="text" id="nombre" name="nombre"
                       value="{{ old('nombre', $producto->nombre) }}"
                       class="{{ $errors->has('nombre') ? 'is-invalid' : '' }}">
                @error('nombre')
                    <span class="error-text">⚠ {{ $message }}</span>
                @enderror
            </div>

            {{-- SKU --}}
            <div class="form-group">
                <label for="sku">SKU</label>
                <input type="text" id="sku" name="sku"
                       value="{{ old('sku', $producto->sku) }}"
                       class="{{ $errors->has('sku') ? 'is-invalid' : '' }}">
                @error('sku')
                    <span class="error-text">⚠ {{ $message }}</span>
                @enderror
            </div>

            {{-- Categoría --}}
            <div class="form-group">
                <label for="categoria_id">Categoría</label>
                <select id="categoria_id" name="categoria_id"
                        class="{{ $errors->has('categoria_id') ? 'is-invalid' : '' }}">
                    <option value="">-- Seleccione una categoría --</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}"
                            {{ old('categoria_id', $producto->categoria_id) == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('categoria_id')
                    <span class="error-text">⚠ {{ $message }}</span>
                @enderror
            </div>

            {{-- Precio --}}
            <div class="form-group">
                <label for="precio">Precio (Bs.)</label>
                <input type="number" id="precio" name="precio"
                       step="0.01" min="0"
                       value="{{ old('precio', $producto->precio) }}"
                       class="{{ $errors->has('precio') ? 'is-invalid' : '' }}">
                @error('precio')
                    <span class="error-text">⚠ {{ $message }}</span>
                @enderror
            </div>

            {{-- Stock --}}
            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" id="stock" name="stock"
                       min="0"
                       value="{{ old('stock', $producto->stock) }}"
                       class="{{ $errors->has('stock') ? 'is-invalid' : '' }}">
                @error('stock')
                    <span class="error-text">⚠ {{ $message }}</span>
                @enderror
            </div>

            {{-- Disponible --}}
            <div class="form-group">
                <label for="disponible">Disponibilidad</label>
                <select id="disponible" name="disponible">
                    <option value="1"
                        {{ old('disponible', $producto->disponible ? '1' : '0') == '1' ? 'selected' : '' }}>
                        ✅ Disponible
                    </option>
                    <option value="0"
                        {{ old('disponible', $producto->disponible ? '1' : '0') == '0' ? 'selected' : '' }}>
                        ❌ No disponible
                    </option>
                </select>
            </div>

        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-warning">🔄 Actualizar producto</button>
            <a href="{{ route('productos.show', $producto) }}" class="btn btn-secondary">Cancelar</a>
        </div>

    </form>
</div>

@endsection