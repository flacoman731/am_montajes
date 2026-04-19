<?php
include("conexion.php");

if(isset($_POST['id']) && isset($_POST['estado'])){
    $id = $_POST['id'];
    $estado = $_POST['estado'];

    $sql = "UPDATE cotizaciones SET estado = '$estado' WHERE id = '$id'";
    mysqli_query($conexion, $sql);
    echo "Actualizado";
}
?>