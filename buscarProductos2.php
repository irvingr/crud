<?php
	//Se incluyen las librerias de conexion y la clase de servicios para conectarme y realizar el procesamiento de la informacion.
	include'class/conn.php';
	include'class/productos.php';
	//Se crea el objeto de la clase conn.
	$conexion = new conn();
	//Se crea el objeto de la clase productos.
	$producto = new productos();
	//Se obtiene la función conectar.
	$conexion->conectar();
	//Se obtiene la funcion para buscar los datos del producto.
	$producto->buscar_producto($_REQUEST['txtCrit']);
	//Se obtiene la tabla de resultados en la variable $tabla.
	echo $tabla = $producto->msg;
?>