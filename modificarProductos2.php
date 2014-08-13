<?php
	//Se incluyen las librerias de conexion y la clase de servicios para conectarme y realizar el procesamiento de la informacion.
	include'class/conn.php';
	include'class/productos.php';
	//Se crea el objeto de la clase conn.
	$conexion = new conn();
	//Se crea el objeto de la clase productos.
	$producto = new productos();
	//Si se recibe el botón de btnModificar, se modifica la información recibida.
	if(isset($_REQUEST['btnModificar'])){
		//Se obtiene la función conectar.
		$conexion->conectar();
		//Se obtiene la funcion para modificar los datos del producto.
		$producto->modificar_producto($_REQUEST['txtIDp'],$_REQUEST['txtProducto'],$_REQUEST['rdioEstado']);
		//Se obtiene la propiedad msg para mostrar un mensaje.
		echo $producto->msg;
	}
?>