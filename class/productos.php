<?php
	//Clase que realiza todas la operaciones hacia la base de datos.
	class productos
	{
		//Atributos.
		public $id;
		public $nomProd;
		public $fechaCreacion;
		public $fechaMod;
		public $estado;
		//Función para insertar un nuevo producto.
		public function registrar_producto($nomProd,$estado){
			//Consulta SQL que inserta en la base de datos un producto.
			$consulta = "INSERT INTO productos (producto,fecha_creacion,estado)
						 VALUES ('$nomProd',NOW(),'$estado')";
			//Ejecuta la consulta.
			$ejecutar = mysql_query($consulta) or die(mysql_error());
			$this->msg = "<script language='javascript'>alert('Producto guardado correctamente');</script>";
			$this->msg .= "<script type='text/javascript'>window.location='registrarProductos.html';</script>";
		}
		//Función para buscar un producto
		public function buscar_producto($criterio){
			//Consulta SQL para buscar por nombre del producto.
			$consulta = "SELECT * FROM productos WHERE (producto LIKE '%$criterio%') ORDER BY producto ASC";
			//Ejecuta la consulta.
			$ejecutar = mysql_query($consulta) or die(mysql_error());
			//Busca si existen registros de acuerdo a la consulta realizada.
			$registros = mysql_num_rows($ejecutar);
			//Si encuentra registros muestra los resultados en una tabla.
			if ($registros>=1) {
				//Encabezados de la tabla.
				$tabla = "<br><center><table border='1'>
							<tr align='center'>
								<td>Clave Producto</td>
								<td>Producto</td>
								<td>Fecha de Creación</td>
								<td>Fecha de Modificación</td>
								<td>Estado</td>
								<td>Acciones</td>
							</tr>";
				//Si se encuentra mas de un registro, se realiza un ciclo.
				for($i=0;$i<$registros;$i++){
					//Se obtienen los valores de la consulta
					$idProd = mysql_result($ejecutar,$i,'id');
					$nomProd = mysql_result($ejecutar,$i,'producto');
					$fechaC_Prod = mysql_result($ejecutar,$i,'fecha_creacion');
					$fechaM_Prod = mysql_result($ejecutar,$i,'fecha_actualizacion');
					$estadoProd = mysql_result($ejecutar,$i,'estado');
					//Resultado de la consulta.
					$tabla = $tabla."<tr align='center'>
								<td>$idProd</td>
								<td>$nomProd</td>
								<td>$fechaC_Prod</td>
								<td>$fechaM_Prod</td>
								<td>$estadoProd</td>
								<td>
									<a href='modificarProducto.php?idP=$idProd'>Modificar</a>
									<a href='eliminarProducto.php?idP=$idProd'>Eliminar</a>
								</td>
							   </tr>" ;
				}
				//Se cierra la tabla.
				$tabla = $tabla."</table></center>";
				//Devuelve el valor de la variable $tabla.
				$this->msg = $tabla;
			}else{
				//Devuelve un mensaje en caso de no encontrar registros
				$this->msg="<br>No se encontraron resultado con el criterio solicitado";
			}
		}
		//Función para modifcar un producto.
		public function modificar_producto($id,$nomProd,$estado){
			//Consulta SQL que modifica en la base de datos un producto.
			$consulta = "UPDATE productos SET producto='$nomProd', fecha_actualizacion=NOW(), estado='$estado' WHERE id='$id'";
			//Ejecuta la consulta.
			$ejecutar = mysql_query($consulta) or die(mysql_error());
			$this->msg = "<script language='javascript'>alert('Producto modificado correctamente');</script>";
			$this->msg .= "<script type='text/javascript'>window.location='buscarProductos.html';</script>";
		}

		public function eliminar_producto($id,$estado){
			//Consulta para verificar el estado del producto.
			$consulta = "SELECT estado FROM productos WHERE id='$id'";
			//Ejecuta la consulta.
			$ejecutar = mysql_query($consulta) or die(mysql_error());
			//Se obtiene el estado del producto de acuerdo al id selecionado.
			$estadoProd = mysql_result($ejecutar,0,'estado');
			//Si el estado es igual a Inactivo(0), se muestra un mensaje.
			if($estadoProd==0){
				$this->msg = "El producto ya fue desactivado con anterioridad";
			}
			//Y si el estado es diferente de Inactivo(0) se actualiza a Activo(1).
			else{
				//Consulta SQL que elimina en la base de datos un producto, en ste caso no elimina solo cambia desactiva el registro.
				$consulta2 = "UPDATE productos SET estado='$estado' WHERE id='$id'";
				//Ejecuta la consulta.
				$ejecutar2 = mysql_query($consulta2) or die(mysql_error());
				$this->msg = "El producto no se elimina solo se desactiva";
			}
		}

		public function obtener_datos($id){
			//Consulta SQL que elimina en la base de datos un producto, en este caso no se elimina solo se desactiva el registro.
			$consulta = "SELECT * FROM productos WHERE id='$id'";
			//Ejecuta la consulta.
			$ejecutar = mysql_query($consulta) or die(mysql_error());
			//Busca si existen registros de acuerdo a la consulta realizada.
			$registros = mysql_num_rows($ejecutar);
			//Se obtienen los valores de la consulta realizada.
			$this->idProd = mysql_result($ejecutar,0,'id');
			$this->nomProd = mysql_result($ejecutar,0,'producto');
			$this->estadoProd = mysql_result($ejecutar,0,'estado');
		}
	}
?>