<?php
//declarar la conexion
include("config.php");

//conectamos al servidor
$conn = mysqli_connect($host, $user, $password, $database);
//verificar si existe la conexion
if (!$conn) {
    die("la conexion ha fallado: " . mysqli_connect_error());
}
