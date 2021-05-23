$(document).ready(function(){

		$("#RegisPartida").validate({
			rules:{///// inicia rules

				anno:"required",
				cod_par:"required",
				cod_gen:"required",
				cod_esp:"required",
				cod_sub:"required",
				descripcion:"required",
				monto_ley:"required",
				credito_asignado:"required",
				comprometido:"required",
				acumulado:"required",
				disponible:"required"

			},/////cierre de rules

			messages:{/// inicio de messages

				anno:"**Error Datos Vacios ó Invalidos**",
				cod_par:"**Error Datos Vacios ó Invalidos**",
				cod_gen:"**Error Datos Vacios ó Invalidos**",
				cod_esp:"**Error Datos Vacios ó Invalidos**",
				cod_sub:"**Error Datos Vacios ó Invalidos**",
				descripcion:"**Error Datos Vacios ó Invalidos**",
				monto_ley:"**Error Datos Vacios ó Invalidos**",
				credito_asignado:"**Error Datos Vacios ó Invalidos**",
				comprometido:"**Error Datos Vacios ó Invalidos**",
				acumulado:"**Error Datos Vacios ó Invalidos**",
				disponible:"**Error Datos Vacios ó Invalidos**"

			},//// cierre de messages

			errorPlacement: function(error, element){
			 	if (element.is(":radio")||element.is(":checkbox")) {
			 		// statement
			 			error.appendTo(element.parent());
			 	}else{
			 		error.insertAfter(element);
			 	}
			}
		});	
});