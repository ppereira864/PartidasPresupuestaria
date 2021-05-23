
$(document).ready(function(){

		$("#RegistroExtra2").validate({
			rules:{///// inicia rules

				nombre_apellido_pc:"required",
				cedula_pc:"required",
				nombre_apellido_sm:"required"


			},/////cierre de rules

			messages:{/// inicio de messages

				nombre_apellido_pc:"!!! Campo Vacio Requerido ¡¡¡",
				cedula_pc:"!!! Campo Vacio Requerido ¡¡¡",
				nombre_apellido_sm:"!!! Campo Vacio Requerido ¡¡¡",

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
