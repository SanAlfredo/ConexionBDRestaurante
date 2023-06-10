<?php
//conectamos a la base de datos
include("conexion.php");

//dentro de la ruta obtener el id
$nombre = $_GET['nombre'];

try {
    //realizar la consulta sql
    $consulta = "SELECT * FROM productos WHERE nombre LIKE '%" . $nombre . "%'";
    //guardar en resultados
    $resultado = $conn->query($consulta);
    //si existe resultados mostrar en un vector
    while ($fila = $resultado->fetch_array()) {
        $respuesta[] = array_map('utf8_encode', $fila);
    }
    echo json_encode($respuesta);
} catch (Exception $e) {
    echo "no existe: " . $e;
}

$resultado->close();