$(document).ready(function(){

		$("#RegistroUser").validate({
			rules:{///// inicia rules

				cedula:"required",
				nombres:"required",
				apellidos:"required",
				email:"required",
				cargo:"required",
				tipousuario:"required",
				hostname:"required",
				password:"required",
				repassword:"required"

			},/////cierre de rules

			messages:{/// inicio de messages

				cedula:"!!! Campo Vacio / Formato Invalido ¡¡¡",
				nombres:"!!! Campo Vacio ¡¡¡",
				apellidos:"!!! Campo Vacio !!!",
				email:"!!! Campo Vacio / Formato Invalido ¡¡¡",
				cargo:"!!! Campo Vacio ¡¡¡",
				tipousuario:"!!! Campo Vacio ¡¡¡",
				hostname:"!!! Campo Vacio ¡¡¡",
				password:"!!! Campo Vacio ¡¡¡",
				repassword:"!!! Campo Vacio ¡¡¡"

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


function valPassw() {
	
	var dato1 = document.getElementById('password').value;
	var dato2 = document.getElementById('repassword').value;

	if (dato1 != dato2) {
		alert('Error!!!! Constraseña No Coinciden');
		return false;
	}

}