
$(document).ready(function(){

		$("#RegistroExtra").validate({
			rules:{///// inicia rules

				codigo:"required",
				descripcion:"required"

			},/////cierre de rules

			messages:{/// inicio de messages

				codigo:"!!! Campo Vacio Requerido ¡¡¡",
				descripcion:"!!! Campo Vacio Requerido ¡¡¡"

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
