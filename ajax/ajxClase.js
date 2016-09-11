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

$('#registroC').submit(function(event) {
	event.preventDefault();

	NProgress.start();
	$.ajax({
		url: 'clase/registrarClase',
		type: 'POST',
		data: $('#registroC').serialize(),
		success:function(res)
		{

			if (res != "no" )
			{
				NProgress.done();
				location.href = 'clase?clase='+res;
				console.log(res);	
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

function listarPartidos(id)
{
	NProgress.start();
    $.ajax({
    	url: 'partidos/listarPartidos',
		type: 'POST',
		dataType: 'JSON',
		data: {id: id},
    	success:function(res){
    		$('[id = "nombre"]').text(res.NombreClase);
    		$('[id = "dia"]').text(res.Dia);
    		$('[id = "horainicio"]').text(res.HoraInicio);
    		$('[id = "horafinal"]').text(res.horaFFinal);
    		$('[id = "instructor"]').text(res.NombreCategoria);
    		$('#modalInfo').modal('show');
	        NProgress.done();
    	}
    });
	
}
