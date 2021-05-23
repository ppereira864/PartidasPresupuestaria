
$(document).ready(function(){

	$("#RegisReportes").validate({
			rules:{///// inicia rules
				
				cod_par:"required",
				mes:"required",
				disponibilidad:"required",
				gastos_mensual:"required",

			},/////cierre de rules

			messages:{/// inicio de messages

				cod_par:"**Error Datos Invalidos**",
				mes:"**Error Datos Invalidos**",
				disponibilidad:"**Error Datos Invalidos**",
				gastos_mensual:"**Error Datos Invalidos**"

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