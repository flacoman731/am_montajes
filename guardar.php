<?php
include("conexion.php");

$nombre    = $_POST['nombre'];
$email     = $_POST['email'];
$telefono  = $_POST['telefono']; 
$mensaje   = $_POST['mensaje'];

$sql = "INSERT INTO cotizaciones (nombre, email, telefono, mensaje) 
        VALUES ('$nombre', '$email', '$telefono', '$mensaje')";

if (mysqli_query($conexion, $sql)) {
    echo "¡Cotización enviada!";
}
?>