var tablaAsistencia;
$(document).ready(function() {
	NProgress.start();
	tablaAsistencia = $('#tablaAsistencia').DataTable({ "ajax":"asistencia/cargarTabla" });
}); 

$(window).load(function() {
	NProgress.done();
});

function actualizar()
{
	tablaAsistencia.ajax.reload(null,false);
}
