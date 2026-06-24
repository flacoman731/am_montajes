<?php

session_start();



include("conexion.php");


$resultado = mysqli_query($conexion, "SELECT * FROM cotizaciones ORDER BY fecha DESC");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Admin Dashboard | AM Montajes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        :root {
            --primary-blue: #002147;
            --accent-blue: #0056b3;
            --bg-light: #f4f7f9;
            --success-whatsapp: #25D366;
            --danger-pdf: #dc3545;
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

        .estado-selector {
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            padding: 4px 10px;
            cursor: pointer;
            border: 1px solid #dee2e6;
        }

        .btn-pdf {
            background-color: var(--danger-pdf);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 6px 14px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        .btn-pdf:hover { background-color: #bb2d3b; color: white; }

        .btn-whatsapp {
            background-color: var(--success-whatsapp);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 6px 14px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .btn-delete {
            color: #dc3545;
            background: rgba(220, 53, 69, 0.05);
            border: none;
            padding: 8px;
            border-radius: 8px;
        }
    </style>
</head>
<body>

<nav class="navbar-admin">
    <div class="container d-flex justify-content-between align-items-center">
        <span class="fw-bold fs-4"><i class="bi bi-fan me-2"></i> AM MONTAJES | Panel</span>
        <div class="d-flex gap-2">
            <button type="button" class="btn btn-warning btn-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalSoporte">
                <i class="bi bi-tools me-1"></i> Soporte Técnico
            </button>
            <button onclick="location.reload()" class="btn btn-outline-light btn-sm rounded-pill">
                <i class="bi bi-arrow-clockwise me-1"></i> Actualizar
            </button>
            <a href="logout.php" class="btn btn-danger btn-sm rounded-pill px-3">
                <i class="bi bi-box-arrow-right me-1"></i> Salir
            </a>
        </div>
    </div>
</nav>

<div class="container pb-5">
    <div class="table-container">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="thead-custom">
                    <tr>
                        <th class="ps-4">Cliente</th>
                        <th>Contacto</th>
                        <th>Estado</th> 
                        <th>Fecha</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($f = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <td class="ps-4">
                            <strong><?php echo htmlspecialchars($f['nombre'], ENT_QUOTES, 'UTF-8'); ?></strong><br>
                            <small class="text-muted">ID #<?php echo (int)$f['id']; ?></small>
                        </td>
                        <td>
                            <small><?php echo htmlspecialchars($f['email'], ENT_QUOTES, 'UTF-8'); ?></small><br>
                            <small><?php echo htmlspecialchars($f['telefono'], ENT_QUOTES, 'UTF-8'); ?></small>
                        </td>
                        <td>
                            <select class="form-select form-select-sm estado-selector" data-id="<?php echo (int)$f['id']; ?>">
                                <option value="Pendiente" <?php if($f['estado'] == 'Pendiente') echo 'selected'; ?>>🟡 Pendiente</option>
                                <option value="En Proceso" <?php if($f['estado'] == 'En Proceso') echo 'selected'; ?>>🔵 En Proceso</option>
                                <option value="Finalizado" <?php if($f['estado'] == 'Finalizado') echo 'selected'; ?>>🟢 Finalizado</option>
                                <option value="Cancelado" <?php if($f['estado'] == 'Cancelado') echo 'selected'; ?>>🔴 Cancelado</option>
                            </select>
                        </td>
                        <td>
                            <small class="badge bg-light text-dark border">
                                <?php echo date('d/m/Y', strtotime($f['fecha'])); ?>
                            </small>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="generar_pdf.php?id=<?php echo (int)$f['id']; ?>" target="_blank" class="btn btn-pdf">
                                    <i class="bi bi-file-earmark-pdf"></i> PDF
                                </a>

                                <a href="https://wa.me/<?php echo urlencode($f['telefono']); ?>?text=Hola..." target="_blank" class="btn btn-whatsapp">
                                    <i class="bi bi-whatsapp"></i>
                                </a>

                                <a href="eliminar.php?id=<?php echo (int)$f['id']; ?>" onclick="return confirm('¿Está completamente seguro de eliminar este registro permanente?')" class="btn btn-delete">
                                    <i class="bi bi-trash3"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modalSoporte" tabindex="-1" aria-labelledby="modalSoporteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="modalSoporteLabel"><i class="bi bi-gear-fill me-2 text-warning"></i>Panel de Soporte y Diagnóstico</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <h6 class="fw-bold mb-3 text-secondary">Estado del Sistema (Colombia):</h6>
                <ul class="list-group mb-4 shadow-sm">
                    <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                        <div>
                            <i class="bi bi-database text-primary me-2"></i>
                            <span>Conexión a Base de Datos (MySQL)</span>
                        </div>
                        <?php 
                        if (isset($conexion) && !$conexion->connect_error) {
                            echo '<span class="badge bg-success rounded-pill px-3 py-2">En línea ✓</span>';
                        } else {
                            echo '<span class="badge bg-danger rounded-pill px-3 py-2">Error de Enlace ✗</span>';
                        }
                        ?>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                        <div>
                            <i class="bi bi-code-slash text-primary me-2"></i>
                            <span>Versión del Servidor PHP</span>
                        </div>
                        <span class="badge bg-secondary rounded-pill px-3 py-2"><?php echo htmlspecialchars(phpversion()); ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                        <div>
                            <i class="bi bi-clock text-primary me-2"></i>
                            <span>Zona Horaria configurada</span>
                        </div>
                        <span class="badge bg-info text-dark rounded-pill px-2 py-2 small"><?php echo htmlspecialchars(date_default_timezone_get()); ?></span>
                    </li>
                </ul>

                <hr class="text-muted">

                <h6 class="fw-bold text-secondary mt-3">¿Requieres Asistencia Técnica Avanzada?</h6>
                <p class="text-muted small">Ante caídas críticas del servidor, errores en la generación de archivos PDF o fallos estructurales, contacta al desarrollador a cargo:</p>
                
                <div class="d-grid gap-2 mt-3">
                    <a href="https://api.whatsapp.com/send?phone=573143448114&text=Hola%20Juan%20Sebastián,%20requiero%20asistencia%20técnica%20con%20el%20Panel%20de%20Administración%20de%20AM%20Montajes." 
                       target="_blank" class="btn btn-success py-2 shadow-sm">
                        <i class="bi bi-whatsapp me-2"></i> Contactar por WhatsApp
                    </a>
                    <a href="mailto:tu-correo-aqui@gmail.com?subject=Soporte%20Tecnico%20-%20AM%20Montajes" class="btn btn-outline-primary py-2">
                        <i class="bi bi-envelope me-2"></i> Enviar Reporte por Correo
                    </a>
                </div>
            </div>
            <div class="modal-footer bg-light justify-content-center py-2">
                <small class="text-muted text-center">AM Montajes - Módulo Operativo ADSO © 2026</small>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.querySelectorAll('.estado-selector').forEach(select => {
    select.addEventListener('change', function() {
        const id = this.getAttribute('data-id');
        const nuevoEstado = this.value;
        
        // CAPA DE SEGURIDAD (JS): Cancela la ejecución si el ID no cumple con un formato numérico válido
        if(isNaN(id)) return alert("Error: Petición inválida detectada.");

        fetch('actualizar_estado.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `id=${encodeURIComponent(id)}&estado=${encodeURIComponent(nuevoEstado)}`
        }).then(() => {
            this.style.borderColor = "#25D366";
            setTimeout(() => { this.style.borderColor = "#dee2e6"; }, 1000);
        });
    });
});
</script>

</body>
</html>