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
