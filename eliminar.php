<?php
include("conexion.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM cotizaciones WHERE id = $id";

    if (mysqli_query($conexion, $sql)) {

        header("Location: admin.php?mensaje=eliminado");
    } else {
        echo "Error al eliminar: " . mysqli_error($conexion);
    }
} else {
    echo "No se recibió un ID válido.";
}

mysqli_close($conexion);
?>