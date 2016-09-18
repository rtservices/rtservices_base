<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asistencia extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_asistencia');
	}

	public function index()
	{
		$data['titulo'] = 'Gestión de Asistencia';
		if (!$this->session->userdata('usuario_id')) 
		{
			redirect('login');
		}
	
		else
		{
			$this->load->view('msp/cabecera', $data);
			$this->load->view('asistencia/asistencia', $data);
			$this->load->view('msp/footer');
			$this->load->view('asistencia/add');
		}


	}

	public function cargarTabla()
	{
		if ($this->input->is_ajax_request())
		{
			$data = array();
			foreach ($this->mdl_asistencia->cargarTabla() as $asistencia)
			{
				if ($asistencia->Estado == 1) 
				{
					$accion = 'Inhabilitar clase';
					$color = ' color: #F13A3A; background-color: #2A2A2A;';
					$estilo = 'danger';
					$estado = '<a style="color: #31B404">Activo</a>';
					$edit = '<a class="btn btn-primary btn-expand" style="color:white; background-color: #2A2A2A;" href="clase?clase='.$asistencia->IdClase.'" title="Administrar clase"><i class="fa fa-pencil"></i></a>';
					
				}

				else
				{
					$accion = 'Habilitar clase';
					$color = 'color:#81B71A; background-color: #2A2A2A;';
					$estilo = 'success';
					$estado = '<a style="color: #8A0808">Inactivo</a>';
					$edit = '<a class="btn btn-primary btn-expand" style="color:white; background-color: #2A2A2A;" href="javascript:void()" title="Debes tener activa esta clase para poder administrarla." disabled="true"><i class="fa fa-pencil"></i></a>';
				}

				if ($asistencia->cantidad_jugadores < 10)
				{
					$colorCJ = 'color: #31B404';
				}
				else if ($asistencia->cantidad_jugadores >= 10 && $asistencia->cantidad_jugadores < 14)
				{
					$colorCJ = 'color: #DBA901';
				}
				else if ($asistencia->cantidad_jugadores >= 14)
				{
					$colorCJ = 'color: #FE2E2E';
				}
				
				
				$row = array();
				$row[] = $estado;
				$row[] = $asistencia->NombreClase;
				$row[] = $asistencia->Dia.' - '.$asistencia->HoraInicio .' a '.$asistencia->HoraFinal;
				$row[] = '<a style="'. $colorCJ .'">'.$asistencia->cantidad_jugadores.'</a> inscritos.';

				$row[] = '
				<center>
				<a class="btn btn-info btn-expand" style="color:white; background-color: #2A2A2A;" href="javascript:void()" title="Más información" onclick="listarClases('.$asistencia->IdClase.')"><i class="fa fa-info-circle"></i></a>
				'.$edit.'
				<a class="btn btn-'.$estilo.' btn-expand" style="'.$color.'" href="javascript:void()" title="'.$accion.'" onclick="variarEstadoClase('.$asistencia->IdClase.')"><i class="fa fa-exchange"></i></a>
				</center>';

				$data[] = $row;
			}
			$output = array("data" => $data);

			echo json_encode($output);
		} else 
		{
			redirect('error404');
		}
	}
}

/* End of file clase.php */
/* Location: ./application/controllers/clase.php */
