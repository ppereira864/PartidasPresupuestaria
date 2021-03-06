<?php 

require("http/ConexionBD/conexion.php");

$comp_ip_maq = $_SERVER["REMOTE_ADDR"];
$comp_host_maq = gethostname();

$comp_sesion = "SELECT * FROM sesion_iniciada 
								WHERE ip_maquina='$comp_ip_maq' && host_maquina='$comp_host_maq' ";

$ejecutar_consulta = $conexion->query($comp_sesion);

if($row_ses = $ejecutar_consulta->fetch_assoc()){

	$row_estado = $row_ses['estado'];
	$row_usuario_actual = $row_ses['usuario_actual'];

	if ($row_estado=='Activo') {

		$verificar_user = "SELECT * FROM usuarios WHERE usuario='$row_usuario_actual' ";
		$ejecutar_consulta = $conexion->query($verificar_user);
		$row_user = $ejecutar_consulta->fetch_assoc();

		$row_rango = $row_user['rango'];

		if ($row_rango == 'Administrador') {
			header("Location: http/Principal2/Admin2/administrador.php");
		}

		if ($row_rango == 'JefePresupuesto') {
			header("Location: http/Principal2/Jefepres2/jefepresupuesto.php");
		}
	}


}else{


?>


<!DOCTYPE html>
<html lang="es">
<head>
	<title>ACCESO PRINCIPAL</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../../img/icons/ESCUDO.jpg"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../css/util.css">
	<link rel="stylesheet" type="text/css" href="../../css/main.css">
<!--===============================================================================================-->

<style type="text/css">
	
	.btn-atras {
  
		justify-content: center;
		align-items: center;
		padding: 0 20px;
		min-width: 80px;
		height: 45px;
		background-color: #F408F9; 
		border-radius: 35px;
		
		font-family: Poppins-Regular;
		font-size: 21px;
		color: black;
	}

	.btn-atras:hover{

		background-color: #E92222;
		color : red;
	}

</style>

</head>
<body >

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(../../img/key-login-key-ring-6472650.jpg);">
					<span class="login100-form-title-1">

					</span>
				</div>

				<form class="login100-form validate-form" method="post" name="login" action="http/IniciarSesion/iniciar_sesion.php">
					<!-- <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required"> -->
					<div class="wrap-input100 validate-input m-b-26" data-validate="Se Requiere Usuario">
						<span class="label-input100">Usuario</span>
						<input class="input100" type="text" name="usuario" placeholder="Ingrese Usuario">
						<span class="focus-input100"></span>
					</div>

					<!-- <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required"> -->
					<div class="wrap-input100 validate-input m-b-18" data-validate = "Se Requiere Clave">
						<span class="label-input100">Contrase??a</span>
						<input class="input100" type="password" name="clave" placeholder="Ingrese Contrase??a">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div>
							<a href="#" class="txt1">
								Recuperar Contrase??a
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn2">
							Iniciar Sesion
						</button>
					</div>
				</form>

				
				<a href="../../">
					<button class="btn-atras">
						<img src="../../img/Principal.png" width="65" height="25" >
						<small><Atras></Atras></small>
					</button>
				</a>

			</div>
		</div>
	</div>

<!--===============================================================================================-->
	<script src="../../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../../vendor/bootstrap/js/popper.js"></script>
	<script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../../vendor/daterangepicker/moment.min.js"></script>
	<script src="../../vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../../vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../../js/main.js"></script>

</body>
</html>

<?php 

}

 ?>