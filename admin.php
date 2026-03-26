<?php
include("conexion.php");
$resultado = mysqli_query($conexion, "SELECT * FROM cotizaciones ORDER BY fecha DESC");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | AM Montajes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        :root {
            --primary-blue: #002147;
            --accent-blue: #0056b3;
            --bg-light: #f4f7f9;
            --success-whatsapp: #25D366;
        }

        body { 
            background-color: var(--bg-light); 
            font-family: 'Segoe UI', Roboto, sans-serif;
        }

        .navbar-admin { 
            background-color: var(--primary-blue);
            color: white;
            padding: 1rem 0;
            margin-bottom: 2rem;
        }

        /* Tarjeta de resumen profesional */
        .stat-card {
            border: none;
            border-radius: 12px;
            background: white;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
        }
        .stat-card:hover { transform: translateY(-5px); }
        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            background: rgba(0, 33, 71, 0.1);
            color: var(--primary-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        /* Tabla estilizada */
        .table-container { 
            background: white; 
            border-radius: 15px; 
            overflow: hidden; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.08); 
            border: none;
        }
        
        .thead-custom {
            background-color: #f8f9fa;
            border-bottom: 2px solid #eee;
        }
        
        .thead-custom th {
            font-weight: 600;
            color: #555;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 1px;
            padding: 1.2rem;
        }

        .table tbody tr { transition: all 0.2s; vertical-align: middle; }
        .table tbody tr:hover { background-color: #fcfdfe; }

        .client-name { font-weight: 600; color: var(--primary-blue); margin-bottom: 0; }
        .id-badge { font-size: 0.7rem; background: #eee; padding: 2px 6px; border-radius: 4px; }
        
        /* Botones modernos */
        .btn-whatsapp {
            background-color: var(--success-whatsapp);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 6px 14px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        .btn-whatsapp:hover { background-color: #1eb956; color: white; }

        .btn-delete {
            color: #dc3545;
            background: rgba(220, 53, 69, 0.05);
            border: none;
            padding: 8px;
            border-radius: 8px;
        }
        .btn-delete:hover { background: #dc3545; color: white; }

        .date-badge {
            background: #eef2f7;
            color: #555;
            padding: 5px 10px;
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 500;
        }
    </style>
</head>
<body>

<nav class="navbar-admin">
    <div class="container d-flex justify-content-between align-items-center">
        <span class="fw-bold fs-4"><i class="bi bi-fan me-2"></i> AM MONTAJES | Panel</span>
        <button onclick="location.reload()" class="btn btn-outline-light btn-sm rounded-pill">
            <i class="bi bi-arrow-clockwise me-1"></i> Actualizar
        </button>
    </div>
</nav>

<div class="container pb-5">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="fw-bold text-dark mb-1">Listado de Pedidos</h2>
            <p class="text-muted">Gestión de fabricación y contacto con clientes</p>
        </div>
        
        <div class="col-md-4">
            <div class="stat-card p-3 d-flex align-items-center">
                <div class="stat-icon me-3">
                    <i class="bi bi-file-earmark-text"></i>
                </div>
                <div>
                    <span class="text-muted small fw-bold text-uppercase">Total Solicitudes</span>
                    <h3 class="fw-bold mb-0 text-primary"><?php echo mysqli_num_rows($resultado); ?></h3>
                </div>
            </div>
        </div>
    </div>

    <div class="table-container">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="thead-custom">
                    <tr>
                        <th class="ps-4">Cliente</th>
                        <th>Información de Contacto</th>
                        <th>Detalles del Proyecto</th>
                        <th>Fecha de Ingreso</th>
                        <th class="text-center">Gestión</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($f = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <td class="ps-4">
                            <p class="client-name"><?php echo htmlspecialchars($f['nombre']); ?></p>
                            <span class="id-badge text-muted">ID #<?php echo $f['id']; ?></span>
                        </td>
                        <td>
                            <div class="d-flex flex-column small">
                                <span class="mb-1"><i class="bi bi-envelope text-muted me-2"></i><?php echo $f['email']; ?></span>
                                <span><i class="bi bi-whatsapp text-muted me-2"></i><?php echo $f['telefono']; ?></span>
                            </div>
                        </td>
                        <td>
                            <div style="max-width: 250px;" class="text-muted small">
                                <i class="bi bi-chat-left-text me-1"></i> 
                                <?php echo (strlen($f['mensaje']) > 60) ? substr($f['mensaje'], 0, 60) . '...' : $f['mensaje']; ?>
                            </div>
                        </td>
                        <td>
                            <span class="date-badge">
                                <i class="bi bi-calendar3 me-1"></i> <?php echo date('d M, Y', strtotime($f['fecha'])); ?>
                            </span>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="https://wa.me/<?php echo $f['telefono']; ?>?text=Hola%20<?php echo urlencode($f['nombre']); ?>%20de%20AM%20Montajes..." 
                                   target="_blank" class="btn btn-whatsapp d-flex align-items-center">
                                    <i class="bi bi-whatsapp me-2"></i> Contactar
                                </a>
                                <a href="eliminar.php?id=<?php echo $f['id']; ?>" 
                                   onclick="return confirm('¿Está seguro de eliminar esta solicitud?')" 
                                   class="btn btn-delete" title="Eliminar">
                                    <i class="bi bi-trash3"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php if(mysqli_num_rows($resultado) == 0): ?>
            <div class="text-center p-5">
                <i class="bi bi-inbox text-muted display-1"></i>
                <p class="mt-3 text-muted">No hay solicitudes pendientes en este momento.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

</body>
</html>