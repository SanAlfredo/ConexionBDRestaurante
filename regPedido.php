<?php
$cod_producto = $_GET["cod_producto"];
$cod_cliente = $_GET["cod_cliente"];
$cantidad = $_GET["cantidad"];
$fecha = $_GET["fecha"];
$precio_total = $_GET["precio_total"];

$cont = 0;
//llamar conexion
include("conexion.php");

if ($conn) {
    $res = mysqli_query($conn, "INSERT INTO productos(cod_producto,cod_cliente,cantidad,fecha,precio_total) VALUES ($cod_producto,$cod_cliente,$cantidad,$fecha,$precio_total)");
    if ($res) {
        echo "Registro pedido exitoso";
    } else {
        echo "Fallo el registro";
    }
}
mysqli_close($conn);