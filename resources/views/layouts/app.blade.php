<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Gestión de Productos')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', sans-serif;
            background: #f0f4f8;
            color: #1a202c;
            min-height: 100vh;
        }

        /* ── NAV ── */
        nav {
            background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
            padding: 0 2rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            height: 60px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }
        nav .brand {
            font-size: 1.1rem;
            font-weight: 700;
            color: #fff;
            margin-right: auto;
            letter-spacing: 0.5px;
        }
        nav a {
            color: #a0aec0;
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            padding: 0.4rem 0.9rem;
            border-radius: 6px;
            transition: all 0.2s;
        }
        nav a:hover { background: rgba(255,255,255,0.1); color: #fff; }

        /* ── CONTAINER ── */
        .container {
            max-width: 1150px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }

        /* ── ALERTS ── */
        .alert {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.9rem 1.2rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            font-weight: 500;
            animation: slideDown 0.3s ease;
        }
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-8px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .alert-success {
            background: #f0fff4;
            border: 1px solid #9ae6b4;
            color: #276749;
        }
        .alert-error {
            background: #fff5f5;
            border: 1px solid #feb2b2;
            color: #742a2a;
        }
        .alert ul { margin: 0.4rem 0 0 1.2rem; }
        .alert ul li { font-size: 0.85rem; margin-top: 0.2rem; }

        /* ── CARD ── */
        .card {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.07);
            padding: 2rem;
        }

        /* ── PAGE HEADER ── */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        .page-header h1 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1a202c;
        }

        /* ── TABLE ── */
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 2px 12px rgba(0,0,0,0.07);
        }
        thead { background: linear-gradient(135deg, #2d3748, #4a5568); }
        th {
            color: #e2e8f0;
            font-size: 0.78rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            padding: 0.9rem 1rem;
            text-align: left;
        }
        td {
            padding: 0.85rem 1rem;
            border-bottom: 1px solid #edf2f7;
            font-size: 0.9rem;
            color: #2d3748;
        }
        tbody tr:last-child td { border-bottom: none; }
        tbody tr { transition: background 0.15s; }
        tbody tr:hover { background: #f7fafc; }

        /* ── BADGES ── */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            padding: 0.25rem 0.7rem;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        .badge-green { background: #c6f6d5; color: #276749; }
        .badge-red   { background: #fed7d7; color: #742a2a; }
        .badge-blue  { background: #bee3f8; color: #2a4365; }

        /* ── BUTTONS ── */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            padding: 0.45rem 1rem;
            border-radius: 8px;
            font-size: 0.82rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s;
            white-space: nowrap;
        }
        .btn:hover { transform: translateY(-1px); box-shadow: 0 3px 8px rgba(0,0,0,0.15); }
        .btn:active { transform: translateY(0); }
        .btn-primary   { background: #4299e1; color: #fff; }
        .btn-success   { background: #48bb78; color: #fff; }
        .btn-warning   { background: #ed8936; color: #fff; }
        .btn-danger    { background: #fc8181; color: #fff; }
        .btn-secondary { background: #a0aec0; color: #fff; }
        .btn-sm { padding: 0.3rem 0.7rem; font-size: 0.78rem; }

        /* ── FORMS ── */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.2rem;
        }
        .form-grid .full { grid-column: 1 / -1; }
        .form-group { display: flex; flex-direction: column; gap: 0.35rem; }
        .form-group label {
            font-size: 0.82rem;
            font-weight: 600;
            color: #4a5568;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            padding: 0.6rem 0.9rem;
            border: 1.5px solid #e2e8f0;
            border-radius: 8px;
            font-size: 0.9rem;
            font-family: inherit;
            color: #2d3748;
            background: #f7fafc;
            transition: border-color 0.2s, box-shadow 0.2s;
            width: 100%;
        }
        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #4299e1;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(66,153,225,0.15);
        }
        .form-group input.is-invalid,
        .form-group select.is-invalid {
            border-color: #fc8181;
            background: #fff5f5;
        }
        .error-text {
            color: #e53e3e;
            font-size: 0.78rem;
            font-weight: 500;
        }
        .form-actions {
            display: flex;
            gap: 0.75rem;
            margin-top: 1.75rem;
            padding-top: 1.5rem;
            border-top: 1px solid #edf2f7;
        }

        /* ── DETAIL TABLE ── */
        .detail-table { width: auto; min-width: 500px; }
        .detail-table th {
            background: #f7fafc;
            color: #4a5568;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            width: 160px;
        }
        .detail-table td { font-size: 0.9rem; }

        /* ── EMPTY STATE ── */
        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #a0aec0;
        }
        .empty-state p { font-size: 1rem; margin-top: 0.5rem; }

        /* ── SECTION TITLE ── */
        .section-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid #edf2f7;
        }

        @media (max-width: 700px) {
            .form-grid { grid-template-columns: 1fr; }
            .page-header { flex-direction: column; gap: 1rem; align-items: flex-start; }
        }
    </style>
</head>
<body>

<nav>
    <span class="brand">📦 Gestión de Productos</span>
    <a href="{{ route('productos.index') }}">Productos</a>
    <a href="{{ route('productos.create') }}">+ Nuevo</a>
</nav>

<div class="container">

    @if(session('success'))
        <div class="alert alert-success">
            ✅ {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-error">
            <div>
                <strong>Por favor corrige los siguientes errores:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    @yield('contenido')

</div>

</body>
</html>