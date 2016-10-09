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


function nuevaAsistencia()
{
	$('#modalAsistencia').modal('show');
}

$('#formAsistencia').submit(function(event) {
	event.preventDefault();
	
	$.ajax({
		url: 'asistencia/regitrarasistencia',
		type: 'POST',
		data: $('#formAsistencia').serialize(),
		success:function(res)
		{
			if (res != 'no')
			{
				location.href = 'asistencia?ida=' + res;
			}
			else
			{
				alert('error');
			}
		}
	});
	
});