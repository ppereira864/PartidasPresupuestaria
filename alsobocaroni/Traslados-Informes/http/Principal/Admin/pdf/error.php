<?php

require("../../../ConexionBD/conexion.php");
require_once('../../../../../../lib/pdf/mpdf.php');

$num_acuerdo  = $_GET['v1'];
$anno = $_GET['v2'];

$estraer_datos = "SELECT * FROM traslados WHERE num_acuerdo=$num_acuerdo AND anno=$anno";

$ejecutar_consulta = $conexion->query($estraer_datos);

$row = $ejecutar_consulta->fetch_assoc();

$num_acuerdo     = $row['num_acuerdo']; 
$anno            = $row['anno']; 
$considerando_1  = $row['considerando_1'];
$considerando_2  = $row['considerando_2'];
$considerando_3  = $row['considerando_3'];
$considerando_4  = $row['considerando_4'];
$considerando_5  = $row['considerando_5'];
$considerando_6  = $row['considerando_6'];
$considerando_7  = $row['considerando_7'];
$articulo_1      = $row['articulo_1'];
$articulo_2      = $row['articulo_2'];
$articulo_3      = $row['articulo_3'];
$articulo_4      = $row['articulo_4'];
$parrafo_inic    = $row['parrafo_inic'];
$parrafo_fin     = $row['parrafo_fin'];

$estraer_calculos_pct = "SELECT * FROM calculos_pct WHERE trs_num_acuerdo=$num_acuerdo AND trs_anno=$anno";
$ejecutar_consulta1 = $conexion->query($estraer_calculos_pct);

$estraer_calculos_prt = "SELECT * FROM calculos_prt WHERE trs_num_acuerdo=$num_acuerdo AND trs_anno=$anno";
$ejecutar_consulta2 = $conexion->query($estraer_calculos_prt);


