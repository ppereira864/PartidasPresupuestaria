<?php

 require("../../../ConexionBD/conexion.php");
 require_once('../../../../../../lib/pdf/mpdf.php');


 $num_acuerdo   = $_GET['v1'];
 $anno          = $_GET['v2'];
 $mes          = $_GET['v3'];
 
 $estraer_datos = "SELECT * FROM traslados WHERE num_acuerdo='$num_acuerdo' AND anno='$anno' AND mes='$mes'";

 $ejecutar_consulta = $conexion->query($estraer_datos);

 

 if ( $row = $ejecutar_consulta->fetch_assoc() ) {
  
 $nombrePDF ="traslados ".$num_acuerdo."/".$anno.".pdf";

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


  $estraer_calculos_pct = "SELECT * FROM calculos_pct WHERE trs_num_acuerdo='$num_acuerdo' AND trs_anno='$anno' AND mes='$mes'";
  $ejecutar_consulta1 = $conexion->query($estraer_calculos_pct);

  $suma_pct = 0 ;


  $estraer_calculos_prt = "SELECT * FROM calculos_prt WHERE trs_num_acuerdo='$num_acuerdo' AND trs_anno='$anno' AND mes='$mes'";
  $ejecutar_consulta2 = $conexion->query($estraer_calculos_prt);
  
  $suma_prt =0;



 $html='
         
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
         </div><br>

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
           <table border=1 cellspacing=0 cellpadding=3 bordercolor=666633 style="width: 100%;">

             <tr>
               <td><b>CODIGO</b></td>
               <td><b>DESCRIPCION</b></td>
               <td><b>MONTO BS.</b></td>
             </tr>';

while ($row=mysqli_fetch_array($ejecutar_consulta1)) {
    $html .='<tr>
               <td>01-01-00-00-51-4-'.$row['cod_part'].'-'.$row['cod_gen'].'-'.$row['cod_esp'].'-'.$row['cod_sub'].'</td>
               <td>'.$row['descripcion'].'</td>
               <td>'.$row['monto'].'</td>
             </tr>';
    $suma_pct = $suma_pct + $row['monto'];
}
    $html .='<tr>
             <td></td>
             <td>Total</td>
             <td>'.$suma_pct.'</td>
             </tr>

           </table>
         </div>

         <br>
         <div id="parafo">
           <b>PARTIDAS RECEPTORAS:</b>
         </div>
         
         <div id="tabla">
           <table border="1" cellspacing="0" cellpadding="3" bordercolor="666633" style="width: 100%;">
             
             <tr>
              <td><b>CODIGO</b></td>
               <td><b>DESCRIPCION</b></td>
               <td><b>MONTO BS.</b></td>
             </tr>';
             
while ($row=mysqli_fetch_array($ejecutar_consulta2)) {
    $html .='<tr>
              <td>01-01-00-00-51-4-'.$row['cod_part'].'-'.$row['cod_gen'].'-'.$row['cod_esp'].'-'.$row['cod_sub'].'</td>
               <td>'.$row['descripcion'].'</td>
               <td>'.$row['monto'].'</td>
             </tr>';
    $suma_prt = $suma_prt + $row['monto'];
}
    $html .='<tr>
             <td></td>
             <td>Total</td>
             <td>'.$suma_prt.'</td>
             </tr>

           </table>
         </div><br>

         <div id="parafo">
           <b>ARTICULO TERCERO: </b>'.$articulo_3.'.
         </div>

         <br>
         <div id="parafo">
           <b>ARTICULO CUARTO: </b>'.$articulo_4.'.
         </div><br>
         
         
         <div id="parafo">
           <b>'.$parrafo_fin.'.</b>
         </div><br><br>

         <div id="tabla">
         Publíquese y Cúmplase. 
           <table border="1" cellspacing="0" cellpadding="3" bordercolor="666633" style="width: 100%;">
             <tr>
               <td style="text-align: center;">
                 <b>
                   CONCEJAL PEDRO MATA PIREZ <br> PRESIDENTE
                 </b><br><br><br><br><br><br><br>
               </td>
               <td style="text-align: center;">
                 <b><br><br><br><br><br><br><br>
                   YSENIA ORTEGA ALCALA <br> SECRETARIA MUNICIPAL (E)
                 </b>
               </td>
             </tr>
           </table>
         </div>
       
       ';

 $mpdf = new mPDF('c', 'A4');

 $css = file_get_contents('../../../../../../css/styles.css');
 $mpdf->writeHTML($css, 1);

 $mpdf->SetMargins(30, 25, 40);
 $mpdf->SetAutoPageBreak(true, 40);
 
 $mpdf->SetHTMLHeader('<div id ="piedpagina"><img src="../../../../../../img/Imagen1.png"></div>');
 $mpdf->SetHTMLFooter('<div id ="piedpagina"><img src="../../../../../../img/Imagen2.png"></div>');
 
 $mpdf->writeHTML($html);
 
 $mpdf->output($nombrePDF,'I');

}else{
  header("Location: ../admin.php");
}

 ?>