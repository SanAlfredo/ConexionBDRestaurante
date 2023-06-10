<?php
//conectamos a la base de datos
include("conexion.php");

//realizar la consulta sql
$consulta = "SELECT * FROM productos";
//guardar en resultados
$resultado = $conn->query($consulta);
//si existe resultados mostrar en un vector
while ($fila = $resultado->fetch_array()) {
    $usuario[] = array_map('utf8_encode', $fila);
}
echo json_encode($usuario);
$resultado->close();