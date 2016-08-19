var tablaJugadorClase;
$(document).ready(function() {
	var idClase = $('#idClaseActual').val();
	NProgress.start();
	tablaJugadorClase = $('#tablaJugadorClase').DataTable({ "ajax":"clase/cargarTablaJC/" + idClase });
});

$(window).load(function() {
	NProgress.done();
});

function actualizar()
{
	NProgress.start();
	tablaJugadorClase.ajax.reload(null,false);
	NProgress.done();
}

$('#gJugadorClase').submit(function(event) {
	event.preventDefault();

	NProgress.start();
	$.ajax({
		url: 'clase/addJugadorClase',
		type: 'POST',
		data:$('#gJugadorClase').serialize(),
		success:function(res){
			actualizar();
			if(res == 'no')
			{
				NProgress.done();
				sweetAlert("Oops...", "No se ha asignado el jugador a la clase.", "error");
			} 
			else if (res == 'yaEsta')
			{
				NProgress.done();
				sweetAlert("Oops...", "Al parecer el jugador ya esta asignado a la clase.", "error");
			}
			else
			{
				NProgress.done();
				sweetAlert("Perfecto!", "Se ha asignado el jugador a la clase.", "success");
			}
		}

	});

});

function eliminarInscripcionClase(id)
{
	NProgress.start();
	swal({
		title: "¿Estas seguro?",
		text: "¿Realmente deseas eliminar la inscripción de este jugador a la clase?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Si, eliminalo!",
		closeOnConfirm: false
	}).then(function() {
		$.ajax({
			url: "clase/eliminarInscripcionClase/" + id,
			type: "GET",
			success:function(res) 
			{
				actualizar();
				if (res == 'ok') 
				{
					NProgress.done();
					swal("Completado!", "Se ha cambiado el estado de dicho usuario.", "success");
				} 
				else
				{
					NProgress.done();
					sweetAlert("Oops...", "No se ha cambiado el estado de dicho usuario.", "error");
				}
			}
		});
	});
}