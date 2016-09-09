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
