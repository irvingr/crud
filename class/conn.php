<?php
	//Clase que conecta con el servidor y base de datos.
	class conn{
		//Atributos
		public $server = "localhost";
		public $user = "root";
		public $psw = "";
		public $db = "planentrenamiento_actividad1";
		//Funcion para conectar nuestra aplicació a un servidor y a una base de datos.
		public function conectar(){
			$this->conection = mysql_connect("$this->server","$this->user","$this->psw") or die (mysql_error('Error al conectar con el servidor'));
			mysql_select_db("$this->db",$this->conection) or die (mysql_error('Error al conectar con la BD'));
		}
	}
?>