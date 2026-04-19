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

        /* Botón PDF personalizado */
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
        <button onclick="location.reload()" class="btn btn-outline-light btn-sm rounded-pill">
            <i class="bi bi-arrow-clockwise me-1"></i> Actualizar
        </button>
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
                            <strong><?php echo htmlspecialchars($f['nombre']); ?></strong><br>
                            <small class="text-muted">ID #<?php echo $f['id']; ?></small>
                        </td>
                        <td>
                            <small><?php echo $f['email']; ?></small><br>
                            <small><?php echo $f['telefono']; ?></small>
                        </td>
                        <td>
                            <select class="form-select form-select-sm estado-selector" data-id="<?php echo $f['id']; ?>">
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
                                <a href="generar_pdf.php?id=<?php echo $f['id']; ?>" target="_blank" class="btn btn-pdf">
                                    <i class="bi bi-file-earmark-pdf"></i> PDF
                                </a>

                                <a href="https://wa.me/<?php echo $f['telefono']; ?>?text=Hola..." target="_blank" class="btn btn-whatsapp">
                                    <i class="bi bi-whatsapp"></i>
                                </a>

                                <a href="eliminar.php?id=<?php echo $f['id']; ?>" onclick="return confirm('¿Eliminar?')" class="btn btn-delete">
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

<script>

document.querySelectorAll('.estado-selector').forEach(select => {
    select.addEventListener('change', function() {
        const id = this.getAttribute('data-id');
        const nuevoEstado = this.value;
        fetch('actualizar_estado.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `id=${id}&estado=${nuevoEstado}`
        }).then(() => {
            this.style.borderColor = "#25D366";
            setTimeout(() => { this.style.borderColor = "#dee2e6"; }, 1000);
        });
    });
});
</script>

</body>
</html>