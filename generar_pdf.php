<?php

require_once 'dompdf/autoload.inc.php'; 
use Dompdf\Dompdf;


include("conexion.php");


$id = $_GET['id'];


$consulta = mysqli_query($conexion, "SELECT * FROM cotizaciones WHERE id = '$id'");
$datos = mysqli_fetch_assoc($consulta);


$html = "
<style>
    body { font-family: Arial, sans-serif; }
    .header { text-align: center; background: #002147; color: white; padding: 10px; }
    .tabla { width: 100%; border-collapse: collapse; margin-top: 20px; }
    .tabla th, .tabla td { border: 1px solid #ddd; padding: 10px; }
    .total-box { margin-top: 30px; border: 2px solid #002147; padding: 15px; }
</style>

<div class='header'>
    <h1>AM MONTAJES</h1>
    <p>Comprobante de Cotización #{$datos['id']}</p>
</div>

<p><strong>Fecha:</strong> {$datos['fecha']}</p>
<p><strong>Cliente:</strong> {$datos['nombre']}</p>

<table class='tabla'>
    <tr><th>Concepto</th><th>Descripción</th></tr>
    <tr><td>Servicio</td><td>Fabricación e Instalación de Ductos</td></tr>
    <tr><td>Contacto</td><td>{$datos['email']} / {$datos['telefono']}</td></tr>
</table>

<div class='total-box'>
    <strong>Requerimiento del Cliente:</strong><br>
    {$datos['mensaje']}
</div>
";


$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait'); // Tamaño carta o A4
$dompdf->render();

// G. Lanzar la descarga al navegador
$dompdf->stream("Cotizacion_AM_{$id}.pdf", array("Attachment" => true));
?>