<?php
include("conexion.php");
$resultado = mysqli_query($conexion, "SELECT * FROM cotizaciones ORDER BY fecha DESC");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | AM Montajes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        :root { --primary-dark: #1a2a3a; --accent-blue: #007bff; }
        body { background-color: #f0f2f5; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .sidebar-title { background: var(--primary-dark); color: white; padding: 20px; border-radius: 10px 10px 0 0; }
        .table-container { background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        .btn-contact { border-radius: 20px; padding: 5px 15px; font-weight: 500; display: flex; align-items: center; gap: 5px; }
        .status-badge { font-size: 0.8rem; padding: 5px 10px; border-radius: 15px; background: #e3f2fd; color: #007bff; border: 1px solid #007bff; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="fw-bold text-dark">Panel de Control</h2>
            <p class="text-muted">Gestión de solicitudes de conductos de aire</p>
        </div>
        <div class="col-md-4 text-end">
            <div class="card bg-white border-0 shadow-sm p-3">
                <span class="text-muted small uppercase">Total Solicitudes</span>
                <h3 class="fw-bold mb-0"><?php echo mysqli_num_rows($resultado); ?></h3>
            </div>
        </div>
    </div>

    <div class="table-container">
        <div class="sidebar-title d-flex justify-content-between align-items-center">
            <span>Listado Reciente</span>
            <button onclick="location.reload()" class="btn btn-sm btn-light"><i class="material-icons" style="font-size:18px">refresh</i></button>
        </div>
        
        <table class="table table-hover mb-0">
            <thead class="bg-light">
                <tr>
                    <th class="ps-4">CLIENTE</th>
                    <th>CONTACTO</th>
                    <th>DETALLES DEL PROYECTO</th>
                    <th>FECHA</th>
                    <th class="text-center">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php while($f = mysqli_fetch_assoc($resultado)) { ?>
                <tr>
                    <td class="ps-4">
                        <div class="fw-bold text-primary"><?php echo $f['nombre']; ?></div>
                        <small class="text-muted">ID: #<?php echo $f['id']; ?></small>
                    </td>
                    <td>
                        <div class="d-flex flex-column">
                            <span><i class="material-icons" style="font-size:14px">email</i> <?php echo $f['email']; ?></span>
                            <span><i class="material-icons" style="font-size:14px">phone</i> <?php echo $f['telefono']; ?></span>
                        </div>
                    </td>
                    <td style="max-width: 300px;">
                        <p class="text-truncate mb-0" title="<?php echo $f['mensaje']; ?>">
                            <?php echo $f['mensaje']; ?>
                        </p>
                    </td>
                    <td><span class="status-badge"><?php echo date('d M, Y', strtotime($f['fecha'])); ?></span></td>
                    <td>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="https://wa.me/<?php echo $f['telefono']; ?>?text=Hola%20<?php echo urlencode($f['nombre']); ?>" 
                               target="_blank" class="btn btn-success btn-sm btn-contact">
                               <i class="material-icons" style="font-size:16px">chat</i> WhatsApp
                            </a>
                            <a href="eliminar.php?id=<?php echo $f['id']; ?>" 
                               onclick="return confirm('¿Eliminar registro?')" 
                               class="btn btn-outline-danger btn-sm border-0">
                               <i class="material-icons">delete_outline</i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>