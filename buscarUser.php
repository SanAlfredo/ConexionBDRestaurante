<?php
//conectamos a la base de datos
include("conexion.php");

//dentro de la ruta obtener el id
$usuario = $_GET['usuario'];

try {
    //realizar la consulta sql
    $consulta = "SELECT * FROM usuarios WHERE usuario LIKE '%" . $usuario . "%'";
    //guardar en resultados
    $resultado = $conn->query($consulta);
    //si existe resultados mostrar en un vector
    while ($fila = $resultado->fetch_array()) {
        $usuario = array_map('utf8_encode', $fila);
    }
    echo json_encode($usuario);
} catch (Exception $e) {
    echo "no existe: " . $e;
}

$resultado->close();
