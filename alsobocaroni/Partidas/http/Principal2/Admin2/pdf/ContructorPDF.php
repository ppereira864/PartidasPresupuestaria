<?php

 require("../../../ConexionBD/conexion.php");
 require_once('../../../../../../lib/pdf/mpdf.php');


 $anno    = $_GET['v1']; 
 $mes     = $_GET['v2'];


 $estraer_datos = "SELECT *FROM reportes WHERE anno='$anno' AND mes='$mes'";
 $ejecutar_consulta = $conexion->query($estraer_datos);


 if ( $row = $ejecutar_consulta->fetch_assoc() ) {




if ( $mes != "Anual"){

 $nombrePDF ="Reportes ".$anno."/".$mes.".pdf";

  $consulta = "SELECT * FROM presupuesto_partida WHERE (anno='$anno' AND mes='$mes') order by dig_mes, cod_part, cod_gen, cod_esp, cod_sub";

  $ejecutar_consulta = $conexion->query($consulta);

  $ley = 0; $modificado = 0; $comprometido = 0; $causado = 0; $disponible = 0;


 $html='
         <br>
         <div id="membrete">
           <b>REPUBLICA BOLIVARIANA DE VENEZUELA</b><br>
           <b>ESTADO BOLIVAR</b><br>
           <b>MUNICIPIO CARONI</b><br>
         </div><br><br>
         
         <div id="tabla">
           <table border=1 cellspacing=0 cellpadding=3 bordercolor=666633 style="width: 100%;">
             <tr bgcolor="skyblue">
               <td><strong> PAR </strong></td>
               <td><strong> GEN </strong></td>
               <td><strong> ESP </strong></td>
               <td><strong> SUB </strong></td>
               <td><strong> DESCRIPCION </strong></td>
               <td><strong> LEY </strong></td>
               <td><strong> MODIFICADO </strong></td>
               <td><strong> COMPROMETIDO </strong></td>
               <td><strong> CAUSADO </strong></td>
               <td><strong> DISPONIBLE </strong></td>
             </tr>';

    while ($result=mysqli_fetch_array($ejecutar_consulta)){

      $v1 = $result['cod_part'];
      $v2 = $result['cod_gen'];
      $v3 = $result['cod_esp'];
      $v4 = $result['cod_sub'];

      $consultaDescripcion = "SELECT * FROM num_partidas WHERE (cod_par=$v1 AND cod_gen=$v2 AND cod_esp=$v3 AND cod_sub=$v4)";

      $ejecutar_consultaDescripcion = $conexion->query($consultaDescripcion);

      $rowdescripcion = $ejecutar_consultaDescripcion->fetch_assoc();
      $descripcion = $rowdescripcion['descripcion'];
      
        $html.="<tr>";
        $html.='<td>'.$result['cod_part'].'</td>';
        $html.='<td>'.$result['cod_gen'].'</td>';
        $html.='<td>'.$result['cod_esp'].'</td>';
        $html.='<td>'.$result['cod_sub'].'</td>';
        $html.='<td>'.$descripcion.'</td>';
        $html.='<td>'.$result['monto_ley'].'</td>';
        $html.='<td>'.$result['modificado'].'</td>';
        $html.='<td>'.$result['comprometido'].'</td>';
        $html.='<td>'.$result['credito_asignado'].'</td>';
        $html.='<td>'.$result['disponible'].'</td>';
        $html.="</tr>";

        $ley            = $ley           + $result['monto_ley'];
        $modificado     = $modificado    + $result['modificado'];      
        $comprometido   = $comprometido  + $result['comprometido'];        
        $causado        = $causado       + $result['credito_asignado'];    
        $disponible     = $disponible    + $result['disponible'];      

    }

        $html.='<tr bgcolor="grey">';
        $html.='<td></td>';
        $html.='<td></td>';
        $html.='<td></td>';
        $html.='<td></td>';
        $html.='<td></td>';
        $html.='<td>'.$ley.'</td>';
        $html.='<td>'.$modificado.'</td>';
        $html.='<td>'.$comprometido.'</td>';
        $html.='<td>'.$causado.'</td>';
        $html.='<td>'.$disponible.'</td>';
        $html.="</tr>";

  
    $html.="</table></div>";

 $mpdf = new mPDF('A','A2');

 $css = file_get_contents('../../../../../../css/styles.css');
 $mpdf->writeHTML($css, 1);

  $mpdf->SetMargins(30, 25, 55);
 $mpdf->SetAutoPageBreak(true, 40);
 
 $mpdf->SetHTMLHeader('<div id ="piedpagina"><img src="../../../../../../img/Imagen1.png" width="930" height="100"></div><div style="text-align: right;">'.$mes.' '.$anno.'</div><br><hr>');
 
 $mpdf->writeHTML($html);
 
 $mpdf->output($nombrePDF,'I');

}else{

  $nombrePDF ="Reportes ".$mes."/".$anno.".pdf";

   $consulta = "SELECT * FROM presupuesto_partida ORDER BY dig_mes, cod_part, cod_gen, cod_esp, cod_sub";

   $ejecutar_consulta = $conexion->query($consulta);

   $consulta1 = "SELECT * FROM presupuesto_partida ORDER BY dig_mes, cod_part, cod_gen, cod_esp, cod_sub";

   $ejecutar_consulta1 = $conexion->query($consulta1);

   $ley = 0; $modificado = 0; $comprometido = 0; $causado = 0; $disponible = 0;


  $html='
          <br>
          <div id="membrete">
            <b>REPUBLICA BOLIVARIANA DE VENEZUELA</b><br>
            <b>ESTADO BOLIVAR</b><br>
            <b>MUNICIPIO CARONI</b><br>
          </div><br><br>';

  $cont = 0;

     while ($result=mysqli_fetch_array($ejecutar_consulta)){

      if ( $cont == 0 ){
        $html.='<div style="text-align: right;">
                </div>
                <div id="tabla">
                  <table border=1 cellspacing=0 cellpadding=3 bordercolor=666633 style="width: 100%;">
                    <tr bgcolor="skyblue">
                      <td><strong> MES </strong></td>
                      <td><strong> PAR </strong></td>
                      <td><strong> GEN </strong></td>
                      <td><strong> ESP </strong></td>
                      <td><strong> SUB </strong></td>
                      <td><strong> DESCRIPCION </strong></td>
                      <td><strong> LEY </strong></td>
                      <td><strong> MODIFICADO </strong></td>
                      <td><strong> COMPROMETIDO </strong></td>
                      <td><strong> CAUSADO </strong></td>
                      <td><strong> DISPONIBLE </strong></td>
                    </tr>';
        $cont ++;
      }

       $v1 = $result['cod_part'];
       $v2 = $result['cod_gen'];
       $v3 = $result['cod_esp'];
       $v4 = $result['cod_sub'];

       $consultaDescripcion = "SELECT * FROM num_partidas WHERE (cod_par=$v1 AND cod_gen=$v2 AND cod_esp=$v3 AND cod_sub=$v4)";

       $ejecutar_consultaDescripcion = $conexion->query($consultaDescripcion);

       $rowdescripcion = $ejecutar_consultaDescripcion->fetch_assoc();
       $descripcion = $rowdescripcion['descripcion'];

         $html.="<tr>";
         $html.='<td>'.$result['mes'].'</td>';
         $html.='<td>'.$result['cod_part'].'</td>';
         $html.='<td>'.$result['cod_gen'].'</td>';
         $html.='<td>'.$result['cod_esp'].'</td>';
         $html.='<td>'.$result['cod_sub'].'</td>';
         $html.='<td>'.$descripcion.'</td>';
         $html.='<td>'.$result['monto_ley'].'</td>';
         $html.='<td>'.$result['modificado'].'</td>';
         $html.='<td>'.$result['comprometido'].'</td>';
         $html.='<td>'.$result['credito_asignado'].'</td>';
         $html.='<td>'.$result['disponible'].'</td>';
         $html.="</tr>";

         $ley            = $ley           + $result['monto_ley'];
         $modificado     = $modificado    + $result['modificado'];      
         $comprometido   = $comprometido  + $result['comprometido'];        
         $causado        = $causado       + $result['credito_asignado'];    
         $disponible     = $disponible    + $result['disponible'];    
       }
       

         $html.='<tr bgcolor="grey">';
         $html.='<td></td>';
         $html.='<td></td>';
         $html.='<td></td>';
         $html.='<td></td>';
         $html.='<td></td>';
         $html.='<td></td>';
         $html.='<td>'.$ley.'</td>';
         $html.='<td>'.$modificado.'</td>';
         $html.='<td>'.$comprometido.'</td>';
         $html.='<td>'.$causado.'</td>';
         $html.='<td>'.$disponible.'</td>';
         $html.='</tr>';

   
     $html.="</table></div>";

  $mpdf = new mPDF('A','A2');

  $css = file_get_contents('../../../../../../css/styles.css');
  $mpdf->writeHTML($css, 1);

   $mpdf->SetMargins(30, 25, 55);
  $mpdf->SetAutoPageBreak(true, 40);
  
  $mpdf->SetHTMLHeader('<div id ="piedpagina"><img src="../../../../../../img/Imagen1.png" width="930" height="100"></div><div style="text-align: right;">'.$mes.' '.$anno.'</div><br><hr>');
  
  $mpdf->writeHTML($html);
  
  $mpdf->output($nombrePDF,'I');

}


}else{
  header("Location: ../administrador.php");
}

 ?>