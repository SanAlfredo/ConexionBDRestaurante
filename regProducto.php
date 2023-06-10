<?php
$nombre = $_GET["nombre"];
$descripcion = $_GET["descripcion"];
$categoria = $_GET["categoria"];
$precio = $_GET["precio"];

$cont = 0;
//llamar conexion
include("conexion.php");

if ($conn) {
    $res = mysqli_query($conn, "INSERT INTO productos(nombre,descripcion,categoria,precio) VALUES ($nombre,$descripcion,$categoria,$precio)");
    if ($res) {
        echo "Registro producto exitoso";
    } else {
        echo "Fallo el registro";
    }
}
mysqli_close($conn);