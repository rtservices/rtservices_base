var tabla;

$(document).ready(function() {
	NProgress.start();
	tabla = $('#tablaPlanClase').DataTable({"ajax":"planclase/cargarTabla/" + $('#idJugador').val() });
});

$(window).load(function() {
	NProgress.done();
});

$('#gPClase').submit(function(event){
	event.preventDefault();

	if ($('#tipoPlan').val() == 'no')
	{
		alert('asd');
	}
	else
	{
		// $.ajax({
		// 	url: '/path/to/file',
		// 	type: 'default GET (Other values: POST)',
		// 	dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
		// 	data: {param1: 'value1'},
		// });
		
	}
});