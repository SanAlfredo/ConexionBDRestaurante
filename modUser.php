<?php
//conectamos a la base de datos
include("conexion.php");

//dentro de la ruta los datos
$nombre = $_GET['nombre'];
$usuario = $_GET['usuario'];
$contra = $_GET['contra'];
$tipo = $_GET['tipo'];
$id = $_GET['id'];
$result = array();
$result['datos'] = array();
$result['exito'] = "0";

try {

    //realizar la consulta sql
    $query = "UPDATE usuarios set nombre='$nombre',usuario='$usuario',
            contra='$contra',tipo='$tipo' WHERE id='$id'";
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
