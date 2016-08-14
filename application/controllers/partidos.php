<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Partidos extends CI_Controller {

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
		$data['titulo'] = 'Gestión de partidos';
		$this->load->view('msp/cabecera', $data);
		$this->load->view('partidos/partidos');
		$this->load->view('msp/footer');
		$this->load->view('partidos/add');
	}

	public function cargarTabla()
	{
		$data = array();
		if ($this->input->is_ajax_request())
		{
			foreach ($this->mdl_partidos->cargarTabla() as $parti)
			{
				$row = array();
				$row[] = $parti->Horario;
				$row[] = $parti->Lugar;
				$row[] = $parti->NombreEtapa;
				$row[] = $parti->NombreCuadro;
				$row[] = $parti->NombreCategoria;
				$row[] = $parti->jugadoruno.' vs '.$parti->jugadordos.' '.$parti->apedos;
				$row[] = '
				<center>
                <a class="btn btn-lg btn-primary btn-expand" style="background-color: #2A2A2A;"" title="resultados de los partidos" href="javascript:void()" onclick="listarPartidos('.$parti->IdPartidotennis.');"><i class="fa fa-eye"></i></a>
                  <a class="btn btn-lg btn-primary btn-expand" style="background-color: #2A2A2A;"" title="resultados de los partidos" href="javascript:void()" onclick="cargarPartidos('.$parti->IdPartidotennis.');"><i class="fa fa-pencil"></i></a>

                 <a class="btn btn-lg btn-danger btn-expand" style="background-color: #2A2A2A;"" title="eliminar partidos" href="javascript:void()" onclick="eliminarPartido('.$parti->IdPartidotennis.');"><i class="fa fa-archive"></i></a>

				</center>
				';
	
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
			$data = $this->mdl_partidos->listarPartidos($id);
			echo json_encode($data->row());
		}
		else
		{
			redirect('error404');
		}
	}

	public function eliminarPartidos()
	{
		if ($this->input->is_ajax_request())
		{
			$id = $this->input->post('id');
			if ($this->mdl_partidos->eliminarPartidos($id))
			{
				echo "ok";
			}
			else
			{
				echo "no";
			}
		}
		else
		{
			redirect('error404');
		}
	}

	public function editarPartidos()
	{
		if ($this->input->is_ajax_request()) 
		{
			$id = $this->input->post('idPartidoE');
			$data = array(
				'Horario' =>$this->input->post('fechaE'),
				'Lugar' =>$this->input->post('lugarE'),
				'IdJugadorCuadro_detJug1' =>$this->input->post('jugador1E'),
				'IdJugadorCuadro_detJug2' =>$this->input->post('jugador2E')
				);
			if($this->mdl_partidos->actualizarPartidos($id,$data))
			{
				echo "ok";
			} else
			{
				echo "error";
			}
		} else
		{
			redirect('error404');
		}
	}


}