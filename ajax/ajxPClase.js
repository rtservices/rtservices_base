var tabla;

$(document).ready(function() {
	NProgress.start();
	tabla = $('#tablaPlanClase').DataTable({"ajax":"planclase/cargarTabla/" + $('#idJugador').val() });

	console.log($('#idJugador').val());
});

$(window).load(function() {
	NProgress.done();
});