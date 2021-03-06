<?php
require("../../ConexionBD/conexion.php");

$estado="Activo";
$verificar_sesion = "SELECT * FROM sesion_iniciada WHERE estado='$estado' ";
$ejecutar_consulta = $conexion->query($verificar_sesion);
$existe_logeo = $ejecutar_consulta->fetch_assoc();

if ($existe_logeo['estado']!=null) {


//generando la seleccion de los datos de un administrador
  $datos_user = "SELECT pers.nombres, pers.apellidos, pers.sexo, pers.email, ses_usu.usuario FROM personal AS pers JOIN
                      (SELECT usu.usuario, usu.cedula FROM  sesion_iniciada AS se_i JOIN usuarios AS usu
                          ON (se_i.usuario_actual = usu.usuario AND se_i.estado='$estado')) AS ses_usu
                    ON (pers.cedula = ses_usu.cedula)
";
  $ejecutar_consulta = $conexion->query($datos_user);

  $row = $ejecutar_consulta->fetch_assoc();
  $row_nombres = $row['nombres'];
  $row_apellidos = $row['apellidos'];
  $row_sexo = $row['sexo'];
  $row_email = $row['email'];
  $row_usuario = $row['usuario'];


$mostrarUsuarios = "SELECT * FROM usuarios ";
$ejecutar_consulta  = $conexion->query($mostrarUsuarios);
$ejecutar_consulta1 = $conexion->query($mostrarUsuarios);
$ejecutar_consulta2 = $conexion->query($mostrarUsuarios);
$ejecutar_consulta3 = $conexion->query($mostrarUsuarios);
$ejecutar_consulta4 = $conexion->query($mostrarUsuarios);
$ejecutar_consulta5 = $conexion->query($mostrarUsuarios);

$mostrarPartidas = "SELECT * FROM presupuesto_partida order by dig_mes, cod_part, cod_gen, cod_esp, cod_sub";
$ejecutar_consulta6 = $conexion->query($mostrarPartidas);
$ejecutar_consulta7 = $conexion->query($mostrarPartidas);

$mostrarReporte = "SELECT * FROM reportes ";
$ejecutar_consulta8 = $conexion->query($mostrarReporte);
$ejecutar_consulta9 = $conexion->query($mostrarReporte);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Partidas Presupuestarias</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../../../../../css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../../../../css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../../../css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../../../../css/_all-skins.min.css">
    <link rel="apple-touch-icon" href="../../../../../img/apple-touch-icon.png">
    <link rel="shortcut icon" href="../../../../../img/icons/EscudoAlsobocaroni.ico">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript">

    function listar_tabla(){

        var parametros = {
            "plistar" : "listado",
            "texto" : document.getElementById("texto").value,
        };


        $.ajax({
            data: parametros,
            url: "listar_ajax.php",
            type: "post",
            beforeSend: function(){
                document.getElementById("mostrar_loading").style.display="block";
                document.getElementById("mostrar_loading").innerHTML="<img src='../../../../../img/loading.gif' width='150' heigth='150'>";
            },
            success: function(response){                                
                document.getElementById("mostrar_loading").style.display="none";
                document.getElementById("mostrar_tabla").innerHTML=response;
            }

        });

    }

    function listar_reportes(){

        var parametros = {
            "plistar" : "listado",
            "texto" : document.getElementById("texto1").value,
        };


        $.ajax({
            data: parametros,
            url: "listar_reporte.php",
            type: "post",
            beforeSend: function(){
                document.getElementById("mostrar_loading").style.display="block";
                document.getElementById("mostrar_loading").innerHTML="<img src='../../../../../img/loading.gif' width='150' heigth='150'>";
            },
            success: function(response){                                
                document.getElementById("mostrar_loading").style.display="none";
                document.getElementById("mostrar_tabla").innerHTML=response;
            }

        });

    }

    

    </script>

  </head>
  <body class="hold-transition skin-red ">
    <div class="wrapper">

      <header class="main-header bg-red"  >

        <!-- Logo -->
        <a href="" class="logo">
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>ADMINISTRADOR</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegaci??n</span>
          </a>
          

          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  
                  <small class="bg-green"></small>
                  <?php if ( $row_sexo == "Masculino" ){ ?>
                    <img src="../../../../../img/avatar5.png" class="img-circle" width="25" height="25">
                  <?php }else if( $row_sexo == "Femenino" ){ ?>
                     <img src="../../../../../img/avatar3.png" class="img-circle" width="25" height="25">
                  <?php } ?>

                  <span class="hidden-xs"><small class="bg-green"><?php echo $row_usuario; ?></small></span>

                  <br><span class="hidden-xs"><?php echo $row_nombres."  ".$row_apellidos; ?></span>
                </a>
                <ul class="dropdown-menu">
                  
                  <!-- User image -->
                  <li class="user-header">

                    <p>

                      <?php if ( $row_sexo == "Masculino" ){ ?>
                        <img src="../../../../../img/avatar5.png" class="img-circle" width="100" height="100">
                      <?php }else if( $row_sexo == "Femenino" ){ ?>
                         <img src="../../../../../img/avatar3.png" class="img-circle" width="100" height="100">
                      <?php } ?>

                      <small><?php echo $row_email; ?></small>
                    
                    </p>
                  </li>

                  <!-- Menu Footer-->
                  <li class="user-footer">

                    <div class="pull-right">
                      <a href="salir.php" class="btn btn-default btn-flat bg-red">
                        Cerrar
                      </a>
                    </div>
                  </li>
                </ul>
              </li>

            </ul>
          </div>

        </nav>
      </header>

      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar" style="background-color: #E1E8E4;">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" >
            <li class="header"></li>

            <li class="treeview">
              <a href="#">
                <i style="color: red;" class="fa fa-user"></i>
                <span style="color: red;">Registrar</span>
                <i style="color: red;" class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                
                <li>
                  <a href="">
                    <i class="fa fa-circle-o">
                    </i> Administradores
                      <ul class="treeview-menu">
                          
                          <li>
                            <a href="RegistrarNuevo2.php?rango=Administrador">
                                <img src="../../../../../img/icons/new.png"> Nuevo
                            </a>
                          </li>
                          
                          <li>
                            <a href="">
                                <img src="../../../../../img/icons/upload.png"> Modificar
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                                <ul class="treeview-menu">
                                  <?php 
                                    while ($result=mysqli_fetch_array($ejecutar_consulta)) {

                                      if ($result['rango']=='Administrador') {
                                      
                                  ?>   
                                      <li>
                                          <a href="Modificar2.php?ced=<?php echo $result['cedula']; ?>">
                                              <i class="fa fa-user pull-right"></i>
                                              <h5 style="color: #DD5B5B;"> <?php echo $result['usuario']; ?> </h5>
                                          </a>
                                      </li>
                                  <?php

                                      }// fin del if ($result['rango']=='Administrador')
                                    }// fin del while ($result=mysqli_fetch_array($ejecutar_consulta))

                                  ?>
                                </ul>
                          </li>

                          <li>
                            <a href="">
                                <img src="../../../../../img/icons/delet.png"> Borrar
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                              <ul class="treeview-menu">
                                  <?php 
                                    while ($result2=mysqli_fetch_array($ejecutar_consulta2)) {
                                     
                                       if ($result2['rango']=='Administrador') {

                                  ?>   
                                      <li>
                                          <a href="NewUpdaRestDelt.php?opc=borrar&ced=<?php echo $result2['cedula']; ?>">
                                              <i class="fa fa-user pull-right"></i>
                                              <h5 style="color: #DD5B5B;"> <?php echo $result2['usuario']; ?> </h5>
                                          </a>
                                      </li>
                                  <?php

                                      }// fin del if ($result2['rango']=='Administrador')
                                    }// fin del while ($result2=mysqli_fetch_array($ejecutar_consulta2))

                                 ?>
                                </ul>
                          </li>

                      </ul>
                  </a>
                </li>

                <li><a href=""><i class="fa fa-circle-o"></i> Jefe Presupuesto
                  <ul class="treeview-menu">
                    <li>
                        <a href="RegistrarNuevo2.php?rango=JefePresupuesto">
                          <img src="../../../../../img/icons/new.png"> Nuevo
                        </a>
                    </li>

                     <li>
                            <a href="">
                                <img src="../../../../../img/icons/upload.png"> Modificar
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                                <ul class="treeview-menu">
                                  <?php 
                                    while ($result3=mysqli_fetch_array($ejecutar_consulta3)) {

                                      if ($result3['rango']=='JefePresupuesto') {
                                      
                                  ?>   
                                      <li>
                                          <a href="Modificar2.php?ced=<?php echo $result3['cedula']; ?>">
                                          <i class="fa fa-user pull-right"></i>
                                              <h5 style="color: #DD5B5B;"> <?php echo $result3['usuario']; ?> </h5>
                                          </a>
                                      </li>
                                  <?php

                                      }// fin del if ($result3['rango']=='Administrador')
                                    }// fin del while ($result3=mysqli_fetch_array($ejecutar_consulta3))

                                  ?>
                                </ul>
                          </li>

                          <li>
                            <a href="">
                                <img src="../../../../../img/icons/delet.png"> Borrar
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                              <ul class="treeview-menu">
                                  <?php 
                                    while ($result4=mysqli_fetch_array($ejecutar_consulta4)) {
                                     
                                       if ($result4['rango']=='JefePresupuesto') {

                                  ?>   
                                      <li>
                                          <a href="NewUpdaRestDelt.php?opc=borrar&ced=<?php echo $result4['cedula']; ?>">
                                          <i class="fa fa-user pull-right"></i>
                                              <h5 style="color: #DD5B5B;"> <?php echo $result4['usuario']; ?> </h5>
                                          </a>
                                      </li>
                                  <?php

                                      }// fin del if ($result4['rango']=='Administrador')
                                    }// fin del while ($result4=mysqli_fetch_array($ejecutar_consulta4))

                                  ?>
                                </ul>
                          </li>

                  </ul>
                </a>
                </li>
               
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i style="color: red;" class="fa fa-lock"></i> <span style="color: red;">Acceso</span>
                <i style="color: red;" class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="#">
                    <i class="fa fa-user"></i> Usuarios
                    <i class="fa fa-plus pull-right"></i>
                  </a>
                   <ul class="treeview-menu">
                        <?php 
                            while ($result5=mysqli_fetch_array($ejecutar_consulta5)) {
                                     
                               if ($result5['rango']=='JefePresupuesto') {

                        ?>   
                          <li>
                              <a href="">
                                  <h5 style="color: #DD5B5B;"> <?php echo $result5['usuario']; ?> </h5>
                              </a>
                              <ul class="treeview-menu">
                                  <li>
                                    <a href="NewUpdaRestDelt.php?opc=restringir&ced=<?php echo $result5['cedula']; ?>">
                                      <img src="../../../../../img/icons/block.png"> Restringir
                                    </a>
                                  </li>
                                  <li>
                                    <a href="NewUpdaRestDelt.php?opc=quitarest&ced=<?php echo $result5['cedula']; ?>">
                                      <img src="../../../../../img/icons/quitarRest.png"> Anular Restrincion
                                    </a>
                                  </li>
                              </ul>
                          </li>
                        <?php

                                }// fin del if ($result5['rango']=='Directores')
                            }// fin del while ($result5=mysqli_fetch_array($ejecutar_consulta5))

                        ?>
                    </ul>

                </li>
              </ul>
            </li>

             <li class="treeview">
              <a href="#">
                <i style="color: red;" class="fa fa-folder"></i> <span style="color: red;">Partidas</span>
                <i style="color: red;" class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="CrearPartida.php">
                      <img src="../../../../../img/icons/new.png"> Agregar
                  </a>
                </li>

                <li>
                  <a href="">
                      <img src="../../../../../img/icons/upload.png"> Modificar
                  </a>
                  <ul class="treeview-menu">
                    <?php 
                      while ($result6=mysqli_fetch_array($ejecutar_consulta6)) {
                        
                    ?>   
                        <li>
                            <a href="ModifPartida.php?codigo=<?php echo $result6['item']; ?>">
                                <i class="fa fa-file-o pull-right"></i>
                                <h5 style="color: white;"> 
                                  <?php echo "4.".$result6["cod_part"]."-".$result6["cod_gen"]."-".$result6["cod_esp"]."-".$result6["cod_sub"]." / ".$result6["mes"]; ?> 
                                </h5>
                            </a>
                        </li>
                    <?php

                      }// fin del while ($result6=mysqli_fetch_array($ejecutar_consulta6))

                    ?>
                  </ul>
                </li>

                <li>
                  <a href="">
                      <img src="../../../../../img/icons/delet.png"> Eliminar
                  </a>
                  <ul class="treeview-menu">
                    <?php 
                      while ($result7=mysqli_fetch_array($ejecutar_consulta7)) {
                        
                    ?>   
                        <li>
                            <a href="NewUpdaRestDelt.php?opc=partidaborrar&codigo=<?php echo $result7['item']; ?>">
                                <i class="fa fa-user pull-right"></i>
                                <h5 style="color: white;"> 
                                <?php echo $result7["cod_part"]."-".$result7["cod_gen"]."-".$result7["cod_esp"]."-".$result7["cod_sub"]; ?>
                                </h5>
                            </a>
                        </li>
                    <?php

                      }// fin del while ($result7=mysqli_fetch_array($ejecutar_consulta7))

                    ?>
                  </ul>
                </li>

              </ul>
            </li>

             <li class="treeview">
              <a href="#">
                <i style="color: red;" class="fa fa-folder"></i> <span style="color: red;">Reportes</span>
                <i style="color: red;" class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="">
                      <img src="../../../../../img/icons/new.png"> Agregar
                      <ul class="treeview-menu">
                        <li class="treeview">
                          <a href="CrearReporte.php">
                            <i class="fa fa fa-folder-open pull-right"></i> <span>Reportes Nuevo</span>
                          </a>
                        </li>
                      </ul>
                  </a>
                </li>

                <li>
                  <a href="">
                      <img src="../../../../../img/icons/delet.png"> Borrar
                  </a>
                  <ul class="treeview-menu">
                    <?php 
                      while ($result8=mysqli_fetch_array($ejecutar_consulta8)) {
                        
                    ?>   
                        <li>
                            <a href="NewUpdaRestDelt.php?opc=traslBorrar&v1=<?php echo $result8['anno']; ?>&v2=<?php echo $result8['mes']; ?>">
                                <i class="fa fa-user pull-right"></i>
                                <h5 style="color: white;"> 
                                <?php echo $result8["anno"]." / ".$result8["mes"]; ?>
                                </h5>
                            </a>
                        </li>
                    <?php

                      }// fin del while ($result8=mysqli_fetch_array($ejecutar_consulta8))

                    ?>
                  </ul>
                </li>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>





       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">

        <div class="sidebar-form" style="background-color:#C54444; border-radius:5px; padding: 7px 15px; margin: 5px; ">
          <div class="input-group">
            <input type="text" name="texto" id="texto" class="form-control" placeholder="Por A??o ?? Todas las Partidas " style="border-radius:6px;">
            <span class="input-group-btn">
              <button type="submit" name="buscar" id="search-btn" class="btn btn-flat" onclick="listar_tabla();administrador.php"><i class="fa fa-search"></i></button>
            </span>
          </div>
          PARTIDAS
        </div>

        <div class="sidebar-form" style="background-color:#C54444; border-radius:5px; padding: 7px 15px; margin: 5px; ">
          <div class="input-group">
            <input type="text" name="texto1" id="texto1" class="form-control" placeholder="Todos los Reportes " style="border-radius:6px;">
            <span class="input-group-btn">
              <button type="submit" name="buscar" id="search-btn" class="btn btn-flat" onclick="listar_reportes();"><i class="fa fa-search"></i></button>
            </span>
          </div>
          REPORTES
        </div>

          <div id="mostrar_loading" style="display:none;"></div>
          <br>

          <div id="mostrar_tabla"></div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      

      <footer class="main-footer" style="background-color: #E04D4D;">
        <img src="../../../../../img/logoConsejo.png" width="330" height="40">
      </footer>


    <!-- jQuery 2.1.4 -->
    <script src="../../../../../js/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../../../../js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../../../js/app.min.js"></script>
    <script src="../../../../../js/jquery.min.js"></script>

  </body>
</html>

<?php

}
else{
  $conexion->close();
  header("Location: ../../../");
}

?>
