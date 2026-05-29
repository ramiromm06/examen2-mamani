@extends('layouts.app')

@section('titulo', 'Nuevo Producto')

@section('contenido')

    <div class="card">
        <h2>+ Nuevo Producto</h2>

        <form action="{{ route('productos.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre"
                       value="{{ old('nombre') }}" placeholder="Nombre del producto">
                @error('nombre')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="sku">SKU</label>
                <input type="text" id="sku" name="sku"
                       value="{{ old('sku') }}" placeholder="Ej: AB-1234">
                @error('sku')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="precio">Precio (Bs.)</label>
                <input type="number" id="precio" name="precio" step="0.01" min="0"
                       value="{{ old('precio') }}" placeholder="0.00">
                @error('precio')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" id="stock" name="stock" min="0"
                       value="{{ old('stock') }}" placeholder="0">
                @error('stock')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="categoria_id">Categoría</label>
                <select id="categoria_id" name="categoria_id">
                    <option value="">-- Seleccione una categoría --</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}"
                            {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('categoria_id')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="disponible">Disponible</label>
                <select id="disponible" name="disponible">
                    <option value="1" {{ old('disponible', '1') == '1' ? 'selected' : '' }}>Sí</option>
                    <option value="0" {{ old('disponible') == '0' ? 'selected' : '' }}>No</option>
                </select>
            </div>

            <div style="margin-top:1.5rem;">
                <button type="submit" class="btn btn-success">💾 Guardar</button>
                <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>

        </form>
    </div>

@endsection