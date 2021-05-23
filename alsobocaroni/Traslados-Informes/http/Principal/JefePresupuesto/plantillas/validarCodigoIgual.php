<?php 

function validar_codigo($codigo1, $codigo2, $codigo3, $codigo4, $codigo5, $codigo6, $codigo7, $codigo8){

	$bandera = false;

	if ( ( (strcmp($codigo1, $codigo2) == 0) AND ($codigo1 != "" AND $codigo2 =! "") ) OR 
		 ( (strcmp($codigo1, $codigo3) == 0) AND ($codigo1 != "" AND $codigo3 =! "") ) OR 
		 ( (strcmp($codigo1, $codigo4) == 0) AND ($codigo1 != "" AND $codigo4 =! "") ) OR 
		 ( (strcmp($codigo1, $codigo5) == 0) AND ($codigo1 != "" AND $codigo5 =! "") ) OR 
		 ( (strcmp($codigo1, $codigo6) == 0) AND ($codigo1 != "" AND $codigo6 =! "") ) OR 
		 ( (strcmp($codigo1, $codigo7) == 0) AND ($codigo1 != "" AND $codigo7 =! "") ) OR 
		 ( (strcmp($codigo1, $codigo8) == 0) AND ($codigo1 != "" AND $codigo8 =! "") ) OR 
		 ( (strcmp($codigo2, $codigo1) == 0) AND ($codigo2 != "" AND $codigo1 =! "") ) OR 
		 ( (strcmp($codigo2, $codigo3) == 0) AND ($codigo2 != "" AND $codigo3 =! "") ) OR 
		 ( (strcmp($codigo2, $codigo4) == 0) AND ($codigo2 != "" AND $codigo4 =! "") ) OR 
		 ( (strcmp($codigo2, $codigo5) == 0) AND ($codigo2 != "" AND $codigo5 =! "") ) OR 
		 ( (strcmp($codigo2, $codigo6) == 0) AND ($codigo2 != "" AND $codigo6 =! "") ) OR 
		 ( (strcmp($codigo2, $codigo7) == 0) AND ($codigo2 != "" AND $codigo7 =! "") ) OR 
		 ( (strcmp($codigo2, $codigo8) == 0) AND ($codigo2 != "" AND $codigo8 =! "") ) OR 
		 ( (strcmp($codigo3, $codigo1) == 0) AND ($codigo3 != "" AND $codigo1 =! "") ) OR 
		 ( (strcmp($codigo3, $codigo2) == 0) AND ($codigo3 != "" AND $codigo2 =! "") ) OR 
		 ( (strcmp($codigo3, $codigo4) == 0) AND ($codigo3 != "" AND $codigo4 =! "") ) OR 
		 ( (strcmp($codigo3, $codigo5) == 0) AND ($codigo3 != "" AND $codigo5 =! "") ) OR 
		 ( (strcmp($codigo3, $codigo6) == 0) AND ($codigo3 != "" AND $codigo6 =! "") ) OR 
		 ( (strcmp($codigo3, $codigo7) == 0) AND ($codigo3 != "" AND $codigo7 =! "") ) OR 
		 ( (strcmp($codigo3, $codigo8) == 0) AND ($codigo3 != "" AND $codigo8 =! "") ) OR 
		 ( (strcmp($codigo4, $codigo1) == 0) AND ($codigo4 != "" AND $codigo1 =! "") ) OR 
		 ( (strcmp($codigo4, $codigo2) == 0) AND ($codigo4 != "" AND $codigo2 =! "") ) OR 
		 ( (strcmp($codigo4, $codigo3) == 0) AND ($codigo4 != "" AND $codigo3 =! "") ) OR 
		 ( (strcmp($codigo4, $codigo5) == 0) AND ($codigo4 != "" AND $codigo5 =! "") ) OR 
		 ( (strcmp($codigo4, $codigo6) == 0) AND ($codigo4 != "" AND $codigo6 =! "") ) OR 
		 ( (strcmp($codigo4, $codigo7) == 0) AND ($codigo4 != "" AND $codigo7 =! "") ) OR 
		 ( (strcmp($codigo4, $codigo8) == 0) AND ($codigo4 != "" AND $codigo8 =! "") ) OR 
		 ( (strcmp($codigo5, $codigo1) == 0) AND ($codigo5 != "" AND $codigo1 =! "") ) OR 
		 ( (strcmp($codigo5, $codigo2) == 0) AND ($codigo5 != "" AND $codigo2 =! "") ) OR 
		 ( (strcmp($codigo5, $codigo3) == 0) AND ($codigo5 != "" AND $codigo3 =! "") ) OR 
		 ( (strcmp($codigo5, $codigo4) == 0) AND ($codigo5 != "" AND $codigo4 =! "") ) OR 
		 ( (strcmp($codigo5, $codigo6) == 0) AND ($codigo5 != "" AND $codigo6 =! "") ) OR 
		 ( (strcmp($codigo5, $codigo7) == 0) AND ($codigo5 != "" AND $codigo7 =! "") ) OR 
		 ( (strcmp($codigo5, $codigo8) == 0) AND ($codigo5 != "" AND $codigo8 =! "") ) OR 
		 ( (strcmp($codigo6, $codigo1) == 0) AND ($codigo6 != "" AND $codigo1 =! "") ) OR 
		 ( (strcmp($codigo6, $codigo2) == 0) AND ($codigo6 != "" AND $codigo2 =! "") ) OR 
		 ( (strcmp($codigo6, $codigo3) == 0) AND ($codigo6 != "" AND $codigo3 =! "") ) OR 
		 ( (strcmp($codigo6, $codigo4) == 0) AND ($codigo6 != "" AND $codigo4 =! "") ) OR 
		 ( (strcmp($codigo6, $codigo5) == 0) AND ($codigo6 != "" AND $codigo5 =! "") ) OR 
		 ( (strcmp($codigo6, $codigo7) == 0) AND ($codigo6 != "" AND $codigo7 =! "") ) OR 
		 ( (strcmp($codigo6, $codigo8) == 0) AND ($codigo6 != "" AND $codigo8 =! "") ) OR 
		 ( (strcmp($codigo7, $codigo1) == 0) AND ($codigo7 != "" AND $codigo1 =! "") ) OR 
		 ( (strcmp($codigo7, $codigo2) == 0) AND ($codigo7 != "" AND $codigo2 =! "") ) OR 
		 ( (strcmp($codigo7, $codigo3) == 0) AND ($codigo7 != "" AND $codigo3 =! "") ) OR 
		 ( (strcmp($codigo7, $codigo4) == 0) AND ($codigo7 != "" AND $codigo4 =! "") ) OR 
		 ( (strcmp($codigo7, $codigo5) == 0) AND ($codigo7 != "" AND $codigo5 =! "") ) OR 
		 ( (strcmp($codigo7, $codigo6) == 0) AND ($codigo7 != "" AND $codigo6 =! "") ) OR 
		 ( (strcmp($codigo7, $codigo8) == 0) AND ($codigo7 != "" AND $codigo7 =! "") ) OR 
		 ( (strcmp($codigo8, $codigo1) == 0) AND ($codigo8 != "" AND $codigo1 =! "") ) OR 
		 ( (strcmp($codigo8, $codigo2) == 0) AND ($codigo8 != "" AND $codigo2 =! "") ) OR 
		 ( (strcmp($codigo8, $codigo3) == 0) AND ($codigo8 != "" AND $codigo3 =! "") ) OR 
		 ( (strcmp($codigo8, $codigo4) == 0) AND ($codigo8 != "" AND $codigo4 =! "") ) OR 
		 ( (strcmp($codigo8, $codigo5) == 0) AND ($codigo8 != "" AND $codigo5 =! "") ) OR 
		 ( (strcmp($codigo8, $codigo6) == 0) AND ($codigo8 != "" AND $codigo6 =! "") ) OR 
		 ( (strcmp($codigo8, $codigo7) == 0) AND ($codigo8 != "" AND $codigo7 =! "") ) 
		) {
		
			$bandera = true;
		}
	
	return $bandera;

}


