<?php
// 
// echo "<script>window.open('../../../../../prueba.php', '_blank');</script>";
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

$mostrarTrasladoss = "SELECT * FROM traslados ";
$ejecutar_consulta6  = $conexion->query($mostrarTrasladoss);
$ejecutar_consulta7  = $conexion->query($mostrarTrasladoss);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Traslados-Informes</title>
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

    <script type="text/javascript">

    function listar_busqueda(){

        var parametros = {
            "plistar" : "buscar",
            "texto" : document.getElementById("texto").value,
        };


        $.ajax({
            data: parametros,
            url: "listar_busqueda_ajax.php",
            type: "post",
            beforeSend: function(){
                document.getElementById("mostrar_loading").style.display="block";
                document.getElementById("mostrar_loading").innerHTML="<img src='../../../../../img/loading.gif' width='150' heigth='150'>";
            },
            success: function(response){                                
                document.getElementById("mostrar_loading").style.display="none";
                document.getElementById("mostrar_busqueda").innerHTML=response;
            }

        });

    }   

    </script>

  </head>
  <body class="hold-transition skin-blue ">

    <div class="wrapper" >

      <header class="main-header">

        <!-- Logo -->
        <a href="" class="logo">
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>ADMINISTRADOR</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <img src="../../../../../img/logoConsejo.png" width="420" height="50">

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
      <aside class="main-sidebar" >
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Bienvenido <?php echo $row_usuario; ?></li>

            <li>
              <a href="admin.php">
                <i style="color: #1B8BE2;" class="fa fa-home"></i>
                <span style="color: #1B8BE2;">Home</span>
                <i></i>
              </a>  
            </li>

            <li class="treeview">
              <a href="#">
                <i style="color: #1B8BE2;" class="fa fa-laptop"></i>
                <span style="color: #1B8BE2;">Registrar</span>
                <i  style="color: #1B8BE2;"class="fa fa-user pull-right"></i>
              </a>
              <ul class="treeview-menu">
                
                <li>
                  <a href="">
                    <i class="fa fa-circle-o">
                    </i> Administradores
                      <ul class="treeview-menu">
                          
                          <li>
                            <a href="RegistrarNuevo.php?rango=Administrador">
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
                                          <a href="Modificar.php?ced=<?php echo $result['cedula']; ?>">
                                          <i class="fa fa-user pull-right"></i>
                                              <h5 style="color: white;"> <?php echo $result['usuario']; ?> </h5>
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
                                              <h5 style="color: white;"> <?php echo $result2['usuario']; ?> </h5>
                                          </a>
                                      </li>
                                  <?php

                                      }// fin del if ($result2['rango']=='Administrador')
                                    }// fin del while ($result2=mysqli_fetch_array($ejecutar_consulta))

                                 ?>
                                </ul>
                          </li>

                      </ul>
                  </a>
                </li>

                <li><a href=""><i class="fa fa-circle-o"></i> Jefe Presupesto
                  <ul class="treeview-menu">
                    <li>
                        <a href="RegistrarNuevo.php?rango=JefePresupuesto">
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
                                          <a href="Modificar.php?ced=<?php echo $result3['cedula']; ?>">
                                          <i class="fa fa-user pull-right"></i>
                                              <h5 style="color: white;"> <?php echo $result3['usuario']; ?> </h5>
                                          </a>
                                      </li>
                                  <?php

                                      }// fin del if ($result3['rango']=='Administrador')
                                    }// fin del while ($result3=mysqli_fetch_array($ejecutar_consulta))

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
                                              <h5 style="color: white;"> <?php echo $result4['usuario']; ?> </h5>
                                          </a>
                                      </li>
                                  <?php

                                      }// fin del if ($result5['rango']=='Administrador')
                                    }// fin del while ($result5=mysqli_fetch_array($ejecutar_consulta))

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
                <i style="color: #1B8BE2;" class="fa fa-folder"></i> <span style="color: #1B8BE2;">Acceso</span>
                <i style="color: #1B8BE2;" class="fa fa-lock pull-right"></i>
                <i style="color: #1B8BE2;" class="fa fa-unlock pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="#">
                    <i class="fa fa-user"></i> Usuarios
                  </a>
                   <ul class="treeview-menu">
                        <?php 
                            while ($result5=mysqli_fetch_array($ejecutar_consulta5)) {
                                     
                               if ($result5['rango']=='JefePresupuesto') {

                        ?>   
                          <li>
                              <a href="">
                                  <h5 style="color: black;"> 
                                  <img src="../../../../../img/114-user.png" width="18" height="18">
                                    <?php echo $result5['usuario']; ?> 
                                  </h5>
                              </a>
                              <ul class="treeview-menu">
                                  <li>
                                    <a href="NewUpdaRestDelt.php?opc=restringir&ced=<?php echo $result5['cedula']; ?>">
                                      <i class="fa fa-lock"></i> Restringir
                                    </a>
                                  </li>
                                  <li>
                                    <a href="NewUpdaRestDelt.php?opc=quitarest&ced=<?php echo $result5['cedula']; ?>">
                                      <i class="fa fa-unlock"></i> Anular Restrincion
                                    </a>
                                  </li>
                              </ul>
                          </li>
                        <?php

                                }// fin del if ($result5['rango']=='Directores')
                            }// fin del while ($result5=mysqli_fetch_array($ejecutar_consulta))

                        ?>
                    </ul>
                </li>
              </ul>
            </li>

            </li>
            <li>
              <a href="#">
                <i style="color: #1B8BE2;" class="fa fa-print"></i> <span style="color: #1B8BE2;">Traslados</span>
                <i style="color: #1B8BE2;" class="fa fa-angle-left pull-right"></i>
                
              </a>
                  <ul class="treeview-menu">

                      <li>
                          <a href="RegistrarTraslado.php">
                          <i class="fa"></i>
                            <img src="../../../../../img/icons/new.png">
                              <span> Crear</span>
                          </a>
                      </li>

                      

                      <li>
                          <a href="">
                          <i class="fa"></i>
                            <img src="../../../../../img/icons/delet.png">
                              <span> Borrar</span>
                          </a>

                          <ul class="treeview-menu">
                            <?php 
                                while ($result6=mysqli_fetch_array($ejecutar_consulta6)) {

                            ?> 
                              <li>
                                  <a href="NewUpdaRestDelt.php?opc=borrar_trasl&v1=<?php echo $result6['num_acuerdo']; ?>&v2=<?php echo $result6['anno']; ?>&v3=<?php echo $result6['mes']; ?>">
                                  <i class="fa fa-file pull-right"></i>
                                      <span><?php echo $result6['mes']." ".$result6['num_acuerdo']."/".$result6['anno']; ?></span>
                                  </a>
                              </li>
                            <?php 
                                }
                             ?>
                              
                          </ul>
                      </li>

                      <li>
                        <a href="">
                           <i class="fa"></i> 
                           <img src="../../../../../img/icons/upload.png"> Informacion Extras 
                            <ul class="treeview-menu">
                                
                                <li>
                                  <a href="Datos_Extras.php">
                                      <i class="fa fa-circle-o">
                                      </i> Codigo de Partidas
                                  </a>
                                </li>

                                <li>
                                  <a href="Datos_Extras2.php">
                                     <i class="fa fa-circle-o">
                                     </i> Datos Para los Tralados
                                  </a>
                                </li>

                            </ul>
                          </a>
                      </li>

                  </ul>
                </li>
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

        <div action="#" method="get" class="sidebar-form" style="background-color: #1B8BE2; border-radius:45px; padding: 7px 12px; margin: 5px;">
        <center>
          <div class="input-group">
            <input type="text" name="texto" id="texto" class="form-control" placeholder="Buscar... 13/1991 ó todos" style="border-radius:10px; color: black;">
            <span class="input-group-btn">
              <button type="submit" name="buscar" id="search-btn" class="btn btn-flat" onclick="listar_busqueda();" style="border-radius:10px;"><i class="fa fa-search"></i></button>
            </span>
          </div> Traslados</center>
        </div>

          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Sistema de Traslados e Informes</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                    <!-- <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">
                              <!--Contenido-->
                                
                                <div id="mostrar_loading" style="display:none;"></div>
                                <br>

                                <div id='mostrar_busqueda'></div>
                              <!--Fin Contenido-->
                           </div>
                        </div>

                      </div>
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
          

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      

      <footer class="main-footer">
        <strong> Consejo Municipal Socialista De Caroni</strong>
      </footer>


    <!-- jQuery 2.1.4 -->
    <script src="../../../../../js/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../../../../js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../../../js/app.min.js"></script>

  </body>
</html>

<?php

}
else{
  $conexion->close();
  header("Location: ../../../");
}

?>
