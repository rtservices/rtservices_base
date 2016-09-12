<div class="header-content">
	<h2>Responsables de <?= (strlen($nomJugador) > 28 ) ? substr($nomJugador, 0, 27) . '...' : $nomJugador ?></h2>
	<div class="breadcrumb-wrapper hidden-xs">
		<span class="label">Estas en:</span>
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="menu">Menú principal</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li>
				<a href="clase">Gestión de personas</a> 
				<i class="fa fa-angle-right"></i>
			</li>
			<li class="active">
				<a href="#">Planes de clase de <?= (strlen($nomJugador) > 28 ) ? substr($nomJugador, 0, 27) . '...' : $nomJugador ?></a>
			</li>
		</ol>
	</div>
</div>


<div class="body-content animated fadeIn">
	<div class="row">
		<div class="col-md-12">
			<div class="panel rounded shadow no-overflow">
				<div class="panel-heading">
					<center>
						<a href="clase"><button type="button" class="btn btn-success btn-expand" style="background-color: #2A2A2A;">Terminar edición</button></a>
					</center>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="panel rounded shadow no-overflow">
				<div class="panel-heading">
					<div class="pull-left">
						<h3 class="panel-title">Información de la clase</h3>
					</div>
					<div class="pull-right">
						<button class="btn btn-sm" data-container="body" data-action="collapse" data-toggle="tooltip" data-placement="top" data-title="Collapse" data-original-title="" title=""><i class="fa fa-angle-up"></i></button>
					</div>
					<div class="clearfix"></div>
				</div>
				<input type="hidden" name="idJugador" id="idJugador" value="<?= $IdJugador ?>">
				<div class="panel-body no-padding" style="margin: 20px; font-size: 15px">
					<form id="gClaseE" name="gClaseE">
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<div class="row">
									<div class="col-md-6 form-group">
										<label class="control-label">Nombre de la clase</label>
										<input id="nombreClase" name="nombreClase" class="form-control" type="text" style="text-align: center;" value="">
									</div>
									<div class="col-md-6 form-group">
										<label class="control-label">Día </label>
										<select id="diaClase" name="diaClase" class="form-control" value="">
											
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 form-group">
										<label class="control-label">Instructor encargado</label>
										<select id="instructorClase" name="instructorClase" data-placeholder="Instructor" class="chosen-select mb-15" tabindex="-1" style="display: none;">
											<option value="" disabled>Seleccione un instructor</option>
											
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-2"></div>
						</div>
						<br>
						<div class="row">
							<center><button type="submit" class="btn btn-warning btn-expand" style="background-color: #2A2A2A;">Modificar clase</button></center>
						</div>
					</form>
				</div>
				<br>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel rounded shadow no-overflow">
				<div class="panel-heading">
					<div class="pull-left">
						<h3 class="panel-title">Jugadores inscritos en esta clase</h3>
					</div>
					<div class="pull-right">
						<button class="btn btn-sm" data-container="body" data-action="collapse" data-toggle="tooltip" data-placement="top" data-title="Collapse" data-original-title="" title=""><i class="fa fa-angle-up"></i></button>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-body no-padding" style="margin: 20px; font-size: 15px" >
					<div class="table-responsive">
						<table id="tablaPlanClase" class="table table-hover">
							<thead>
								<tr>
									<td style="color: red;">Estado</td>
									<td>Fecha de Inicio</td>
									<td>Dias restantes</td>
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