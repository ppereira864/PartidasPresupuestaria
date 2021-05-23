<?php

$plistar = $_POST['plistar'];
$texto = $_POST['texto'];


if($plistar == "listado"){
	echo listar_detalle($texto);
}

function listar_detalle($valor){

	require("../../ConexionBD/conexion.php");

	$consulta = "SELECT * FROM presupuesto_partida WHERE anno='$valor' ";
	$ejecutar_consulta = $conexion->query($consulta);

	if ( $valor != "todas" AND $valor != "" AND $ejecutar_consulta->fetch_assoc()){

		$tmp="";
		$tmp.="<center><table border=1 cellspacing=0 cellpadding=3 bordercolor=666633 style='width: 100%;'>
             <tr bgcolor='skyblue'>";
		$tmp.="<tr bgcolor='skyblue'>";
		$tmp.="<td><strong>año</strong></td>";
		$tmp.="<td><strong>mes</strong></td>";
		$tmp.="<td><strong>cod_par</strong></td>";
		$tmp.="<td><strong>cod_gen</strong></td>";
		$tmp.="<td><strong>cod_esp</strong></td>";
		$tmp.="<td><strong>cod_sub</strong></td>";
		$tmp.="<td><strong>monto_ley</strong></td>";
		$tmp.="<td><strong>modificado</strong></td>";
		$tmp.="<td><strong>credito_asignado</strong></td>";
		$tmp.="<td><strong>comprometido</strong></td>";
		$tmp.="<td><strong>acumulado</strong></td>";
		$tmp.="<td><strong>disponible</strong></td>";
		$tmp.="</tr>";

		$consulta = "SELECT * FROM presupuesto_partida WHERE anno='$valor' order by dig_mes, cod_part, cod_gen, cod_esp, cod_sub";

		$ejecutar_consulta = $conexion->query($consulta);

		while ($result=mysqli_fetch_array($ejecutar_consulta)){

				$tmp.="<tr>";
				$tmp.="<td>".$result["anno"]."</td>";
				$tmp.="<td>".$result["mes"]."</td>";
				$tmp.="<td>4.".$result["cod_part"]."</td>";
				$tmp.="<td>".$result["cod_gen"]."</td>";
				$tmp.="<td>".$result["cod_esp"]."</td>";
				$tmp.="<td>".$result["cod_sub"]."</td>";
				$tmp.="<td>".$result["monto_ley"]."</td>";
				$tmp.="<td>".$result["modificado"]."</td>";
				$tmp.="<td>".$result["credito_asignado"]."</td>";
				$tmp.="<td>".$result["comprometido"]."</td>";
				$tmp.="<td>".$result["acumulado"]."</td>";
				$tmp.="<td>".$result["disponible"]."</td>";
				$tmp.="</tr>";
		}
		
		$tmp.="</table></center>";

		echo $tmp;

	}else if ( $valor == "todas" ){

		$tmp="";
		$tmp.="<center><table border=1 cellspacing=0 cellpadding=3 bordercolor=666633 style='width: 100%;'>
             <tr bgcolor='skyblue'>";
		$tmp.="<tr bgcolor='skyblue'>";
		$tmp.="<td><strong>Año</strong></td>";
		$tmp.="<td><strong>Mes</strong></td>";
		$tmp.="<td><strong>Cod_par</strong></td>";
		$tmp.="<td><strong>Cod_gen</strong></td>";
		$tmp.="<td><strong>Cod_esp</strong></td>";
		$tmp.="<td><strong>Cod_sub</strong></td>";
		$tmp.="<td><strong>Monto_ley</strong></td>";
		$tmp.="<td><strong>Modificado</strong></td>";
		$tmp.="<td><strong>Credito_asignado</strong></td>";
		$tmp.="<td><strong>Comprometido</strong></td>";
		$tmp.="<td><strong>Acumulado</strong></td>";
		$tmp.="<td><strong>Disponible</strong></td>";
		$tmp.="<td><strong>Accion</strong></td>";
		$tmp.="</tr>";
		
		$busqueda = "SELECT * FROM presupuesto_partida order by dig_mes, cod_part, cod_gen, cod_esp, cod_sub";
		$ejecutar_consulta = $conexion->query($busqueda);

		while ($result=mysqli_fetch_array($ejecutar_consulta)){

			$item = $result['item'];

				$tmp.="<tr>";
				$tmp.="<td>".$result["anno"]."</td>";
				$tmp.="<td>".$result["mes"]."</td>";
				$tmp.="<td>4.".$result["cod_part"]."</td>";
				$tmp.="<td>".$result["cod_gen"]."</td>";
				$tmp.="<td>".$result["cod_esp"]."</td>";
				$tmp.="<td>".$result["cod_sub"]."</td>";
				$tmp.="<td>".$result["monto_ley"]."</td>";
				$tmp.="<td>".$result["modificado"]."</td>";
				$tmp.="<td>".$result["credito_asignado"]."</td>";
				$tmp.="<td>".$result["comprometido"]."</td>";
				$tmp.="<td>".$result["acumulado"]."</td>";
				$tmp.="<td>".$result["disponible"]."</td>";
				$tmp.="<td><a href='ModifPartida.php?codigo=$item'>Editar </a>|<a href='NewUpdaRestDelt.php?opc=partidaborrar&codigo=$item'> Eliminar</a></td>";
				$tmp.="</tr>";
		}
		
		$tmp.="</table></center>";

		echo $tmp;

	}else{
		echo "<strong style='color:red'>Error Campo Invalido</strong>";
	}
	

}

?>