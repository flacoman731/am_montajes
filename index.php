<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AM Montajes | Cotización Profesional</title>
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
            font-family: 'Segoe UI', Roboto, sans-serif;
        }

        .navbar { 
            background-color: var(--primary-blue);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .card { 
            border: none; 
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            overflow: hidden;
        }

        .card-header {
            background-color: white;
            border-bottom: 2px solid var(--bg-light);
            padding: 2rem 1rem;
        }

        .form-label {
            font-weight: 600;
            color: #444;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .form-control {
            border-radius: 8px;
            padding: 0.75rem 1rem;
            border: 1px solid #dee2e6;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--accent-blue);
            box-shadow: 0 0 0 0.25rem rgba(0, 86, 179, 0.1);
        }

        .btn-primary { 
            background-color: var(--primary-blue); 
            border: none;
            padding: 0.8rem;
            font-weight: 600;
            border-radius: 8px;
            transition: transform 0.2s ease;
        }

        .btn-primary:hover { 
            background-color: var(--accent-blue);
            transform: translateY(-2px);
        }

        .input-group-text {
            background-color: white;
            border-right: none;
            color: var(--primary-blue);
        }

        .form-control { border-left: none; }

        /* Estilo para los avisos de referencia */
        .invalid-feedback {
            font-size: 0.8rem;
            font-weight: 500;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark mb-5">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            <i class="bi bi-fan me-2"></i> AM MONTAJES
        </a>
    </div>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 mb-5">
            <div class="card">
                <div class="card-header text-center">
                    <h2 class="h4 mb-1 fw-bold">Solicitud de Cotización</h2>
                    <p class="text-muted small">Complete los detalles para su proyecto de ductos</p>
                </div>
                
                <div class="card-body p-4">
                    <form action="guardar.php" method="POST" class="needs-validation" novalidate>
                        
                        <div class="mb-4">
                            <label class="form-label">Nombre Completo o Empresa</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" name="nombre" class="form-control" placeholder="Ej: Juan Pérez" required>
                                <div class="invalid-feedback">
                                    Referencia: El nombre es necesario para el registro oficial.
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Correo Electrónico</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                <input type="email" name="email" class="form-control" placeholder="nombre@correo.com" required>
                                <div class="invalid-feedback">
                                    Referencia: Enviaremos el presupuesto a esta dirección.
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Teléfono / WhatsApp</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text"><i class="bi bi-whatsapp"></i></span>
                                <input type="tel" name="telefono" class="form-control" placeholder="573001234567" required>
                                <div class="invalid-feedback">
                                    Referencia: Necesitamos un medio de contacto rápido.
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Especificaciones Técnicas</label>
                            <textarea name="mensaje" class="form-control" rows="4" style="border-left: 1px solid #dee2e6;" placeholder="Describa medidas, tipo de material (Galvanizado/Inox) y cantidad..." required></textarea>
                            <div class="invalid-feedback">
                                Referencia: Indique las medidas para un cálculo exacto.
                            </div>
                        </div>

                        <div class="d-grid pt-2">
                            <button type="submit" class="btn btn-primary btn-lg shadow-sm">
                                <i class="bi bi-send-fill me-2"></i> Enviar a Fabricación
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <p class="text-center mt-4 text-muted small">© 2026 AM Montajes - Expertos en Aire</p>
        </div>
    </div>
</div>

<script>
(() => {
  'use strict'
  const forms = document.querySelectorAll('.needs-validation')
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }
      form.classList.add('was-validated')
    }, false)
  })
})()
</script>

</body>
</html>