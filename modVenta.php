<?php
//conectamos a la base de datos
include("conexion.php");

//dentro de la ruta los datos
$id = $_GET['codigo'];
$nombre = $_GET['nombre'];
try {

    //realizar la consulta sql
    $query = "UPDATE ventas set pago='1' WHERE id='$id'";
    //guardar en resultados
    $response = mysqli_query($conn, $query);
    if ($response) {
        echo("Pagado con exito");
    } else {
        echo("No se pudo pagar su pedido");
    }
    $conn->close();
} catch (Exception $e) {
    echo("No se pudo pagar su pedido");
}