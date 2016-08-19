<div class="header-content">
	<h2>Partido numero : <?= $IdPartidotennis ?></h2>
	<div class="breadcrumb-wrapper hidden-xs">
		<span class="label">Estas en:</span>
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="menu">Menú principal</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li>
				<a href="clase">Gestión de partidos</a> 
				<i class="fa fa-angle-right"></i>
			</li>
			<li class="active">
				<a href="#">Partido numero : <?= $IdPartidotennis ?></a>
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
						<a href="partidos"><button type="button" class="btn btn-success btn-expand" style="background-color: #2A2A2A;">Terminar edición</button></a>
					</center>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="panel rounded shadow no-overflow">
				<div class="panel-heading">
					<div class="pull-left">
						<h2 class="panel-title">Información de los partidos</h2>
					</div>
					<div class="pull-right">
						<button class="btn btn-sm" data-container="body" data-action="collapse" data-toggle="tooltip" data-placement="top" data-title="Collapse" data-original-title="" title=""><i class="fa fa-angle-up"></i></button>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-body no-padding" style="margin: 20px; font-size: 15px">
					<form id="gpartidos" name="gpartidos">
						<input type="hidden" name="IdPartidotennis" id="IdPartidotennis" value="<?= $IdPartidotennis ?>">
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<div class="row">
									<center><h1>EDITAR PARTIDOS</h1></center>
									<div class="col-md-6 form-group">
										<label class="control-label">Nombre del lugar</label>
										<input id="lugar" name="lugar" class="form-control" type="text" style="text-align: center; border:1px solid black;" value="<?= $lugar ?>">
									</div>
									<div class="col-md-6 form-group">
										<label class="control-label">Nombre cuadro</label>
										<input id="cuadro" name="cuadro" class="form-control" type="text" style="text-align: center; border:1px solid black;" value="<?= $cuadro ?>" disabled >
									</div>
									<div class="col-md-6 form-group">
										<label class="control-label">Nombre del jugador1</label>
										<input id="jugador1" name="jugador1" class="form-control" type="text" style="text-align: center; border:1px solid black;" value="<?= $jugador1 ?>" disabled >
									</div>
									<div class="col-md-6 form-group">
										<label class="control-label">Nombre del jugador2</label>
										<input id="jugador2" name="jugador2" class="form-control" type="text" style="text-align: center; border:1px solid black;" value="<?= $jugador2 ?>" disabled>
									</div>
									<div class="col-md-6 form-group">
										<label class="control-label">Set1</label>
										<input id="setprimero" name="setprimero" class="form-control" type="text" style="text-align: center; border:1px solid black;" value="<?= $setprimero ?>">
									</div>
									<div class="col-md-6 form-group">
										<label class="control-label">Set2</label>
										<input id="setsegundo" name="setsegundo" class="form-control" type="text" style="text-align: center; border:1px solid black;" value="<?= $setsegundo ?>" >
									</div>
									<div class="col-md-6 form-group">
										<label class="control-label">Nombre etapa</label>
										<input id="etapa" name="etapa" class="form-control" type="text" style="text-align: center; border:1px solid black;" value="<?= $etapa ?>" disabled>
									</div>
									<div class="col-md-6 form-group">
										<label class="control-label">Tiebreak</label>
										<input id="tiebreak" name="tiebreak" class="form-control" type="text" style="text-align: center; border:1px solid black;" value="<?= $tiebreak ?>">
									</div>
									<div class="col-md-6 form-group">
										<label class="control-label">Ganador</label>
										<input id="ganador" name="ganador" class="form-control" type="text" style="text-align: center; border:1px solid black;" value="<?= $ganador ?>" disabled>
									</div>
									<div class="col-md-6 form-group">
									<label class="control-label">Fecha</label>
									<input id="horario" name="horario" class="form-control" type="datetime" style="text-align: center; border:1px solid black;" value="<?= $horario ?>">
								</div>
						  	</div>
								
							</div>
						</div>
						<br>
						<div class="row">
							<center><button type="submit" class="btn btn-warning btn-expand" style="background-color: #2A2A2A;">Modificar partidos</button></center>
						</div>
					</form>
				</div>
				<br>
			</div>
		</div>
	</div>
</div>