function validar_codigo2($codigo1, $codigo2, $codigo3, $codigo4, $codigo5, $codigo6, $codigo7, $codigo8){

	$bandera = false;

	if ( ( (strcmp($codigo1, $codigo2) == 0) AND ($codigo1 != "" AND $codigo2 =! "") ) OR 
		 ( (strcmp($codigo1, $codigo3) == 0) AND ($codigo1 != "" AND $codigo3 =! "") ) OR 
		 ( (strcmp($codigo1, $codigo4) == 0) AND ($codigo1 != "" AND $codigo4 =! "") ) OR 
		 ( (strcmp($codigo1, $codigo5) == 0) AND ($codigo1 != "" AND $codigo5 =! "") ) OR 
		 ( (strcmp($codigo1, $codigo6) == 0) AND ($codigo1 != "" AND $codigo6 =! "") ) OR 
		 ( (strcmp($codigo1, $codigo7) == 0) AND ($codigo1 != "" AND $codigo7 =! "") ) OR 
		 ( (strcmp($codigo1, $codigo8) == 0) AND ($codigo1 != "" AND $codigo8 =! "") ) OR 
		 ( (strcmp($codigo2, $codigo1) == 0) AND ($codigo2 != "" AND $codigo1 =! "") ) OR 
		 ( (strcmp($codigo2, $codigo3) == 0) AND ($codigo2 != "" AND $codigo3 =! "") ) OR 
		 ( (strcmp($codigo2, $codigo4) == 0) AND ($codigo2 != "" AND $codigo4 =! "") ) OR 
		 ( (strcmp($codigo2, $codigo5) == 0) AND ($codigo2 != "" AND $codigo5 =! "") ) OR 
		 ( (strcmp($codigo2, $codigo6) == 0) AND ($codigo2 != "" AND $codigo6 =! "") ) OR 
		 ( (strcmp($codigo2, $codigo7) == 0) AND ($codigo2 != "" AND $codigo7 =! "") ) OR 
		 ( (strcmp($codigo2, $codigo8) == 0) AND ($codigo2 != "" AND $codigo8 =! "") ) OR 
		 ( (strcmp($codigo3, $codigo1) == 0) AND ($codigo3 != "" AND $codigo1 =! "") ) OR 
		 ( (strcmp($codigo3, $codigo2) == 0) AND ($codigo3 != "" AND $codigo2 =! "") ) OR 
		 ( (strcmp($codigo3, $codigo4) == 0) AND ($codigo3 != "" AND $codigo4 =! "") ) OR 
		 ( (strcmp($codigo3, $codigo5) == 0) AND ($codigo3 != "" AND $codigo5 =! "") ) OR 
		 ( (strcmp($codigo3, $codigo6) == 0) AND ($codigo3 != "" AND $codigo6 =! "") ) OR 
		 ( (strcmp($codigo3, $codigo7) == 0) AND ($codigo3 != "" AND $codigo7 =! "") ) OR 
		 ( (strcmp($codigo3, $codigo8) == 0) AND ($codigo3 != "" AND $codigo8 =! "") ) OR 
		 ( (strcmp($codigo4, $codigo1) == 0) AND ($codigo4 != "" AND $codigo1 =! "") ) OR 
		 ( (strcmp($codigo4, $codigo2) == 0) AND ($codigo4 != "" AND $codigo2 =! "") ) OR 
		 ( (strcmp($codigo4, $codigo3) == 0) AND ($codigo4 != "" AND $codigo3 =! "") ) OR 
		 ( (strcmp($codigo4, $codigo5) == 0) AND ($codigo4 != "" AND $codigo5 =! "") ) OR 
		 ( (strcmp($codigo4, $codigo6) == 0) AND ($codigo4 != "" AND $codigo6 =! "") ) OR 
		 ( (strcmp($codigo4, $codigo7) == 0) AND ($codigo4 != "" AND $codigo7 =! "") ) OR 
		 ( (strcmp($codigo4, $codigo8) == 0) AND ($codigo4 != "" AND $codigo8 =! "") ) OR 
		 ( (strcmp($codigo5, $codigo1) == 0) AND ($codigo5 != "" AND $codigo1 =! "") ) OR 
		 ( (strcmp($codigo5, $codigo2) == 0) AND ($codigo5 != "" AND $codigo2 =! "") ) OR 
		 ( (strcmp($codigo5, $codigo3) == 0) AND ($codigo5 != "" AND $codigo3 =! "") ) OR 
		 ( (strcmp($codigo5, $codigo4) == 0) AND ($codigo5 != "" AND $codigo4 =! "") ) OR 
		 ( (strcmp($codigo5, $codigo6) == 0) AND ($codigo5 != "" AND $codigo6 =! "") ) OR 
		 ( (strcmp($codigo5, $codigo7) == 0) AND ($codigo5 != "" AND $codigo7 =! "") ) OR 
		 ( (strcmp($codigo5, $codigo8) == 0) AND ($codigo5 != "" AND $codigo8 =! "") ) OR 
		 ( (strcmp($codigo6, $codigo1) == 0) AND ($codigo6 != "" AND $codigo1 =! "") ) OR 
		 ( (strcmp($codigo6, $codigo2) == 0) AND ($codigo6 != "" AND $codigo2 =! "") ) OR 
		 ( (strcmp($codigo6, $codigo3) == 0) AND ($codigo6 != "" AND $codigo3 =! "") ) OR 
		 ( (strcmp($codigo6, $codigo4) == 0) AND ($codigo6 != "" AND $codigo4 =! "") ) OR 
		 ( (strcmp($codigo6, $codigo5) == 0) AND ($codigo6 != "" AND $codigo5 =! "") ) OR 
		 ( (strcmp($codigo6, $codigo7) == 0) AND ($codigo6 != "" AND $codigo7 =! "") ) OR 
		 ( (strcmp($codigo6, $codigo8) == 0) AND ($codigo6 != "" AND $codigo8 =! "") ) OR 
		 ( (strcmp($codigo7, $codigo1) == 0) AND ($codigo7 != "" AND $codigo1 =! "") ) OR 
		 ( (strcmp($codigo7, $codigo2) == 0) AND ($codigo7 != "" AND $codigo2 =! "") ) OR 
		 ( (strcmp($codigo7, $codigo3) == 0) AND ($codigo7 != "" AND $codigo3 =! "") ) OR 
		 ( (strcmp($codigo7, $codigo4) == 0) AND ($codigo7 != "" AND $codigo4 =! "") ) OR 
		 ( (strcmp($codigo7, $codigo5) == 0) AND ($codigo7 != "" AND $codigo5 =! "") ) OR 
		 ( (strcmp($codigo7, $codigo6) == 0) AND ($codigo7 != "" AND $codigo6 =! "") ) OR 
		 ( (strcmp($codigo7, $codigo8) == 0) AND ($codigo7 != "" AND $codigo7 =! "") ) OR 
		 ( (strcmp($codigo8, $codigo1) == 0) AND ($codigo8 != "" AND $codigo1 =! "") ) OR 
		 ( (strcmp($codigo8, $codigo2) == 0) AND ($codigo8 != "" AND $codigo2 =! "") ) OR 
		 ( (strcmp($codigo8, $codigo3) == 0) AND ($codigo8 != "" AND $codigo3 =! "") ) OR 
		 ( (strcmp($codigo8, $codigo4) == 0) AND ($codigo8 != "" AND $codigo4 =! "") ) OR 
		 ( (strcmp($codigo8, $codigo5) == 0) AND ($codigo8 != "" AND $codigo5 =! "") ) OR 
		 ( (strcmp($codigo8, $codigo6) == 0) AND ($codigo8 != "" AND $codigo6 =! "") ) OR 
		 ( (strcmp($codigo8, $codigo7) == 0) AND ($codigo8 != "" AND $codigo7 =! "") ) 
		) {
		
			$bandera = true;
		}
	
	return $bandera;

}

 ?>
