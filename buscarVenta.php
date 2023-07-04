<?php
//conectamos a la base de datos
include("conexion.php");

//dentro de la ruta obtener la venta
$id = $_GET['codigo'];
$result = array();
$result['datos'] = array();
$result['exito'] = "0";

try {

    //realizar la consulta sql
    $query = "SELECT * FROM ventas WHERE id= '$id'";
    //guardar en resultados
    $response = mysqli_query($conn, $query);
    if (mysqli_num_rows($response) > 0) {
        //si existe resultados mostrar en un vector
        while ($fila = mysqli_fetch_array($response)) {
            $index['id'] = $fila['0'];
            $index['cod_cliente'] = $fila['1'];
            $index['fecha'] = $fila['2'];
            $index['pago'] = $fila['3'];
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