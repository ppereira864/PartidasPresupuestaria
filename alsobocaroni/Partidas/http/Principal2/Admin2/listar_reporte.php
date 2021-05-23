<?php

$plistar = $_POST['plistar'];
$texto = $_POST['texto'];


if($plistar == "listado"){
	echo listar_detalle2($texto);
}



function listar_detalle2($valor){

	require("../../ConexionBD/conexion.php");

	if ( $valor == "todos" OR $valor == "Todos" OR $valor == "TODOS" ){

		$busqueda = "SELECT * FROM reportes ORDER BY dig_mes";
			$ejecutar_consulta = $conexion->query($busqueda);

		$tmp="";
			$tmp.="<center><table border=1 cellspacing=0 cellpadding=3 bordercolor=666633 style='width: 50%;'>";
			$tmp.="<tr bgcolor='#8D8DDA'>";
			$tmp.="<td><strong> A&ntilde;o </strong></td><td><strong> Mes </strong></td></td><td><strong> Accion </strong></td>";
			$tmp.="</tr>";

			$anno = ""; $mes=""; $codPrim = ""; $codpar = 00; $codgen = 00;

			while ($result = mysqli_fetch_array($ejecutar_consulta)){

				$v1 = $result['anno'];
				$v2 = $result['mes'];

					$tmp.="<tr>";
							$tmp.="<td>".$result['anno']."</td>";
							$tmp.="<td>".$result['mes']."</td>";
							$tmp.="<td><a href='pdf/ContructorPDF.php?v1=$v1&v2=$v2' target='_blank'> VER PDF </a></td>";
					$tmp.="</tr>";

			}

			$tmp.="</table></center>";

			echo $tmp;

	}else {
			echo "<strong style='color:red'>Error campo Vacio !!!!</strong>";
	}
	
	

}

?>