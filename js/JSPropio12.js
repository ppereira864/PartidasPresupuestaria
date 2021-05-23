
$(document).ready(function(){

		$("#Registrotraslado").validate({
			rules:{///// inicia rules

				num_acuerdo:"required",
				anno:"required",
				parrafo_inic:"required",
				considerando_1:"required",
				considerando_2:"required",
				considerando_3:"required",
				considerando_4:"required",
				considerando_5:"required",
				considerando_6:"required",
				considerando_7:"required",
				articulo_1:"required",
				articulo_2:"required",
				articulo_3:"required",
				articulo_4:"required"

			},/////cierre de rules

			messages:{/// inicio de messages

				num_acuerdo:"!!! Error Cantidad Excedida ¡¡¡",
				anno:"!!! Campo Vacio ¡¡¡",
				parrafo_inic:"!!! Campo Vacio ¡¡¡",
				considerando_1:"!!! Campo Vacio ¡¡¡",
				considerando_2:"!!! Campo Vacio ¡¡¡",
				considerando_3:"!!! Campo Vacio ¡¡¡",
				considerando_4:"!!! Campo Vacio ¡¡¡",
				considerando_5:"!!! Campo Vacio ¡¡¡",
				considerando_6:"!!! Campo Vacio ¡¡¡",
				considerando_7:"!!! Campo Vacio ¡¡¡",
				articulo_1:"!!! Campo Vacio ¡¡¡",
				articulo_2:"!!! Campo Vacio ¡¡¡",
				articulo_3:"!!! Campo Vacio ¡¡¡",
				articulo_4:"!!! Campo Vacio ¡¡¡"

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
