<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AM Montajes - Cotización de Conductos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .navbar { background-color: #003366; } 
        .card { border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .btn-primary { background-color: #003366; border: none; }
        .btn-primary:hover { background-color: #002244; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark mb-5">
    <div class="container">
        <a class="navbar-brand" href="#">🌀 AM MONTAJES - Conductos de Aire</a>
    </div>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4">
                <h3 class="text-center mb-4">Solicitar Cotización</h3>
                <form action="guardar.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Nombre Completo</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Ej: Juan Pérez" required>
                    </div>
                    <div class="mb-3">
    <label class="form-label">Correo Electrónico</label>
    <input type="email" name="email" class="form-control" placeholder="nombre@correo.com" required>
</div>
<div class="mb-3">
    <label class="form-label">Teléfono / WhatsApp</label>
    <input type="text" name="telefono" class="form-control" placeholder="Ej: 573001234567" required>
    <small class="text-muted">Incluye el código de país sin el signo + (Ej: 57 para Colombia).</small>
</div>
<div class="mb-3">
    <label class="form-label">Detalles del Proyecto</label>
    <textarea name="mensaje" class="form-control" rows="4" placeholder="Ej: Necesito 20 metros de conducto..." required></textarea>
</div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">Enviar Solicitud</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>