<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resultados extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_partidos');
	}

	public function index()
	{
		if (!$this->session->userdata('usuario_id')) 
		{
			redirect('login');
		}
		$data['titulo'] = 'Gestión de resultados';
		$this->load->view('msp/cabecera', $data);
		$this->load->view('resultados/resultados');
		$this->load->view('msp/footer');
		$this->load->view('resultados/add');
	}
    public function cargarTabla()
	{
		$data = array();
		if ($this->input->is_ajax_request())
		{
			foreach ($this->mdl_partidos->cargarTabla() as $parti)
			{
				$row = array();
				
				$row[] = $parti->jugadoruno.' '.$parti->apeuno;
				$row[] = $parti->jugadordos.' '.$parti->apedos;
				$row[] = $parti->Set1Jug1.'/'.$parti->Set1Jug2;
				$row[] = $parti->Set2Jug1.'/'.$parti->Set2Jug2;
				$row[] = $parti->TieBreakJug1.'/'.$parti->TieBreakJug2;
				if ($parti->Set2Jug1+$parti->Set1Jug1 > $parti->Set1Jug2+$parti->Set2Jug2 || $parti->TieBreakJug1 > $parti->TieBreakJug2)
				{
					$row[]= $parti->jugadoruno.' '.$parti->apeuno;
				}
				else 
				{
                    $row[]= $parti->jugadordos.' '.$parti->apedos;
				}
	
				$data[] = $row;
			}
			$output = array("data" => $data);

			echo json_encode($output);
		} else 
		{
			redirect('error404');
		}
	}

		public function listarPartidos()
	{
		if ($this->input->is_ajax_request())
		{
			$id = $this->input->post('id');
			$data = $this->mdl_partidos->listarInformacionPartidos($id);
			echo json_encode($data->row());
		}
		else
		{
			redirect('error404');
		}
	}

}