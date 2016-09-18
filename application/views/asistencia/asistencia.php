<div class="header-content">
	<h2><i class="fa fa-list-alt"></i> Gestión de Asistencia</h2>
	<div class="breadcrumb-wrapper hidden-xs">
		<span class="label">Estas en:</span>
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="dashboard.html">Menú principal</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li class="active">Gestión de asistencia</li>
		</ol>
	</div>
</div>

<div class="body-content animated fadeIn">
	<div class="row">
		<div class="col-md-12">
			<div class="panel rounded shadow no-overflow">
				<center>
					<div class="panel-heading btn btn-success btn-push" style="margin: 20px" onclick="nuevaC()">
						<a style="text-decoration:none; color:white;"><h3 class="panel-title">Registrar Asistencia </h3></a>
						<div class="clearfix"></div>
					</div>
				</center>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="col-md-12">
			<div class="panel rounded shadow no-overflow">
				<div class="panel-heading">
					<div class="pull-left">
						<h3 class="panel-title">Asistencias en el sistema</h3>
					</div>
					<div class="pull-right">
						<button class="btn btn-sm" data-container="body" data-action="collapse" data-toggle="tooltip" data-placement="top" data-title="Collapse" data-original-title="" title=""><i class="fa fa-angle-up"></i></button>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-body no-padding" style="margin: 20px;font-size: 16px;" >
					<div class="table-responsive">
						<table id="tablaAsistencia" class="table table-hover">
							<thead>
								<tr>
									<td>-</td>
									<td style="color: red;">Nombre clase</td>
									<td>Horario</td>
									<td>Cantidad jugadores</td>
									<td style="text-align: center;">Acciones</td>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
					<br>
				</div>
			</div>
		</div>
	</div>
</div>
			
