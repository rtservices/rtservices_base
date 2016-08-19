<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Partidos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_partidos');
		$this->idPartidoActual_principal = ($this->input->get('partidos')) ? $this->input->get('partidos') : null;
	}

	public function index()
	{
		if (!$this->session->userdata('usuario_id')) 
		{
			redirect('login');
		}
		if (is_null($this->idPartidoActual_principal)) {
			$data['cpersona'] = $this->mdl_login->cargarUsuario();
			$data['titulo'] = 'Gestión de partidos';
			$this->load->view('msp/cabecera', $data);
			$this->load->view('partidos/partidos');
			$this->load->view('msp/footer');
			$this->load->view('partidos/add');
		}
		else
		{
			$data['IdPartidotennis'] = $this->idPartidoActual_principal;
			$data['cpersona'] = $this->mdl_login->cargarUsuario();
			foreach ($this->mdl_partidos->cargarTabla2($this->idPartidoActual_principal) as $parti) 
			{
				$data['titulo'] = 'Gestión de Partido'; 
				$data['horario'] = $parti->Horario;
				$data['lugar'] = $parti->Lugar;
				$data['etapa'] = $parti->NombreEtapa;
				$data['cuadro'] = $parti->NombreCuadro;
				$data['categoria'] = $parti->NombreCategoria;
				$data['jugador1'] = $parti->jugadoruno.' '.$parti->apeuno;
				$data['jugador2'] = $parti->jugadordos.' '.$parti->apedos;
				$data['setprimero'] = $parti->Set1Jug1.'/'.$parti->Set1Jug2;
				$data['setsegundo'] = $parti->Set2Jug1.'/'.$parti->Set2Jug2;
				$data['tiebreak'] = $parti->TieBreakJug1.'/'.$parti->TieBreakJug2;
				$data['IdPartidotennis'] = $parti->IdPartidotennis;
				if ($parti->Set2Jug1+$parti->Set1Jug1 > $parti->Set1Jug2+$parti->Set2Jug2 || $parti->TieBreakJug1 > $parti->TieBreakJug2)
				{
					$data['ganador']= $parti->jugadoruno.' '.$parti->apeuno;
				}
				else 
				{
                    $data['ganador']= $parti->jugadordos.' '.$parti->apedos;
				}
				break;
			}
			$this->load->view('msp/cabecera', $data);
			$this->load->view('partidos/gesPartidos', $data);
			$this->load->view('msp/footer');
			$this->load->view('partidos/addGP');
		}

		
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
					<a class="btn btn-lg primary btn-expand" style="color:white; background-color: #2A2A2A;" href="partidos?partidos='.$parti->IdPartidotennis.'" title="Administrar partidos"><i class="fa fa-pencil"></i></a>
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
			$id = $this->input->post('IdPartidotennis');
			$data = array(
				'Horario' =>$this->input->post('horario'),
				'Lugar' =>$this->input->post('lugar'),
				'IdJugadorCuadro_detJug1' =>$this->input->post('jugador1'),
				'IdJugadorCuadro_detJug2' =>$this->input->post('jugador2')
				);

			if ($this->mdl_partidos->actualizarPartidos($id, $data))
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

}