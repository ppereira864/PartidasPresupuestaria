<?php
//utilizando nuevas funciones
function conectarse(){
	$servidor = "localhost";
	$usuario = "root";
	$password = "";
	$bd = "comsocaroni";

	$conectar = new mysqli($servidor,$usuario,$password,$bd);
	return $conectar;
}
$conexion = conectarse();

?>
