<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materialclase extends CI_Controller {

 
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_material');
		
	}

	public function index()
	{
		$iIdclase = $this->input->get('idclase');
		if (!$this->session->userdata('usuario_id')) 
		{
			redirect('login');
		}
       
        
		$data['cpersona'] = $this->mdl_login->cargarUsuario();
		foreach ($this->mdl_material->cargarClase_id($iIdclase) as $infoClase) 
			{
				$data['titulo'] = 'Gestión de Clases - ' . $infoClase->NombreClase; 
				$data['nombreClase'] = $infoClase->NombreClase . ' - ' . $infoClase->Dia; 
				$data['idClase'] = $infoClase->IdClase;
				$data['nClase'] = $infoClase->NombreClase;
				break;
			}
		$data['titulo'] = 'Gestion de Materiales clases';
		$this->load->view('msp/cabecera', $data);
		$this->load->view('materialclase/materialclase');
		$this->load->view('msp/footer');
		$this->load->view('materialclase/add');	
	}

	public function cargarTabla($idClase)
	{
		if ($this->input->is_ajax_request())
		{
			$data = array();
			foreach ($this->mdl_material->cargarTablaMc($idClase) as $mate)
			{
				if ($mate->Estado == 1) 
				{
					$accion = 'Inhabilitar clase';
					$color = ' color: #F13A3A; background-color: #2A2A2A;';
					$estilo = 'danger';
					$estado = '<a style="color: #31B404">Activo</a>';
					$edit = '<a class="btn btn-primary btn-expand" style="color:white; background-color: #2A2A2A;"  href="javascript:void()"  title="Administrar clase" onclick="editarMaterialClase('.$mate->IdMaterialClase.')"><i class="fa fa-pencil"></i></a>';
				}
				else
				{
					$accion = 'Habilitar clase';
					$color = 'color:#81B71A; background-color: #2A2A2A;';
					$estilo = 'success';
					$estado = '<a style="color: #8A0808">Inactivo</a>';
					$edit = '<a class="btn btn-primary btn-expand" style="color:white; background-color: #2A2A2A;" href="javascript:void()" title="Debes tener activa esta clase para poder administrarla." disabled="true"><i class="fa fa-pencil"></i></a>';
				}

				$row = array();
				$row[] = $estado;
				$row[] = $mate->NombreClase;
				$row[] = $mate->DescripcionMaterial;
				$row[] = $mate->Cantidad;
				$row[] = 

				$row[] = '
				<center>
				'.$edit.'
				<a class="btn btn-'.$estilo.' btn-expand" style="'.$color.'" href="javascript:void()" title="'.$accion.'" onclick="variarEstadoMaterialClase('.$mate->IdMaterialClase.')"><i class="fa fa-exchange"></i></a>
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

    public function registrarMaterialClase()
	{
		if ($this->input->is_ajax_request())
		{
			$data = array(
				'Estado'=>1,
				'Cantidad'=>$this->input->post('cantidadR'),
				'IdMaterial'=>$this->input->post('materialR'),
			    'IdClase_deb'=>$this->input->post('claseR'));
			if ($this->mdl_material->registrarMaterialClase($data)) {
				echo "ok";
			} else{
				echo "error";
			}
		} else {
			redirect('error404');
		}

	}

   public function variarEstadoMaterialClases()
	{
		if ($this->input->is_ajax_request())
		{
			$id = $this->input->post('id');
			$estado;
			foreach ($this->mdl_material->listarMaterialClases($id)->result() as $material) {
				if ($material->Estado == 1) 
				{ 
					$estado = 0; 
				} 
				else 
				{ 
					$estado = 1; 
				} 
				break;
			}

			$data = array('Estado' => $estado);

			if ($this->mdl_material->actualizarMaterialClase($id,$data))
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
	public function listarMaterialClase($id)
	{
		if ($this->input->is_ajax_request()) 
		{
			$data = $this->mdl_material->listarMaterialClases($id);
			echo json_encode($data->row());
		} 
		else
		{
			redirect('error404');
		}
	}

    public function modificarMaterialClase()
	{
		if ($this->input->is_ajax_request()) 
		{
			$id = $this->input->post('idMaterialClase');
			$data = array(
				'Cantidad'=>$this->input->post('cantidadE'),
				'IdMaterial'=>$this->input->post('materialE'));
			if($this->mdl_material->actualizarMaterialClase($id,$data))
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