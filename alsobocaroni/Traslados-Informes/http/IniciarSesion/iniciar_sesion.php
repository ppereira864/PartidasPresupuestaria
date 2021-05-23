<?php
require("../ConexionBD/conexion.php");

$usuario= $_POST['usuario']; // recibiendo usuario del login
$clave = $_POST['clave']; // recibiendo contraseña del login

$path = "../../../../plugins/dllsth.txt";

if (!file_exists($path))
    exit("File not found");
$file = fopen($path, "r");
if ($file) {
    while (($line = fgets($file)) !== false) {
        $boca = $line; 
    }
    if (!feof($file)) {
        echo "Error: EOF not found\n";
    }
    fclose($file);
}

$clavedll = hash('sha512', $boca.$clave);

$verificar_user = "SELECT * FROM usuarios WHERE usuario='$usuario' && contrasena='$clavedll' ";
$ejecutar_consulta = $conexion->query($verificar_user);

// validando que la ejecucion del query exista!!
// es decir validando que el usuario y contraseña coincida en la base de datos
if($row = $ejecutar_consulta->fetch_assoc())
{
		$row_rango = $row['rango'];
		$row_estado = $row['estado'];

		//verificando el tipo de rango si es Administrador
		if ( ($row_rango == 'Administrador') && ($row_estado == 'Activo') ) {

			$estado = "Activo";
			$usuario_actual = $usuario;
			$fecha = date("d-m-o");
			$hora = date("h:i:s a");
			$ip_maquina = $_SERVER["REMOTE_ADDR"];
			$host_maquina = gethostname();

			$registrar_sesion = "INSERT INTO sesion_iniciada (estado, usuario_actual, fecha, hora, ip_maquina, host_maquina)
							 VALUES ('$estado','$usuario_actual', '$fecha','$hora', '$ip_maquina', '$host_maquina')";

			$ejecutar_consulta = $conexion->query($registrar_sesion);

			$ActualizarUsuarios = "UPDATE usuarios SET ultimoacceso='$fecha/$hora' WHERE usuario='$usuario'";

			$ejecutar_consulta2 = $conexion->query($ActualizarUsuarios);

			// validamos si se ejecuta la consulta guardando registro de sesion
			if ($ejecutar_consulta && $ejecutar_consulta2) {
				session_start();
				header("Location: ../Principal/Admin/admin.php");
			}else {
				$conexion->close();
			 	header("Location: ../../");
			}

		} else if ( ($row_rango == 'Administrador') && ($row_estado == 'Restringido') ) {

			 	echo "<html>
						<head>
							<meta http-equiv='REFRESH' content='0 ; url=../../'>
							<script>
								alert('¡¡¡¡ Lo Siento Usuario Bloqueado !!!!');
							</script>
						</head>
					</html>";

		}

		//verificando el tipo de rango si son Directores
		if ( ($row_rango == 'JefePresupuesto') && ($row_estado == 'Activo') ) {

			$estado = "Activo";
			$usuario_actual = $usuario;
			$fecha = date("d-m-o");
			$hora = date("h:i:s a");
			$ip_maquina = $_SERVER["REMOTE_ADDR"];
			$host_maquina = gethostname();

			$registrar_sesion = "INSERT INTO sesion_iniciada (estado, usuario_actual, fecha, hora, ip_maquina, host_maquina)
							 VALUES ('$estado','$usuario_actual', '$fecha','$hora', '$ip_maquina', '$host_maquina')";

			$ejecutar_consulta = $conexion->query($registrar_sesion);

			$ActualizarUsuarios = "UPDATE usuarios SET ultimoacceso='$fecha/$hora' WHERE usuario='$usuario'";

			$ejecutar_consulta2 = $conexion->query($ActualizarUsuarios);

			// validamos si se ejecuta la consulta guardando registro de sesion
			if ($ejecutar_consulta && $ejecutar_consulta2) {
				session_start();
				header("Location: ../Principal/JefePresupuesto/jefepresupuesto.php");
			}else {
				$conexion->close();
			 	header("Location: ../../");
			}

		} else if ( ($row_rango == 'JefePresupuesto') && ($row_estado == 'Restringido') ) {

			 	echo "<html>
						<head>
							<meta http-equiv='REFRESH' content='0 ; url=../../'>
							<script>
								alert('¡¡¡¡ Lo Siento Usuario Bloqueado !!!!');
							</script>
						</head>
					</html>";

		}


}else // Si el Usuario no existe se cierra conexion y se dirreciona al login
{
	$conexion->close();
 	
 	echo "<html>
			<head>
				<meta http-equiv='REFRESH' content='0 ; url=../../'>
				<script>
					alert('¡¡¡¡ Error Usuario y Contraseña no Coinciden !!!!');
				</script>
			</head>
		</html>";
}


?>
