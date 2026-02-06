<!DOCTYPE html>
<html>
<head>
    <title>Listado de Estudiantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .header-card {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: white;
            border-radius: 10px 10px 0 0;
            padding: 20px;
            margin-bottom: 0;
        }
        .table-container {
            background: white;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .table th {
            background-color: #f1f5fd;
            font-weight: 600;
            border-top: none;
        }
        .table tbody tr {
            transition: all 0.2s ease;
        }
        .table tbody tr:hover {
            background-color: #f8fafc;
            transform: translateY(-2px);
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        .badge-promedio {
            padding: 4px 10px;
            border-radius: 20px;
            font-weight: 500;
        }
        .empty-state {
            padding: 60px 20px;
            text-align: center;
            color: #6c757d;
        }
        .empty-state .icon {
            font-size: 48px;
            margin-bottom: 15px;
            opacity: 0.5;
        }
    </style>
</head>
<body class="container mt-5">
    <div class="mb-4">
        <div class="header-card">
            <h1 class="h2 mb-2">📚 Estudiantes Registrados</h1>
            <p class="mb-0 opacity-75">Lista completa de estudiantes en el sistema</p>
        </div>
        
        <div class="table-container">
            @forelse($estudiantes as $estudiante)
                @if ($loop->first)
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre Completo</th>
                                <th>Promedio</th>
                                <th>Edad</th>
                                <th>Fecha de Nacimiento</th>
                            </tr>
                        </thead>
                        <tbody>
                @endif
                            <tr>
                                <td class="fw-bold text-primary">#{{ $estudiante->id }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="me-2" style="width: 8px; height: 8px; background-color: #6a11cb; border-radius: 50%;"></div>
                                        {{ $estudiante->nombrecompleto }}
                                    </div>
                                </td>
                                <td>
                                    @php
                                        $bgColor = $estudiante->promedio >= 16 ? 'bg-success' : 
                                                   ($estudiante->promedio >= 11 ? 'bg-warning' : 'bg-danger');
                                        $textColor = $estudiante->promedio >= 16 ? 'text-white' : 
                                                    ($estudiante->promedio >= 11 ? 'text-dark' : 'text-white');
                                    @endphp
                                    <span class="badge {{ $bgColor }} {{ $textColor }} badge-promedio">
                                        {{ $estudiante->promedio }}
                                    </span>
                                </td>
                                <td>
                                    <span class="fw-medium">{{ $estudiante->edad }}</span> 
                                    <span class="text-muted">años</span>
                                </td>
                                <td class="text-muted">
                                    {{ $estudiante->fechadenacimiento }}
                                </td>
                            </tr>
                @if ($loop->last)
                        </tbody>
                    </table>
                    <div class="table-footer p-3 bg-light border-top">
                        <div class="row">
                            <div class="col text-muted">
                                <small>Mostrando {{ $estudiantes->count() }} estudiantes</small>
                            </div>
                            <div class="col text-end text-muted">
                                <small>{{ now()->format('d/m/Y') }}</small>
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <div class="empty-state">
                    <div class="icon">📋</div>
                    <h3 class="h5 mb-2">No hay estudiantes registrados</h3>
                    <p class="text-muted">No se encontraron registros en el sistema.</p>
                </div>
            @endforelse
        </div>
    </div>
</body>
</html>