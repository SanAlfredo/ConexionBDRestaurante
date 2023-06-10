<?php
//conectamos a la base de datos
include("conexion.php");

//dentro la ruta
$nombre = $_GET['nombre'];
$usuario = $_GET['usuario'];
$contra = $_GET['contra'];
$tipo = $_GET['tipo'];
$result = array();
$result['datos'] = array();
$result['exito'] = "0";

try {

    //realizar la consulta sql
    $query = "INSERT INTO usuarios(nombre,usuario,contra,tipo) VALUES ('$nombre','$usuario',
            '$contra','$tipo')";
    //guardar en resultados
    $response = mysqli_query($conn, $query);
    if ($response) {
        $index['id'] = mysqli_insert_id($conn);
        array_push($result['datos'], $index);
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
