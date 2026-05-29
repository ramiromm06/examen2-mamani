<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Gestión de Productos')</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background: #f5f5f5; }
        nav { background: #2d3748; padding: 1rem 2rem; }
        nav a { color: white; text-decoration: none; margin-right: 1rem; }
        nav a:hover { text-decoration: underline; }
        .container { max-width: 1100px; margin: 2rem auto; padding: 0 1rem; }
        .alert-success { background: #c6f6d5; border: 1px solid #38a169;
                         color: #276749; padding: 0.75rem 1rem; border-radius: 6px;
                         margin-bottom: 1rem; }
        .alert-error { background: #fed7d7; border: 1px solid #e53e3e;
                       color: #742a2a; padding: 0.75rem 1rem; border-radius: 6px;
                       margin-bottom: 1rem; }
        table { width: 100%; border-collapse: collapse; background: white;
                border-radius: 8px; overflow: hidden; }
        th { background: #2d3748; color: white; padding: 0.75rem 1rem; text-align: left; }
        td { padding: 0.75rem 1rem; border-bottom: 1px solid #e2e8f0; }
        tr:hover { background: #f7fafc; }
        .btn { padding: 0.4rem 0.9rem; border-radius: 5px; text-decoration: none;
               font-size: 0.875rem; border: none; cursor: pointer; display: inline-block; }
        .btn-primary { background: #3182ce; color: white; }
        .btn-warning { background: #d69e2e; color: white; }
        .btn-danger  { background: #e53e3e; color: white; }
        .btn-success { background: #38a169; color: white; }
        .btn-secondary { background: #718096; color: white; }
        .btn:hover { opacity: 0.85; }
        .form-group { margin-bottom: 1rem; }
        .form-group label { display: block; font-weight: bold; margin-bottom: 0.3rem; }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%; padding: 0.5rem; border: 1px solid #cbd5e0;
            border-radius: 5px; font-size: 1rem; box-sizing: border-box; }
        .form-group input:focus, .form-group select:focus {
            outline: none; border-color: #3182ce; }
        .error-text { color: #e53e3e; font-size: 0.85rem; margin-top: 0.25rem; }
        .card { background: white; padding: 2rem; border-radius: 8px;
                box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        h1, h2 { color: #2d3748; }
    </style>
</head>
<body>

<nav>
    <a href="{{ route('productos.index') }}">🏠 Inicio</a>
    <a href="{{ route('productos.index') }}">📦 Productos</a>
    <a href="{{ route('productos.create') }}">➕ Nuevo Producto</a>
</nav>

<div class="container">

    {{-- Mensaje flash de éxito --}}
    @if(session('success'))
        <div class="alert-success">
            ✅ {{ session('success') }}
        </div>
    @endif

    {{-- Errores de validación globales --}}
    @if($errors->any())
        <div class="alert-error">
            <strong>Por favor corrige los siguientes errores:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('contenido')

</div>

</body>
</html>