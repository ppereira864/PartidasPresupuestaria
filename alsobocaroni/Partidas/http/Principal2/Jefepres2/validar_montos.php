<?php 

$plistar = $_POST['plistar'];
$modificado = $_POST['modificado'];
$comprometido = $_POST['comprometido'];


if($plistar == "listado"){
	echo listar_detalle($modificado, $comprometido);
}


function listar_detalle($valor, $valor2){

	require("../../ConexionBD/conexion.php");


	if ( $valor > $valor2  ){

		echo "

			<hr>
			<table>
			<br>
				<center>
					<input type='submit' name='REGISTRAR' value='Registrar'>
					<input type='reset' name='borrar' value='Borrar'>
				</center>
			</table>
		 ";
		 
	}else{

		echo "

			<strong style='color:#C82828;'>Error Comprometido Mayor a Modificado </strong>
		 ";
	}






}




 ?>