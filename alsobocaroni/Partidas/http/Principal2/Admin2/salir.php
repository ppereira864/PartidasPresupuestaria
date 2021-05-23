<?php
require("../../ConexionBD/conexion.php");

$salir_sesion = "DELETE FROM sesion_iniciada";
// -- WHERE usuario_actual='$row_usuario'";
$ejecutar_consulta = $conexion->query($salir_sesion);

$conexion->close();
header("Location: ../../../");

 ?>
