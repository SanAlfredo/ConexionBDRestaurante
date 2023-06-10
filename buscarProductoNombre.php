<?php
//conectamos a la base de datos
include("conexion.php");

//dentro de la ruta obtener el id
$nombre = $_GET['nombre'];
$result = array();
$result['datos'] = array();
$result['exito'] = "0";

try {

    //realizar la consulta sql
    $query = "SELECT * FROM productos WHERE nombre LIKE  '%".$nombre."%'";
    //guardar en resultados
    $response = mysqli_query($conn, $query);
    if (mysqli_num_rows($response) > 0) {
        //si existe resultados mostrar en un vector
        while ($fila = mysqli_fetch_array($response)) {
            $index['id'] = $fila['0'];
            $index['nombre'] = $fila['1'];
            $index['descripcion'] = $fila['2'];
            $index['categoria'] = $fila['3'];
            $index['precio'] = $fila['4'];
            array_push($result['datos'], $index);
        }
        $result['exito'] = "1";
    } else {
        $result['exito'] = "0";
        $result['datos'] = [];
    }
    $response->close();
} catch (Exception $e) {
    $result['datos'] = "error " . $e;
    $result['exito'] = "0";
}
echo json_encode($result);
