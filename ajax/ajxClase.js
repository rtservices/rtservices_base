var tablaPrincipalClase;
var tablaClase;
$(document).ready(function() {
	NProgress.start();
	tablaPrincipalClase = $('#tablaClase').DataTable({ "ajax":"clase/cargarTabla" });
}); 

$(window).load(function() {
	NProgress.done();
});

function actualizar()
{
	tablaPrincipalClase.ajax.reload(null,false);
}

function nuevaC()
{
	$('#registroC')[0].reset();
	$('#modalRegistro').modal('show');
}

function verClase(id)
{
	NProgress.start();
	$('#modalInfo').modal('show');
	setTimeout(function() {
		$('#tablaJugadorV').DataTable({ "ajax":"clase/cargarJugadorClase/" + id });
		NProgress.done();
	}, 1000);
}

function variarEstadoClase(id)
{
	swal({
		title: "¿Estas seguro?",
		text: "¿Realmente deseas cambiar el estado de esta clase?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Si, cámbialo!",
		closeOnConfirm: false
	}).then(function() {
		NProgress.start();
		$.ajax({
			url: "clase/variarEstadoClase",
			type: "POST",
			data: { idclase: id },
			success: function(res) 
			{
				actualizar();
				if (res == 'ok') 
				{
					NProgress.done();
					swal("Completado!", "Se ha cambiado el estado de dicha clase.", "success");
				} 
				else
				{
					NProgress.done();
					sweetAlert("Oops...", "No se ha cambiado el estado de dicha clase.", "error");
				}
			}
		});
	});
}

$('#registro').submit(function(event) {
	event.preventDefault();

	NProgress.start();
	$.ajax({
		url: 'clase/registrarClase',
		type: 'POST',
		data: $('#registro').serialize(),
		success:function(res)
		{
			if (res != "no")
			{
				NProgress.done();
				$("#DivAccionRegistrar").html(res);
			}
			else
			{
				NProgress.done();
				sweetAlert("Oops...", "No se ha registrado la clase.", "error");
			}
		},

	});
	

});


$('#gClase').submit(function(event) {
	event.preventDefault();

	NProgress.start();
	$.ajax({
		url: 'clase/modificarClase',
		type: 'POST',
		data:$('#gClase').serialize(),
		success:function(res){
			actualizar();
			if(res == 'no')
			{
				NProgress.done();
				sweetAlert("Oops...", "No se ha modificado la información de la clase.", "error");
			} 
			else
			{
				NProgress.done();
				sweetAlert("Perfecto!", "Se ha modificado la información de la clase.", "success");
			}
		}

	});

});

//Ajax de registrar
$('#registroC').submit(function(event) {
	event.preventDefault();
	if ($('#registroC').validate().form()) 
	{
		NProgress.start();
		$.ajax({
			url: 'clase/registrarClases',
			type: 'POST',
			data:$('#registroC').serialize(),
			success:function(res){
				actualizar();
				if(res=='ok')
				{
					NProgress.done();
					swal("Completado!", "Se ha registrado la clase.", "success");
				} 
				else
				{
					NProgress.done();
					sweetAlert("Oops...", "No se ha registrado la clase.", "error");
				}
			}

		});
	}
});

