<!DOCTYPE html>
	<head>
		<meta charset="UTF-8">
		<title>Eliminar Producto</title>
	</head>
	<body>
		<header>
			<center><h2>Productos</h2></center>
		</header>
		<nav>
			<hr>
			<a href="registrarProductos.html">Registrar</a>
			<a href="buscarProductos.html">Buscar</a>
			<hr>
		</nav>
		<section>
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
				//Se obtienen los datos del producto ha eliminar.
				$producto->eliminar_producto($_GET['idP'],0);
				//Se obtiene la propiedad msg para mostrar un mensaje.
				echo "<br><center>".$producto->msg."</center>";
			?>
		</section>
	</body> 
</html>