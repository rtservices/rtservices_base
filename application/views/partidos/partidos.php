<div class="header-content">
	<h2><i class="fa fa-trophy"></i> Gestión de partidos</h2>
	<div class="breadcrumb-wrapper hidden-xs">
		<span class="label">Estas en:</span>
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="dashboard.html">Menú principal</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li class="active">Gestión de partidos</li>
		</ol>
	</div>
</div>

<div class="panel-body no-padding" style="margin: 20px; font-size: 15px" >
	<div class="table-responsive">
		<table id="tablaPartidos" class="table table-hover">
			<thead>
				<tr>
					<td style="color: red;">Fecha</td>
					<td>Lugar</td>
					<td>Etapa</td>
					<td>Cuadro </td>
					<td>Categoria</td>
					<td>Jugadores</td>
					<td>Acciones</td>

				</tr>
			</thead>
			<tbody>

			</tbody>
		</table>
	</div>
</div>
<div class="modal fade bs-example-modal-lg" id="modalInformacion" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content" style="border:5px solid black;">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<div class="row">
						<h1 style="text-align:center;">RESULTADOS DE LOS PARTIDOS</h1>
						<div class="divider" style="border:1px solid black;"></div>
						<div class="col-md-6" style="text-align: center;">
							<label><h4>Fecha</h4></label>
							<br>
							<span id="fecha"></span>
						</div>
						<div class="col-md-6" style="text-align: center;">
							<label><h4>Lugar</h4></label>
							<br>
							<span id="lugar"></span>
						</div>
						<div class="col-md-6" style="text-align: center;">
							<label><h4>Etapa</h4></label>
							<br>
							<span id="etapa"></span>
						</div>
						<div class="col-md-6" style="text-align: center;">
							<label><h4>Cuadro</h4></label>
							<br>
							<span id="cuadro"></span>
						</div>
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6" style="text-align: center;">
								<label><h4>Categoria</h4></label>
								<br>
								<span id="categoria"></span>
							</div>
							<div class="col-md-3"></div>
						</div>
						<div class="divider" style="border:1px solid black;"></div>
						<div class="col-md-6" style="text-align: center;">
							<label><h4>JUGADOR1</h4></label>
							<br>
							<span id="jugador1"></span>
						</div>
						<div class="col-md-6" style="text-align: center;">
							<label><h4>JUGADOR2</h4></label>
							<br>
							<span id="jugador2"></span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-2">
							<label><h4>SET1</h4></label>
							<br>
							<span id="idset1jug1"></span>
						</div>
						<div class="col-md-4">
							<label><h4>SET2</h4>
							</label>
							<br>
							<span id="idset2jug1"></span>
						</div>
						<div class="col-md-2" >
							<label> <h4>SET1</h4>
							</label>
							<br>
							<span id="idset1jug2"></span>
						</div>	
						<div class="col-md-2" >
							<label><h4>SET2</h4>
							</label>
							<br>
							<span id="idset2jug2"></span>
						</div>
						<div class="col-md-2"></div>
					</div>
					<div class="divider" style="border:1px solid black;"></div>
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-6" style="text-align: center;">
							<label><h4>TIEBREAK</h4>
							</label>
							<br>
							<span id="idtiebreak"></span>
						</div>	
						<div class="col-md-3"></div>
					</div>
					<div class="divider" style="border:1px solid black;"></div>
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-6" style="text-align: center;">
							<label><h4>GANADOR</h4>
							</label>
							<br>
							<span id="idganador" style="color:red"></span>
						</div>	
						<div class="col-md-3"></div>
					</div>
					<br>
				</div>
				<div class="col-md-1"></div>
				
			</div>
			<div class="modal-footer">
				<center>
					<button type="button" style="" class="btn btn-info btn-expand" data-dismiss="modal">Cerrar</button>
				</center>
			</div>
		</div>
	</div>
</div>

<div class="modal fade bs-example-modal-lg" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form id="editarP" name="editarP">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"><center>Modificar partidos</center></h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6 form-input">
							<input id="idPartidoE" name="idPartidoE" type="hidden">
							<label class="control-label">Fecha</label>
							<input class="form-control" name="fechaE" id="fechaE" type="datetime">
						</div>
						<div class="col-md-6 form-input">
							<label class="control-label">Lugar</label>
							<input class="form-control" name="lugarE" id="lugarE" type="text">
						</div>
						<div class="col-md-6 form-group">
							<label class="control-label">Jugador uno</label>
							<select id="jugador1E" name="jugador1E" class="chosen-select mb-15" tabindex="-1" style="display: none;">
								<option value="" disabled >Seleccione un jugador</option>';
								<?php foreach ($this->mdl_partidos->listarPersona() as $juga) { ?>
								<option value="<?= $juga->IdJugadorCuadro?>"><?= $juga->nombrecom ?></option>';
								<?php }?>
							</select>
						</div>  
						<div class="col-md-6 form-group">
							<label class="control-label">Jugador uno</label>
							<select id="jugador2E" name="jugador2E" class="chosen-select mb-15" tabindex="-1" style="display: none;">
								<option value="" disabled >Seleccione un jugador</option>';
								<?php foreach ($this->mdl_partidos->listarPersona() as $juga) { ?>
								<option value="<?= $juga->IdJugadorCuadro?>"><?= $juga->nombrecom ?></option>';
								<?php }?>
							</select>
						</div>  


						<div class="clearfix"></div>
					</div>
				</div>
				<div class="modal-footer">
					<center>
						<button type="reset" class="btn btn-danger btn-expand" style="background-color: #2A2A2A;" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-success btn-expand" style="background-color: #2A2A2A;">Modificar partidos</button>
					</center>
				</div>
			</form>
		</div>
	</div>
</div>