$html='
        <div id ="logo">
          <img src="../../../../../../img/Imagen1.png">
        </div>

        <div id="membrete">
          <b>REPUBLICA BOLIVARIANA DE VENEZUELA</b><br>
          <b>ESTADO BOLIVAR</b><br>
          <b>MUNICIPIO CARONI</b><br>
          <b>207º, 158º, 18º</b><br>
        </div>

        <br>
        <div id="parafo">
          <b>ACUERDO Nº '.$num_acuerdo .'/'.$anno.'</b><br><br>
          <b>'.$parrafo_inic.'.</b>
        </div>

        <br>
        <div id="titulo">
          <b>CONSIDERANDO</b>
        </div>

        <br>
        <div id="parafo">
          '.$considerando_1.'.
        </div>

        <br>
        <div id="titulo">
          <b>CONSIDERANDO</b>
        </div>

        <br>
        <div id="parafo">
          '.$considerando_2.'.
        </div>

        <br>
        <div id="titulo">
          <b>CONSIDERANDO</b>
        </div>

        <br>
        <div id="parafo">
          '.$considerando_3.'.
        </div>
        
        <br>
        <div id="titulo">
          <b>CONSIDERANDO</b>
        </div>

        <br>
        <div id="parafo">
          '.$considerando_4.'.
        </div>

        <br>
        <div id="titulo">
          <b>CONSIDERANDO</b>
        </div>

        <br>
        <div id="parafo">
          '.$considerando_5.'.
        </div><br><br><br><br><br><br><br><br><br>

          <div id ="logo">
            <img src="../../../../../../img/Imagen1.png">
          </div>

        <br>
        <div id="titulo">
          <b>CONSIDERANDO</b>
        </div>

        <br>
        <div id="parafo">
          '.$considerando_6.'.
        </div>

        <br>
        <div id="titulo">
          <b>CONSIDERANDO</b>
        </div>

        <br>
        <div id="parafo">
          '.$considerando_7.'.
        </div>

        <br>
        <div id="titulo">
          <b>ACUERDA</b>
        </div>

        <br>
        <div id="parafo">
          <b>ARTICULO PRIMERO: </b>'.$articulo_1.'.
        </div>
        
        <br>
        <div id="parafo">
          <b>ARTICULO SEGUNDO: </b>'.$articulo_2.'.
        </div>

        <br>
        <div id="parafo">
          <b>PARTIDAS CEDENTES:</b><br>
        </div>
        
        <div id="tabla">
          <table border="1">

            <tr>
              <td><b>CODIGO</b></td>
              <td><b>DESCRIPCION</b></td>
              <td><b>MONTO BS.</b></td>
            </tr>';
            
            while ($result=mysqli_fetch_array($ejecutar_consulta1)){

  $html .='<tr>
              <td>'.$result['cod_pct'].'</td>
              <td>'.$result['descripcion'].'</td>
              <td>'.$result['monto'].'</td>
            </tr>';

            }
            
  $html .='<tr>
            <td></td>
            <td>Total</td>
            <td>24.950.000,00</td>
            </tr>

          </table>
        </div>

        <br>
        <div id="parafo">
          <b>PARTIDAS RECEPTORAS:</b>
        </div>
        
        <div id="tabla">
          <table border="1">
            
            <tr>
              <td>
                <b>CODIGO</b>
              </td>
              
              <td>
                <b>DESCRIPCION</b>
              </td>
              
              <td>
                <b>MONTO BS.</b>
              </td>
            </tr>

            <tr>
              <td>
                01-01-00-00-51-4-01-05-13-00
              </td>
              <td>
                Aguinaldos a Altos  funcionarios y  Funcionaria del Poder Público y  Elección
              </td>
            
              <td>
                17.000.000,00
              </td>
            </tr>
            
            <tr>
              
              <td>
                01-01-00-00-51-4-01-05-04-00
              </td>
              
              <td>
                Aguinaldos a Obreros 
              </td>
              
              <td>
                7.950.000,00
              </td>
            </tr>
            
            <tr>
            <td></td>
            <td>Total</td>
            <td>24.950.000,00</td>
            </tr>
          </table>
        </div><br><br><br><br><br><br><br><br>

          <div id ="logo">
            <img src="../../../../../../img/Imagen1.png">
          </div>

        <br>
        <div id="parafo">
          <b>ARTICULO TERCERO: </b>'.$articulo_3.'.
        </div>

        <br>
        <div id="parafo">
          <b>ARTICULO CUARTO: </b>'.$articulo_4.'.
        </div>
        
        <br>
        <div id="parafo">
          <b>'.$parrafo_fin.'.</b><br><br>Publíquese y Cúmplase. 
        </div>

        <div id="tabla">
          <table border="1">
            <tr>
              <td>
                <b>
                  CONCEJAL PEDRO MATA PIREZ PRESIDENTE
                </b><br><br><br></b><br><br><br>
              </td>
              <td>
                <b><br><br><br></b><br><br><br>
                  YSENIA ORTEGA ALCALA SECRETARIA MUNICIPAL (E)
                </b>
              </td>
            </tr>
          </table>
        </div>
      
      ';

$mpdf = new mPDF('ut-8', 'A4');
$css = file_get_contents('../../../../../../css/styles.css');
$mpdf->writeHTML($css, 1);
$mpdf->SetHTMLFooter('<div id ="piedpagina"><img src="../../../../../../img/Imagen2.png"></div>');
$mpdf->writeHTML($html);
$mpdf->output('reporte.pdf','I');

?>












