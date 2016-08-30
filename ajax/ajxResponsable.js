var tabla;

$(document).ready(function() {
	NProgress.start();
	tabla = $('#tablaJugadorResponsable').DataTable({ "ajax": "responsables/cargarTabla/" + $('#idJugador').val() });
});

$(window).load(function() {
	NProgress.done();
});

function editarresJug(id)
{
	alert(id);
}

function variarEstadoresJug(id)
{
	alert(id);
}

$('#gResponsablesJugador').submit(function(event) {
	event.preventDefault();

	$.ajax({
		url: 'responsables/asignarResponsable',
		type: 'POST',
		data: $(this).serialize(),
		success:function(res)
		{
			if (res == 'ok')
			{
				sweetAlert("Completado!", "Se ha cambiado el modificado la información de esta etapa.", "success");
			} 
			else
			{
				sweetAlert("Oops...", "No se ha cambiado el modificado la información de esta etapa.", "error");
			}
		}
	});
	
});
