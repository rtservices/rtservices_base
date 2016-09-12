<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Planclase extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_planclase');
	}

	public function index()
	{
		if (!$this->session->userdata('usuario_id')) 
		{
			redirect('login');
		}

		$iIdPC = $this->input->get('idPc');
		if ($iIdPC)
		{
			$resJugador = $this->mdl_planclase->consultarJugador($iIdPC);
			// $jugador = 'DNI ' . $resJugador->Documento . ' | ' . $resJugador->Nombre . ' ' . $resJugador->Apellidos;
			$data['nomJugador'] = $resJugador->Nombre . ' ' . $resJugador->Apellidos;
			$data['IdJugador'] = $resJugador->IdPersonaRol;
			$data['titulo'] = 'Planes de Clase';
			$this->load->view('msp/cabecera', $data);
			$this->load->view('planclase/planclase');
			$this->load->view('msp/footer');
			$this->load->view('planclase/add');
		}
		else
		{
			redirect('persona');
		}
	}

	public function cargarTabla($iIdPlanclase)
	{
		if ($this->input->is_ajax_request())
		{
			$data = array();
			foreach ($this->mdl_planclase->cargarTablaPC($iIdPlanclase) as $resPC)
			{
				$row = array();

				if ($resPC->Estado == 1) 
				{
					$accion = '';
					$color = '';
					$clase = 'danger';
					$estado = 'Activo';
					$edit = '<a class="btn btn-primary btn-lg btn-expand" style="color:white; background-color: #2A2A2A;" href="javascript:void()" title="Editar responsable de jugador" onclick="editarresJug('.$resPC->IdPlanClase.')"><i class="fa fa-pencil"></i></a>';
				}
				else
				{
					$color = 'color:#81B71A; background-color: #2A2A2A;';
					$clase = 'success';
					$estado = 'Terminado';
					$edit = '<a class="btn btn-primary btn-lg btn-expand" style="color:white; background-color: #2A2A2A;" href="javascript:void()" title="Debes tener activa esta responsable de jugador para poder editarlo." disabled="true"><i class="fa fa-pencil"></i></a>';
				}
				$row = array();
				$row[] = $estado;
				$row[] = $resPC->FechaInicio;
				$row[] = $resPC->FechaInicio;

				$row[] = '
				<center>
					'.$edit.'
					<a class="btn btn-'.$clase.' btn-lg btn-expand" style="color: #F13A3A; background-color: #2A2A2A;" href="javascript:void()" title="Eliminar este plan de clase" onclick="eliminarPC('.$resPC->IdPlanClase.')"><i class="fa fa-close"></i></a>
				</center>';

				$data[] = $row;
			}
			$output = array("data" => $data);

			echo json_encode($output);
		}
		else
		{
			redirect('error404');
		}
	}

}

/* End of file planclase */
/* Location: ./application/controllers/planclase */