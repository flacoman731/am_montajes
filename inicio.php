<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AM Montajes | Expertos en Ductos y Ventilación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-blue: #002147;
            --accent-blue: #0056b3;
            --industrial-gray: #e9ecef;
        }

        body { font-family: 'Segoe UI', sans-serif; color: #333; }

        /* Hero Section (Imagen de fondo con texto) */
        .hero {
            background: linear-gradient(rgba(0, 33, 71, 0.8), rgba(0, 33, 71, 0.8)), 
                        url('https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&q=80&w=1500'); /* Imagen industrial */
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            text-align: center;
        }

        .section-title {
            font-weight: 700;
            color: var(--primary-blue);
            margin-bottom: 50px;
            position: relative;
        }

        .section-title::after {
            content: '';
            width: 60px;
            height: 4px;
            background: var(--accent-blue);
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
        }

        .service-card {
            border: none;
            transition: all 0.3s ease;
            height: 100%;
            background: var(--industrial-gray);
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            background: white;
        }

        .icon-box {
            font-size: 3rem;
            color: var(--accent-blue);
            margin-bottom: 20px;
        }

        .btn-industrial {
            background-color: var(--accent-blue);
            color: white;
            padding: 12px 30px;
            font-weight: 600;
            border-radius: 5px;
            border: none;
        }

        footer { background: var(--primary-blue); color: white; padding: 40px 0; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background: var(--primary-blue);">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">🌀 AM MONTAJES</a>
        <div class="ms-auto">
            <a href="#cotizar" class="btn btn-outline-light btn-sm">Solicitar Cotización</a>
        </div>
    </div>
</nav>

<header class="hero">
    <div class="container">
        <h1 class="display-3 fw-bold mb-3">Fabricación e Instalación de Ductos</h1>
        <p class="lead mb-5">Soluciones en lámina galvanizada y acero inoxidable para aplicaciones industriales y comerciales.</p>
        <a href="#servicios" class="btn btn-industrial btn-lg">Ver Nuestros Productos</a>
    </div>
</header>

<section id="servicios" class="py-5">
    <div class="container">
        <h2 class="text-center section-title">Nuestra Fabricación</h2>
        <div class="row g-4 text-center">
            
            <div class="col-md-4">
                <div class="card service-card p-4">
                    <div class="icon-box"><i class="bi bi-box-seam"></i></div>
                    <h4>Ductos Metálicos</h4>
                    <p class="text-muted small">Conductos rectangulares y circulares en lámina galvanizada de alta durabilidad.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card service-card p-4">
                    <div class="icon-box"><i class="bi bi-fire"></i></div>
                    <h4>Extracción de Humos</h4>
                    <p class="text-muted small">Sistemas especializados para cocinas industriales y parqueaderos (Cold Rolled).</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card service-card p-4">
                    <div class="icon-box"><i class="bi bi-wind"></i></div>
                    <h4>Ventilación Mecánica</h4>
                    <p class="text-muted small">Diseño y suministro de sistemas de inyección y extracción de aire.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h3 class="fw-bold mb-4">Calidad Garantizada en AM Montajes</h3>
                <p>Siguiendo los estándares de la industria, fabricamos soluciones a medida para:</p>
                <ul class="list-unstyled">
                    <li><i class="bi bi-check-circle-fill text-primary me-2"></i> Centros Comerciales y Oficinas</li>
                    <li><i class="bi bi-check-circle-fill text-primary me-2"></i> Laboratorios y Clínicas</li>
                    <li><i class="bi bi-check-circle-fill text-primary me-2"></i> Plantas de Producción Industrial</li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="p-4 bg-light rounded-4 border">
                    <h4 class="fw-bold">¿Necesita un presupuesto?</h4>
                    <p>Contamos con capacidad técnica para proyectos de gran escala.</p>
                    <a href="index.php" class="btn btn-primary w-100">Ir al Formulario de Cotización</a>
                </div>
            </div>
        </div>
    </div>
</section>

<footer>
    <div class="container text-center">
        <h5 class="fw-bold">AM MONTAJES</h5>
        <p class="small mb-0">Expertos en Sistemas HVAC - Bogotá, Colombia</p>
        <div class="mt-3">
            <i class="bi bi-whatsapp me-3"></i>
            <i class="bi bi-envelope me-3"></i>
        </div>
    </div>
</footer>

</body>
</html>