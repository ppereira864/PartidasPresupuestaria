
$(document).ready(function(){

		$("#Registrandotraslado").validate({
			rules:{///// inicia rules

				codigo1:"required",
				monto1:"required",
				seguir:"required"
			},/////cierre de rules

			messages:{/// inicio de messages

				codigo1:"!!! Campo Vacio Requerido ¡¡¡",
				monto1:"!!! Campo Vacio Requerido ¡¡¡",
				seguir:"!!! Campo Vacio Requerido ¡¡¡"

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
