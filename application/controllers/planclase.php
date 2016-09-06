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

		$iIdPC = $this->input->get('idP');
		if ($iIdPC == '')
		{
			$data['titulo'] = 'Gestion de Planes de Clase';
			$this->load->view('msp/cabecera', $data);
			$this->load->view('planclase/planclase');
			$this->load->view('msp/footer');
			$this->load->view('planclase/add');
		}
		else
		{
			$resJugador = $this->mdl_planclase->consultarJugador($iIdPC);
			// $resJugador = $this->mdl_planclase->consultarPlanJugador($iIdPC);
			$jugador = 'Esneider Mejia';
			$data['titulo'] = $jugador . ' - Planes de Clase';
			$this->load->view('msp/cabecera', $data);
			$this->load->view('planclasejug/planclasejug');
			$this->load->view('msp/footer');
			$this->load->view('planclasejug/add');
		}
	}

	public function cargarTablaGeneral()
	{
		if ($this->input->is_ajax_request())
		{
			# code...
		}
		else
		{
			redirect('error404');
		}
	}

}

/* End of file planclase */
/* Location: ./application/controllers/planclase */