<?php
include("conexion.php");

// Recibimos los datos del formulario
$nombre   = $_POST['nombre'];
$email    = $_POST['email'];
$telefono = $_POST['telefono']; 
$mensaje  = $_POST['mensaje'];

// Insertamos en la base de datos
$sql = "INSERT INTO cotizaciones (nombre, email, telefono, mensaje) 
        VALUES ('$nombre', '$email', '$telefono', '$mensaje')";

$resultado = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación | AM Montajes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-blue: #002147;
            --accent-blue: #0056b3;
            --bg-light: #f4f7f9;
        }
        body { 
            background-color: var(--bg-light); 
            height: 100vh; 
            display: flex; 
            align-items: center; 
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
        }
        .confirmation-card {
            background: white;
            padding: 3.5rem 2rem;
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0, 33, 71, 0.1);
            text-align: center;
            max-width: 450px;
            width: 90%;
            border: 1px solid rgba(0,0,0,0.05);
        }
        .success-icon {
            font-size: 4.5rem;
            color: #25D366;
            margin-bottom: 1rem;
        }
        .btn-home {
            background-color: var(--primary-blue);
            color: white;
            padding: 14px 35px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            transition: all 0.3s ease;
            display: inline-block;
            margin-top: 25px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .btn-home:hover {
            background-color: var(--accent-blue);
            color: white;
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 86, 179, 0.2);
        }
    </style>
</head>
<body>

<div class="confirmation-card">
    <?php if($resultado): ?>
        <i class="bi bi-check-circle-fill success-icon"></i>
        <h2 class="fw-bold mb-3" style="color: var(--primary-blue);">¡Cotización Enviada!</h2>
        <p class="text-muted">Hemos recibido su solicitud correctamente. Un asesor técnico de <strong>AM Montajes</strong> se pondrá en contacto con usted en breve.</p>
    <?php else: ?>
        <i class="bi bi-exclamation-octagon-fill text-danger success-icon"></i>
        <h2 class="fw-bold mb-3">Error al enviar</h2>
        <p class="text-muted">Lo sentimos, hubo un problema técnico. Por favor, inténtelo de nuevo más tarde.</p>
    <?php endif; ?>

    <a href="inicio.php" class="btn btn-home">
        <i class="bi bi-arrow-left me-2"></i> Volver al Inicio
    </a>
</div>

</body>
</html>