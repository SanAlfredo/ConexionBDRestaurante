<?php
$nombre = $_GET["nombre"];
$usuario = $_GET["usuario"];
$contra = $_GET["contra"];
$tipo = $_GET["tipo"];

$cont = 0;
//llamar conexion
include("conexion.php");

if ($conn) {
    $res = mysqli_query($conn, "INSERT INTO usuarios(nombre,usuario,contra,tipo) VALUES ($nombre,$usuario,$contra,$tipo)");
    if ($res) {
        echo "Registro usuario exitoso";
    } else {
        echo "Fallo el registro";
    }
}
mysqli_close($conn);