<?php

 require("../../../ConexionBD/conexion.php");
 require_once('../../../../../../lib/pdf/mpdf.php');



 $num_acuerdo  = $_GET['v1'];
 $anno = $_GET['v2'];

 $estraer_datos = "SELECT * FROM traslados WHERE num_acuerdo=$num_acuerdo AND anno=$anno";

 $ejecutar_consulta = $conexion->query($estraer_datos);

 $row = $ejecutar_consulta->fetch_assoc();

 $num_acuerdo     = $row['num_acuerdo']; 
 $anno            = $row['anno']; 
 $considerando_1  = $row['considerando_1'];
 $considerando_2  = $row['considerando_2'];
 $considerando_3  = $row['considerando_3'];
 $considerando_4  = $row['considerando_4'];
 $considerando_5  = $row['considerando_5'];
 $considerando_6  = $row['considerando_6'];
 $considerando_7  = $row['considerando_7'];
 $articulo_1      = $row['articulo_1'];
 $articulo_2      = $row['articulo_2'];
 $articulo_3      = $row['articulo_3'];
 $articulo_4      = $row['articulo_4'];
 $parrafo_inic    = $row['parrafo_inic'];
 $parrafo_fin     = $row['parrafo_fin'];





 $estraer_calculos_pct = "SELECT * FROM calculos_pct WHERE trs_num_acuerdo=$num_acuerdo AND trs_anno=$anno";
 $ejecutar_consulta1 = $conexion->query($estraer_calculos_pct);

  $row = $ejecutar_consulta1->fetch_assoc();

  $cod_pct = $row['cod_pct'];
  $descripcion = $row['descripcion'];
  $monto = $row['monto'];
  $suma_pct = $monto;








 $estraer_calculos_prt = "SELECT * FROM calculos_prt WHERE trs_num_acuerdo=$num_acuerdo AND trs_anno=$anno";
 $ejecutar_consulta2 = $conexion->query($estraer_calculos_prt);

  $row = $ejecutar_consulta2->fetch_assoc();
  $i = 0;

   while ($row=mysqli_fetch_array($ejecutar_consulta2)) {
    if ( $i == 0){
      $cod_pct1 = $row['cod_pct'];
      $descripcion1 = $row['descripcion'];
      $monto1 = $row['monto'];
    }

    if ( $i == 1){
      $cod_pct2 = $row['cod_pct'];
      $descripcion2 = $row['descripcion'];
      $monto2 = $row['monto'];
    }

    if ( $i == 2){
      $cod_pct3 = $row['cod_pct'];
      $descripcion3 = $row['descripcion'];
      $monto3 = $row['monto'];
    }

    if ( $i == 3){
      $cod_pct4 = $row['cod_pct'];
      $descripcion4 = $row['descripcion'];
      $monto4 = $row['monto'];
    }

    $i = $i + 1;
  }

  $suma_prt = $monto1 + $monto2 + $monto3 + $monto4;






 $html='
         <div id ="logo">
           <img src="../../../../../../img/Imagen1.png">
         </div>

         <div id="membrete">
           <b>REPUBLICA BOLIVARIANA DE VENEZUELA</b><br>
           <b>ESTADO BOLIVAR</b><br>
           <b>MUNICIPIO CARONI</b><br>
           <b>207º, 158º, 18º</b><br>
         </div>

         <br>
         <div id="parafo">
           <b>ACUERDO Nº '.$num_acuerdo .'/'.$anno.'</b><br><br>
           <b>'.$parrafo_inic.'.</b>
         </div>

         <br>
         <div id="titulo">
           <b>CONSIDERANDO</b>
         </div>

         <br>
         <div id="parafo">
           '.$considerando_1.'.
         </div>

         <br>
         <div id="titulo">
           <b>CONSIDERANDO</b>
         </div>

         <br>
         <div id="parafo">
           '.$considerando_2.'.
         </div>

         <br>
         <div id="titulo">
           <b>CONSIDERANDO</b>
         </div>

         <br>
         <div id="parafo">
           '.$considerando_3.'.
         </div>
         
         <br>
         <div id="titulo">
           <b>CONSIDERANDO</b>
         </div>

         <br>
         <div id="parafo">
           '.$considerando_4.'.
         </div>

         <br>
         <div id="titulo">
           <b>CONSIDERANDO</b>
         </div>

         <br>
         <div id="parafo">
           '.$considerando_5.'.
         </div><br><br><br><br><br><br><br><br><br>

           <div id ="logo">
             <img src="../../../../../../img/Imagen1.png">
           </div>

         <br>
         <div id="titulo">
           <b>CONSIDERANDO</b>
         </div>

         <br>
         <div id="parafo">
           '.$considerando_6.'.
         </div>

         <br>
         <div id="titulo">
           <b>CONSIDERANDO</b>
         </div>

         <br>
         <div id="parafo">
           '.$considerando_7.'.
         </div>

         <br>
         <div id="titulo">
           <b>ACUERDA</b>
         </div>

         <br>
         <div id="parafo">
           <b>ARTICULO PRIMERO: </b>'.$articulo_1.'.
         </div>
         
         <br>
         <div id="parafo">
           <b>ARTICULO SEGUNDO: </b>'.$articulo_2.'.
         </div>

         <br>
         <div id="parafo">
           <b>PARTIDAS CEDENTES:</b><br>
         </div>
         
         <div id="tabla">
           <table border="1">

             <tr>
               <td><b>CODIGO</b></td>
               <td><b>DESCRIPCION</b></td>
               <td><b>MONTO BS.</b></td>
             </tr>

             <tr>
               <td>'.$cod_pct1.'</td>
               <td>'.$descripcion1.'</td>
               <td>'.$monto1.'</td>
             </tr>

             <tr>
               <td>'.$cod_pct2.'</td>
               <td>'.$descripcion2.'</td>
               <td>'.$monto2.'</td>
             </tr>

             <tr>
               <td>'.$cod_pct3.'</td>
               <td>'.$descripcion3.'</td>
               <td>'.$monto3.'</td>
             </tr>

             <tr>
               <td>'.$cod_pct4.'</td>
               <td>'.$descripcion4.'</td>
               <td>'.$monto4.'</td>
             </tr>

             <tr>
             <td></td>
             <td>Total</td>
             <td>'.$suma_prt.'</td>
             </tr>

           </table>
         </div>

         <br>
         <div id="parafo">
           <b>PARTIDAS RECEPTORAS:</b>
         </div>
         
         <div id="tabla">
           <table border="1">
             
             <tr>
              <td><b>CODIGO</b></td>
               <td><b>DESCRIPCION</b></td>
               <td><b>MONTO BS.</b></td>
             </tr>

             <tr>
               <td>'.$cod_pct.'</td>
               <td>'.$descripcion.'</td>
               <td>'.$monto.'</td>
             </tr>

             <tr>
             <td></td>
             <td>Total</td>
             <td>'.$suma_pct.'</td>
             </tr>

           </table>
         </div><br><br><br><br><br><br><br><br>

           <div id ="logo">
             <img src="../../../../../../img/Imagen1.png">
           </div>

         <br>
         <div id="parafo">
           <b>ARTICULO TERCERO: </b>'.$articulo_3.'.
         </div>

         <br>
         <div id="parafo">
           <b>ARTICULO CUARTO: </b>'.$articulo_4.'.
         </div>
         
         <br>
         <div id="parafo">
           <b>'.$parrafo_fin.'.</b><br><br>Publíquese y Cúmplase. 
         </div>

         <div id="tabla">
           <table border="1">
             <tr>
               <td>
                 <b>
                   CONCEJAL PEDRO MATA PIREZ PRESIDENTE
                 </b><br><br><br></b><br><br><br>
               </td>
               <td>
                 <b><br><br><br></b><br><br><br>
                   YSENIA ORTEGA ALCALA SECRETARIA MUNICIPAL (E)
                 </b>
               </td>
             </tr>
           </table>
         </div>
       
       ';

 $mpdf = new mPDF('P', 'A4', 'fr', 'UTF-8');
 $css = file_get_contents('../../../../../../css/styles.css');
 $mpdf->writeHTML($css, 1);
 $mpdf->SetHTMLFooter('<div id ="piedpagina"><img src="../../../../../../img/Imagen2.png"></div>');
 $mpdf->writeHTML($html);
 $mpdf->output('reporte.pdf','I');

 ?>


?>