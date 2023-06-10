<?php
//conectamos a la base de datos
include("conexion.php");

//dentro de la ruta los datos
$nombre = $_GET['nombre'];
$descripcion = $_GET['descripcion'];
$categoria = $_GET['categoria'];
$precio = $_GET['precio'];
$id=$_GET['id'];
$result = array();
$result['datos'] = array();
$result['exito'] = "0";

try {

    //realizar la consulta sql
    $query = "UPDATE productos set nombre='$nombre',descripcion='$descripcion',
            categoria='$categoria',precio='$precio' WHERE id='$id'";
    //guardar en resultados
    $response = mysqli_query($conn, $query);
    if ($response) {
        $result['exito'] = "1";
    } else {
        $result['exito'] = "0";
        $result['datos'] = [];
    }
    $conn->close();
} catch (Exception $e) {
    $result['datos'] = "error " . $e;
    $result['exito'] = "0";
}
echo json_encode($result);