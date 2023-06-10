<?php
//conectamos a la base de datos
include("conexion.php");

//dentro la ruta
$codigo = $_GET['codigo'];
$result = array();
$result['datos'] = array();
$result['exito'] = "0";

try {

    //realizar la consulta sql
    $query = "INSERT INTO ventas(cod_cliente) VALUES ('$codigo')";
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