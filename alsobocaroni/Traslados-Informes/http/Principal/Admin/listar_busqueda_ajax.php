<?php

$plistar = $_POST['plistar'];
$texto = $_POST['texto'];

if($plistar == "buscar"){
	echo listar_detalle($texto);
}


function listar_detalle($valor){

	require("../../ConexionBD/conexion.php");

	if ( $valor != "todos" AND $valor != "" AND $valor != "Todos" AND $valor != "TODOS"){

		$array = explode("/", $valor);
		$i = 0;
		$valor1 = "";
		$valor2 = "";

		foreach ($array as $a) {
			if ( $i == 0 ){ $valor1 = $a; }
			if ( $i == 1 ){ $valor2 = $a; }

			$i = $i + 1 ;
		}

		if($valor1 != "" AND $valor2 != "" ){

			$tmp="";
			$tmp.="<center><table border='1'>";
			$tmp.="<tr bgcolor='#8D8DDA'>";
			$tmp.="<td><strong>Num Acuerdo</strong></td><td><strong>A&ntilde;o</strong></td><td><strong>Accion</strong></td>";
			$tmp.="</tr>";
			
			$busqueda = "SELECT * FROM traslados WHERE num_acuerdo='$valor1' AND anno='$valor2' ";
			$ejecutar_consulta = $conexion->query($busqueda);

			if ( $result=mysqli_fetch_array($ejecutar_consulta) ) {

				$v1 =$num_acuerdo = $result["num_acuerdo"];
				$v2 =$anno = $result["anno"];

					$tmp.="<tr>";
					$tmp.="<td>".$num_acuerdo."</td>";
					$tmp.="<td>".$anno."</td>";
					$tmp.="<td><a href='pdf/ContructorPDF.php?v1=$v1&v2=$v2' target='_blank'> VER EL PDF </a></td>";
					$tmp.="</tr>";
				
				$tmp.="</table></center>";

				echo $tmp;
			}else {
				echo "<strong style='color:red'> Lo Siento Traslado No Existe </strong>";
			}

		}else{

			echo "<strong style='color:red'>¡¡ Error Campo No cumple Con El Formato 123/1999 ó todos !!</strong>";
		}


	}else if ( $valor == "todos" OR $valor == "Todos" OR $valor == "TODOS" ){

		$busqueda = "SELECT *FROM traslados";
			$ejecutar_consulta = $conexion->query($busqueda);


		if ( $ejecutar_consulta ) {

			$tmp="";
				$tmp.="<center><table border='1'>";
				$tmp.="<tr bgcolor='#8D8DDA'; >";
				$tmp.="<td><strong>Num Acuerdo</strong></td><td><strong>A&ntilde;o</strong></td><td><strong>Mes</strong></td><td><strong>Accion</strong></td>";
				$tmp.="</tr>";

			while ($result=mysqli_fetch_array($ejecutar_consulta)){

				$v1 =	$num_acuerdo 	= $result["num_acuerdo"];
				$v2 =	$anno 			= $result["anno"];
				$v3 =	$mes 			= $result["mes"];

					$tmp.="<tr>";
					$tmp.="<td>".$num_acuerdo."</td>";
					$tmp.="<td>".$anno."</td>";
					$tmp.="<td>".$mes."</td>";
					$tmp.="<td><a href='pdf/ContructorPDF.php?v1=$v1&v2=$v2&v3=$v3' target='_blank'> VER EL PDF </a></td>";
					$tmp.="</tr>";
			}
			
			$tmp.="</table></center>";

			echo $tmp;

		}else{
			echo "<strong style='color:red'>¡¡ Lo Siento No Se Encuentra Traslados  !!</strong>";
		}

	}else if ( $valor == "" ){

		echo "<strong style='color:red'>¡¡ Error Campo Vacio !!</strong>";
	
	}else{

		echo "<strong style='color:red'>¡¡ Error Campo No Validos !!</strong>";
	}

}

?>