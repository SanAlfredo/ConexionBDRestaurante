<?php
//declarar la conexion
include("conexion.php");
try {
    //crear tabla usuarios
    $sql = "CREATE TABLE IF NOT EXISTS usuarios (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    nombre VARCHAR(50),
                    usuario VARCHAR(30),
                    contra VARCHAR(30),
                    tipo INT(6)
        )";
    mysqli_query($conn, $sql);
    //crear tabla productos
    $sql = "CREATE TABLE IF NOT EXISTS productos (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50),
        descripcion TEXT,
        categoria VARCHAR(20),
        precio FLOAT
    )";
    mysqli_query($conn, $sql);
    //crear tabla ventas
    $sql = "CREATE TABLE IF NOT EXISTS ventas (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        cod_cliente INT(6) UNSIGNED,
        fecha DATETIME DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (cod_cliente) REFERENCES usuarios(id)
    )";
    mysqli_query($conn, $sql);
    //crear tabla pedidos
    $sql = "CREATE TABLE IF NOT EXISTS pedidos (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        cod_producto INT(6) UNSIGNED,
        cod_venta INT(6) UNSIGNED,
        cantidad INT,
        precio_total FLOAT,
        FOREIGN KEY (cod_producto) REFERENCES productos(id),
        FOREIGN KEY (cod_venta) REFERENCES ventas(id)
    )";
    mysqli_query($conn, $sql);
    //crear usuarios iniciales
    $sql = "INSERT INTO usuarios (id,nombre, usuario, contra,tipo) VALUES 
        (1,'Administrador o gerente','admin','1234',1),
        (2,'Alisson Bellot Cuba','alisson','1234',2),
        (3,'Mariela Poma Andia','mariela','1234',2),
        (4,'Jimmy Vladimir Mendez Condori','jimmy','1234',2)";
    mysqli_query($conn, $sql);
    //crear productos iniciales
    $sql = "INSERT INTO productos (id, nombre, descripcion, categoria, precio) VALUES 
    (1,'porcion de papas','porcion de papas fritas tamaño mediano','complementos',5.0),
    (2,'porcion de postre','porcion de platano frito tamaño mediano','complementos',3.0),
    (3,'porcion de arroz','porcion de arroz graneado para una persona','complementos',5.0),
    (4,'coca cola vaso pequeño','gaseosa coca cola en vaso de 250 ml','gaseosas',5.0),
    (5,'coca cola vaso mediano','gaseosa coca cola en vaso de 500 ml','gaseosas',7.0),
    (6,'coca cola vaso grande','gaseosa coca cola en vaso de 750 ml','gaseosas',10.0),
    (7,'coca cola botella','gaseosa coca cola en botella descartable de 2 Lts','gaseosas',14.0),
    (8,'fanta vaso pequeño','gaseosa fanta en vaso de 250 ml','gaseosas',5.0),
    (9,'fanta vaso mediano','gaseosa fanta en vaso de 500 ml','gaseosas',7.0),
    (10,'fanta vaso grande','gaseosa fanta en vaso de 750 ml','gaseosas',10.0),
    (11,'fanta botella','gaseosa fanta en botella descartable de 2 Lts','gaseosas',14.0),
    (12,'porcion pollo a la broaster','1/4 pollo preparado con la reseta especial Don Pepe y cocido a la broaster','pollos',12.0),
    (13,'balde de 4','balde de 4 porciones de 1/4 de pollo preparado con la reseta especial Don Pepe y cocido a la broaster acompañado de papas fritas','pollos',56.0),
    (14,'balde de 8','balde de 8 porciones de 1/4 de pollo preparado con la reseta especial Don Pepe y cocido a la broaster acompañado de papas fritas','pollos',110.0),
    (15,'pollo a la broaster con papas','1/4 pollo preparado con la reseta especial Don Pepe y cocido a la broaster acompañado de papas fritas','pollos',15.0),
    (16,'pollo a la broaster con arroz','1/4 pollo preparado con la reseta especial Don Pepe y cocido a la broaster acompañado de arroz graneado','pollos',15.0),
    (17,'combo pollo 1','1/4 pollo broaster con papas fritas y coca cola vaso pequeña','pollos',19.0),
    (18,'combo pollo 2','1/4 pollo broaster con papas fritas y coca cola vaso mediana','pollos',21.0),
    (19,'combo pollo 3','1/4 pollo broaster con papas fritas y coca cola vaso grande','pollos',23.0),
    (20,'lomito','sandwich de carne de res con jamon, queso, tomate, lechuga y aderesos acompañado de papa frita','sandwiches',18.0),
    (21,'lomito con huevo','sandwich de carne de res con huevo, jamon, queso, tomate, lechuga y aderesos acompañado de papa frita','sandwiches',20.0),
    (22,'hamburguesa','sandwich de carne de res molida con jamon, queso, tomate, lechuga y aderesos acompañado de papa frita','sandwiches',18.0),
    (23,'combo lomito 1','sandwich de carne de res con jamon, queso, tomate, lechuga y aderesos acompañado de papa frita y coca cola vaso pequeña','sandwiches',
    21.0),
    (24,'combo lomito 2','sandwich de carne de res con jamon, queso, tomate, lechuga y aderesos acompañado de papa frita y coca cola vaso mediana','sandwiches',
    23.0),
    (25,'combo lomito 3','sandwich de carne de res con jamon, queso, tomate, lechuga y aderesos acompañado de papa frita y coca cola vaso grande','sandwiches',
    25.0),
    (26,'combo lomito 4','sandwich de carne de res con huevo, jamon, queso, tomate, lechuga y aderesos acompañado de papa frita y coca cola vaso pequeña','sandwiches',23.0)";
    mysqli_query($conn, $sql);
    //mensaje de exito
    echo "tabla usuarios creada con exito y datos ingresados";
} catch (Exception $e) {
    //mensaje de error
    echo "Ha ocurrido un error: " . $e;
}

mysqli_close($conn);
