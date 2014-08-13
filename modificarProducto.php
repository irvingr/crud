<!DOCTYPE html>
	<head>
		<meta charset="UTF-8">
		<title>Modificar Producto</title>
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
				//Se incluyen las librerias de conexion y la clase de serviciospara conectarme y realizar el procesamiento de la informacion.
				include'class/conn.php';
				include'class/productos.php';
				//Se crea el objeto de la clase conn.
				$conexion = new conn();
				//Se crea el objeto de la clase productos.
				$producto = new productos();
				//Se obtiene la función conectar.
				$conexion->conectar("localhost","root","","planentrenamiento_actividad1");
				//Se obtienen los datos del producto ha modificar.
				$producto->obtener_datos($_GET['idP']);
			?>
			<fieldset style="width:30%;">
				<legend>Modificar Producto</legend>
				<form action='modificarProductos2.php' method='POST'>
					<table>
						<tr>
							<td><label>Producto:</label></td>
						</tr>
						<tr>
							<td>
								<input type="hidden" name="txtIDp" value="<?php echo $producto->idProd ?>">
								<input type="text" name="txtProducto" value="<?php echo $producto->nomProd ?>" required>
							</td>
						</tr>
						<tr>
							<td><label>Estado:</label></td>							
						</tr>
						<tr>
							<td>
								<?php
									if($producto->estadoProd == 1){
										echo"<input type='radio' name='rdioEstado' value='1' checked='checked'>Activo";
										echo"<input type='radio' name='rdioEstado' value='0'>Inactivo";
									}else{
										echo"<input type='radio' name='rdioEstado' value='1'>Activo";
										echo"<input type='radio' name='rdioEstado' value='0' checked='checked'>Inactivo";
									}
								?>
							</td>
						</tr>
						<tr>
							<td align="right"><button name='btnModificar'>Modificar</button></td>
						</tr>
					</table>
				</form>
			</fieldset>
		</section>
	</body> 
</html>