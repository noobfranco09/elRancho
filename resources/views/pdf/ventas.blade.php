
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Ventas</title>
    <style>
        /* ====== RESET BÁSICO ====== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DejaVu Sans', 'Inter', Arial, sans-serif;
            font-size: 12px;
            color: #;
            background: #fff;
            padding: 40px;
            line-height: 1.5;
        }

        /* ====== ENCABEZADO ====== */
        .header {
            border-bottom: 3px solid #2c3e50;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }

        h1 {
            color: #1a1a1a;
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .subtitle {
            color: #7f8c8d;
            font-size: 13px;
        }

        /* ====== BARRA DE INFORMACIÓN ====== */
        .info-bar {
            background: #f4f6f8;
            padding: 10px 14px;
            margin-bottom: 25px;
            border-radius: 6px;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 8px;
            font-size: 11.5px;
        }

        .info-item {
            display: flex;
            align-items: center;
        }

        .info-label {
            font-weight: 600;
            color: #2c3e50;
            margin-right: 5px;
        }

        /* ====== TABLA ====== */
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #dcdcdc;
        }

        thead {
            background: #f2f2f2;
            color: white;
        }

        th {
            padding: 10px;
            text-align: left;
            font-weight: 600;
            font-size: 12.5px;
            letter-spacing: 0.3px;
        }

        tbody tr {
            background: #fff;
            transition: background-color 0.2s;
        }

        tbody tr:nth-child(even) {
            background: #f9fbfc;
        }

        td {
            padding: 9px 10px;
            border-bottom: 1px solid #e2e2e2;
        }

        /* ====== COLUMNAS ====== */
        .col-id {
            width: 10%;
            text-align: center;
            font-weight: 600;
            color: #7f8c8d;
        }

        .col-total {
            width: 20%;
            text-align: right;
            font-weight: 600;
            color: #27ae60;
            font-size: 13px;
        }

        .col-fecha {
            width: 20%;
            color: #555;
            font-size: 12px;
        }

        .col-observacion {
            width: 50%;
            font-size: 11.5px;
            color: #444;
        }

        .sin-observacion {
            color: #999;
            font-style: italic;
        }

        /* ====== FILA TOTAL / PIE ====== */
        .total-row {
            background: #ecf0f1 !important;
            font-weight: 700;
            border-top: 2px solid #2c3e50;
        }

        .footer {
            margin-top: 35px;
            padding-top: 12px;
            border-top: 2px solid #ecf0f1;
            text-align: center;
            font-size: 10px;
            color: #95a5a6;
        }

        /* ====== PRINT ====== */
        @media print {
            body {
                padding: 25px;
                font-size: 11px;
            }
            .info-bar {
                background: #f0f0f0;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Lista de Ventas</h1>
        <div class="subtitle">Reporte detallado de operaciones</div>
    </div>

    <div class="info-bar">
        <div class="info-item">
            <span class="info-label">Fecha de generación:</span>
            <span>{{ date('d/m/Y H:i') }}</span>
        </div>
        <div class="info-item">
            <span class="info-label">Total de registros:</span>
            <span>{{ count($ventas) }}</span>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th class="col-id">ID</th>
                <th class="col-total">Total</th>
                <th class="col-fecha">Fecha</th>
                <th class="col-observacion">Observación</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ventas as $venta)
                <tr>
                    <td class="col-id">{{ $venta->id }}</td>
                    <td class="col-total">${{ number_format($venta->total, 0, ',', '.') }}</td>
                    <td class="col-fecha">{{ $venta->fecha instanceof \Carbon\Carbon ? $venta->fecha->format('d/m/Y') : date('d/m/Y', strtotime($venta->fecha)) }}</td>
                    <td class="col-observacion {{ empty($venta->observacion) ? 'sin-observacion' : '' }}">
                        {{ $venta->observacion ?? "Sin observación" }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Documento generado automáticamente • Sistema de Gestión de Ventas</p>
    </div>
</body>
</html>
