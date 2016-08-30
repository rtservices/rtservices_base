<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Responsables extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_persona');
	}

	public function index()
	{
		$iIdJugador = $this->input->get('idjug');
		if (!$iIdJugador)
		{
			redirect('persona');
		}
		else if (!$this->session->userdata('usuario_id')) 
		{
			redirect('login');
		}

		$oJugador = $this->mdl_persona->listarPersona($iIdJugador)->row();
		if ($oJugador)
		{
			$data['titulo'] = 'Gestion de responsables';
			$data['idJugador'] = $iIdJugador;
			$data['nomJugador'] = $oJugador->Nombre . ' ' . $oJugador->Apellidos;
			$data['cDia'] = 'Lunes';
			$this->load->view('msp/cabecera', $data);
			$this->load->view('responsables/responsables');
			$this->load->view('msp/footer');
			$this->load->view('responsables/add');
		}
		else
		{
			redirect('persona');
		}
	}

	public function cargarTabla($iIdJugador)
	{
		if ($this->input->is_ajax_request())
		{
			$data = array();
			foreach ($this->mdl_persona->cargarTablaResponsables($iIdJugador) as $resJug)
			{
				$row = array();

				if ($resJug->Estado == 1) 
				{
					$accion = 'Inhabilitar responsable de jugador';
					$color = ' color: #F13A3A; background-color: #2A2A2A;';
					$clase = 'danger';
					$estado = 'Activo';
					$edit = '<a class="btn btn-primary btn-lg btn-expand" style="color:white; background-color: #2A2A2A;" href="javascript:void()" title="Editar responsable de jugador" onclick="editarresJug('.$resJug->IdResponsableJugador.')"><i class="fa fa-pencil"></i></a>';
				}
				else
				{
					$accion = 'Habilitar responsable de jugador';
					$color = 'color:#81B71A; background-color: #2A2A2A;';
					$clase = 'success';
					$estado = 'Inactivo';
					$edit = '<a class="btn btn-primary btn-lg btn-expand" style="color:white; background-color: #2A2A2A;" href="javascript:void()" title="Debes tener activa esta responsable de jugador para poder editarlo." disabled="true"><i class="fa fa-pencil"></i></a>';
				}
				$row = array();
				$row[] = $estado;
				$row[] = 'DNI: ' . $resJug->RDocumento . ' - ' . $resJug->RNombre . ' ' . $resJug->RApellidos;
				$row[] = $resJug->Parentesco;
				$row[] = (!is_null($resJug->Telefono) ? 'Telefono: ' . $resJug->Telefono : '') . ' -  ' . (!is_null($resJug->Celular) ? 'Celular: ' . $resJug->Celular : '');

				$row[] = '
				<center>
					'.$edit.'
					<a class="btn btn-'.$clase.' btn-lg btn-expand" style="'.$color.'" href="javascript:void()" title="'.$accion.'" onclick="variarEstadoresJug('.$resJug->IdResponsableJugador.')"><i class="fa fa-exchange"></i></a>
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

/* End of file responsable.php */
/* Location: ./application/controllers/responsable.php */