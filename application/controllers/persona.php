<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Persona extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_persona');
	}

	public function index()
	{
		if (!$this->session->userdata('usuario_id')) 
		{
			redirect('login');
		}
		$data['titulo'] = 'Gestion de personas';
		$this->load->view('msp/cabecera', $data);
		$this->load->view('persona/persona');
		$this->load->view('msp/footer');
		$this->load->view('persona/add');
	}

	public function cargarTabla()
	{
		if ($this->input->is_ajax_request())
		{

			$data = array();
			$arrol = array();

			foreach ($this->mdl_persona->cargarTabla() as $persona)
			{

				$colorA = '';
				$tituloA = '';
				$colorI = '';
				$tituloI = '';
				$colorJ = '';
				$tituloJ = '';
				$estadoA = '';
				$estadoI = '';
				$estadoJ = '';
				$estiloR = '';
				$colorR = '';

				if ($persona->Estado == 1) 
				{
					$accion = 'Inhabilitar a '.$persona->Nombre.' '.$persona->Apellidos.'';
					$color = 'color: #F13A3A; background-color: #2A2A2A';
					$estilo = 'danger';
					$estado = 'Activo';
					$edit = '<a class="btn btn-primary btn-expand" style="color: white; background-color: #2A2A2A; color: #81B71A;" href="javascript:void()" title="Editar a  '.$persona->Nombre.' '.$persona->Apellidos.'" onclick="listarPersona('.$persona->IdPersona.');"><i class="fa fa-pencil"></i></a>';

					if ($this->session->userdata('ssRol') == 'Administrador') 
					{
						foreach ($this->mdl_persona->listarAllRol($persona->IdPersona) as $roles) 
						{ 
							$arrol[] = $roles->IdRol; 
						}

						if (in_array(2, $arrol) == true && in_array(1, $arrol) == true) 
						{
							$cuenta = '<a class="btn btn-inverse btn-expand" href="javascript:void()" title="Gestionar cuenta de administrador - '.$persona->Nombre.' '.$persona->Apellidos.'" onclick="administrarCuenta('.$persona->IdPersona.',1);"><i class="fa fa-key" style="color: #01B1E1"></i></a>';
							$responsable = '<a class="btn btn-danger btn-expand" disabled style="color: white; background-color: #2A2A2A" href="javascript:void()" title="Ni administradores ni instructores pueden tener responsables." ><i class="fa fa-users"></i></a>';
							$planclase = '<a class="btn btn-danger btn-expand" disabled style="color: white; background-color: #2A2A2A" href="javascript:void()" title="Ni administradores ni instructores pueden tener un plan de clases asociado." ><i class="fa fa-credit-card"></i></a>';
						}
						else if (in_array(2, $arrol) == true) 
						{
							$cuenta = '<a class="btn btn-inverse btn-expand" href="javascript:void()" title="Gestionar cuenta de instructor - '.$persona->Nombre.' '.$persona->Apellidos.'" onclick="administrarCuenta('.$persona->IdPersona.',2);"><i class="fa fa-key" style="color: #01B1E1"></i></a>';
							$responsable = '<a class="btn btn-danger btn-expand" disabled style="color: white; background-color: #2A2A2A" href="javascript:void()" title="Ni administradores ni instructores pueden tener responsables." ><i class="fa fa-users"></i></a>';
							$planclase = '<a class="btn btn-danger btn-expand" disabled style="color: white; background-color: #2A2A2A" href="javascript:void()" title="Ni administradores ni instructores pueden tener un plan de clases asociado." ><i class="fa fa-credit-card"></i></a>';
						}
						else if(in_array(1, $arrol) == true)
						{
							$cuenta = '<a class="btn btn-inverse btn-expand" href="javascript:void()" title="Gestionar cuenta de administrador - '.$persona->Nombre.' '.$persona->Apellidos.'" onclick="administrarCuenta('.$persona->IdPersona.',1);"><i class="fa fa-key" style="color: #01B1E1"></i></a>';
							$responsable = '<a class="btn btn-danger btn-expand" disabled style="color: white; background-color: #2A2A2A" href="javascript:void()" title="Ni administradores ni instructores pueden tener responsables." ><i class="fa fa-users"></i></a>';
							$planclase = '<a class="btn btn-danger btn-expand" disabled style="color: white; background-color: #2A2A2A" href="javascript:void()" title="Ni administradores ni instructores pueden tener un plan de clases asociado." ><i class="fa fa-credit-card"></i></a>';
						}
						else if (in_array(3, $arrol) == true) 
						{
							$responsable = '<a class="btn btn-success btn-expand" style="color: white; background-color: #2A2A2A" href="javascript:void()" title="Gestionar responsable de '.$persona->Nombre.' '.$persona->Apellidos.'." onclick="listarResponsables('.$persona->IdPersona.');"><i class="fa fa-users"></i></a>';
							$planclase = '<a class="btn btn-info btn-expand" style="color: white; background-color: #2A2A2A" href="javascript:void()" title="Gestionar plan clase de '.$persona->Nombre.' '.$persona->Apellidos.'." onclick="listarPlanclase('.$persona->IdPersona.');"><i class="fa fa-credit-card"></i></a>';
							$cuenta = '<a class="btn btn-inverse btn-expand" disabled title="Debes tener activo un rol Administrador o Instructor a  '.$persona->Nombre.' '.$persona->Apellidos.' para poder gestionar su cuenta."><i class="fa fa-key" style="color: #01B1E1"></i></a>';
						}
						else
						{
							$cuenta = '<a class="btn btn-inverse btn-expand" disabled title="Debes tener activo un rol Administrador o Instructor a  '.$persona->Nombre.' '.$persona->Apellidos.' para poder gestionar su cuenta."><i class="fa fa-key" style="color: #01B1E1"></i></a>';
						}

						$arrol = array();
					}
					else
					{
						if ($persona->IdPersona != $this->session->userdata('usuario_id')) 
						{

							foreach ($this->mdl_persona->listarAllRol($persona->IdPersona) as $roles) 
							{ 
								$arrol[] = $roles->IdRol; 
							}

							if (in_array(2, $arrol) == true && in_array(1, $arrol) == true) 
							{
								$cuenta = '<a class="btn btn-inverse btn-expand" href="javascript:void()" disabled="true" title="No puedes gestionar cuentas de otros usuarios."><i class="fa fa-key" style="color: #01B1E1"></i></a>';
								$responsable = '<a class="btn btn-danger btn-expand" disabled style="color: white; background-color: #2A2A2A" href="javascript:void()" title="Ni administradores ni instructores pueden tener responsables." ><i class="fa fa-users"></i></a>';
								$planclase = '<a class="btn btn-danger btn-expand" disabled style="color: white; background-color: #2A2A2A" href="javascript:void()" title="Ni administradores ni instructores pueden tener un plan de clases asociado." ><i class="fa fa-credit-card"></i></a>';
							}
							else if (in_array(2, $arrol) == true) 
							{
								$cuenta = '<a class="btn btn-inverse btn-expand" href="javascript:void()" disabled="true" title="No puedes gestionar cuentas de otros usuarios."><i class="fa fa-key" style="color: #01B1E1"></i></a>';
								$responsable = '<a class="btn btn-danger btn-expand" disabled style="color: white; background-color: #2A2A2A" href="javascript:void()" title="Ni administradores ni instructores pueden tener responsables." ><i class="fa fa-users"></i></a>';
								$planclase = '<a class="btn btn-danger btn-expand" disabled style="color: white; background-color: #2A2A2A" href="javascript:void()" title="Ni administradores ni instructores pueden tener un plan de clases asociado." ><i class="fa fa-credit-card"></i></a>';
							}
							else if(in_array(1, $arrol) == true)
							{
								$cuenta = '<a class="btn btn-inverse btn-expand" href="javascript:void()" disabled="true" title="No puedes gestionar cuentas de otros usuarios."><i class="fa fa-key" style="color: #01B1E1"></i></a>';
								$responsable = '<a class="btn btn-danger btn-expand" disabled style="color: white; background-color: #2A2A2A" href="javascript:void()" title="Ni administradores ni instructores pueden tener responsables." ><i class="fa fa-users"></i></a>';
								$planclase = '<a class="btn btn-danger btn-expand" disabled style="color: white; background-color: #2A2A2A" href="javascript:void()" title="Ni administradores ni instructores pueden tener un plan de clases asociado." ><i class="fa fa-credit-card"></i></a>';
							}
							else if (in_array(3, $arrol) == true) 
							{
								$responsable = '<a class="btn btn-success btn-expand" style="color: white; background-color: #2A2A2A" href="javascript:void()" title="Gestionar responsables de '.$persona->Nombre.' '.$persona->Apellidos.'." onclick="listarResponsables('.$persona->IdPersona.');"><i class="fa fa-users"></i></a>';
								$planclase = '<a class="btn btn-info btn-expand" style="color: white; background-color: #2A2A2A" href="javascript:void()" title="Gestionar plan clase de '.$persona->Nombre.' '.$persona->Apellidos.'." onclick="listarPlanclase('.$persona->IdPersona.');"><i class="fa fa-credit-card"></i></a>';
							}
							else
							{
								$cuenta = '<a class="btn btn-inverse btn-expand" disabled title="Debes tener activo un rol Administrador o Instructor a  '.$persona->Nombre.' '.$persona->Apellidos.' para poder gestionar su cuenta."><i class="fa fa-key" style="color: #01B1E1"></i></a>';
							}							

							$arrol = array();
						}
						else
						{
							$responsable = '<a class="btn btn-danger btn-expand" disabled style="color: white; background-color: #2A2A2A" href="javascript:void()" title="Ni administradores ni instructores pueden tener responsables." ><i class="fa fa-users"></i></a>';
						}
					}
				}
				else
				{
					$accion = 'Habilitar a  '.$persona->Nombre.' '.$persona->Apellidos.'';
					$color = 'background-color: #2A2A2A; color: #81B71A;';
					$estado = 'Inactivo';
					$estilo = 'success';
					$edit = '<a class="btn btn-primary btn-expand" style="color: white; background-color: #2A2A2A;" title="Debes tener activo a '.$persona->Nombre.' para poder editarlo." disabled="true"><i class="fa fa-pencil"></i></a>';
					$cuenta = '<a class="btn btn-inverse btn-expand" disabled title="Debes tener activo a  '.$persona->Nombre.' '.$persona->Apellidos.' para poder gestionar su cuenta."><i class="fa fa-key" style="color: #01B1E1"></i></a>';
					$estadoA = ' disabled ';
					$estadoI = ' disabled ';
					$estadoJ = ' disabled ';
				}

				if ($persona->IdPersona == 1 && $this->session->userdata('ssRol') != 'Administrador')
				{
					$edit = '<a class="btn btn-primary btn-expand" style="color: white; background-color: #2A2A2A;" title="No puedes modificar la información de '.$persona->Nombre.' por ser el usuario principal." disabled="true"><i class="fa fa-pencil"></i></a>';
				}

				if ($persona->IdPersona == 1) 
				{
					$planclase = '<a class="btn btn-danger btn-expand" disabled style="color: white; background-color: #2A2A2A" href="javascript:void()" title="Ni administradores ni instructores pueden tener un plan de clases asociado." ><i class="fa fa-credit-card"></i></a>';
					$eliminar = '<a class="btn btn-danger btn-expand" disabled style="color: #F13A3A; background-color: #2A2A2A" href="javascript:void()" title="Este Administrador no se puede inhabilitar." ><i class="fa fa-exchange"></i></a>';					
					$responsable = '<a class="btn btn-danger btn-expand" disabled style="color: white; background-color: #2A2A2A" href="javascript:void()" title="Ni administradores ni instructores pueden tener responsables." ><i class="fa fa-users"></i></a>';
					$estadoA = 'disabled';
					$estadoI = 'disabled';
					$estadoJ = 'disabled';
					$colorA = '#81B71A';
					$colorI = '#81B71A';
					$colorJ = '#81B71A';
					$tituloA = 'No se le puede desactivar rol administrador a '.$persona->Nombre.' '.$persona->Apellidos.'.';
					$tituloI = 'No se le puede desactivar rol instructor a '.$persona->Nombre.' '.$persona->Apellidos.'.';
					$tituloJ = 'No se le puede desactivar rol jugador a '.$persona->Nombre.' '.$persona->Apellidos.'';
				}
				else if ($persona->IdPersona == $this->session->userdata('usuario_id')) 
				{
					$planclase = '<a class="btn btn-danger btn-expand" disabled style="color: white; background-color: #2A2A2A" href="javascript:void()" title="Ni administradores ni instructores pueden tener un plan de clases asociado." ><i class="fa fa-credit-card"></i></a>';
					$eliminar = '<a class="btn btn-danger btn-expand" disabled style="color: #F13A3A; background-color: #2A2A2A" href="javascript:void()" title="Este Administrador no se puede inhabilitar." ><i class="fa fa-exchange"></i></a>';					
					$responsable = '<a class="btn btn-danger btn-expand" disabled style="color: white; background-color: #2A2A2A" href="javascript:void()" title="Ni administradores ni instructores pueden tener responsables." ><i class="fa fa-users"></i></a>';
					$estadoA = 'disabled';
					$estadoI = 'disabled';
					$colorA = '#81B71A';
					$colorI = '#81B71A';
					$tituloA = 'No puedes gestionar tus propios permisos como administrador.';
					$tituloI = 'No puedes gestionar tus propios permisos como instructor.';

					foreach ($this->mdl_persona->listarRol($persona->IdPersona,3) as $rol) 
					{
						if ($rol->IdRol == 3 && $rol->Estado == 1)
						{
							$colorJ = '#81B71A';
							$tituloJ = 'Desactivar rol jugador a '.$persona->Nombre.' '.$persona->Apellidos.'';
						}
						else if ($rol->IdRol == 3 && $rol->Estado == 0)
						{
							$colorJ = '#FFFFFF';
							$tituloJ = 'Activar rol jugador a '.$persona->Nombre.' '.$persona->Apellidos.'';
						}
						else
						{
							$colorJ = null;
							$tituloJ = null;
						}
					}

					$estadoJ = 'onclick="variarJugador('.$persona->IdPersona.');"';

				}
				else
				{	
					$planclase = '<a class="btn btn-info btn-expand" style="color: white; background-color: #2A2A2A" href="javascript:void()" title="Gestionar plan clase de '.$persona->Nombre.' '.$persona->Apellidos.'." onclick="listarPlanclase('.$persona->IdPersona.');"><i class="fa fa-credit-card"></i></a>';	
					$eliminar = '<a class="btn btn-'.$estilo.' btn-expand" style="'.$color.'" href="javascript:void()" title="'.$accion.'" onclick="variarEstadoPersona('.$persona->IdPersona.');"><i class="fa fa-exchange"></i></a>';

					if ($this->session->userdata('ssRol') == 'Administrador') //Sirve para validar que sea instructor o administrador
					{

						foreach ($this->mdl_persona->listarRol($persona->IdPersona,1) as $rol)
						{
							if ($rol->IdRol == 1 && $rol->Estado == 1)
							{
								$colorA = '#81B71A';
								$tituloA = 'Desactivar rol administrador a '.$persona->Nombre.' '.$persona->Apellidos.'.';
							}
							else if ($rol->IdRol == 1 && $rol->Estado == 0)
							{
								$colorA = '#FFFFFF';
								$tituloA = 'Activar rol administrador a '.$persona->Nombre.' '.$persona->Apellidos.'.';
							}
							else
							{
								$colorA = null;
								$tituloA = null;
							}
						}

						foreach ($this->mdl_persona->listarRol($persona->IdPersona,2) as $rol) 
						{
							if ($rol->IdRol == 2 && $rol->Estado == 1)
							{
								$colorI = '#81B71A';
								$tituloI = 'Desactivar rol instructor a '.$persona->Nombre.' '.$persona->Apellidos.'.';
							}
							else if ($rol->IdRol == 2 && $rol->Estado == 0)
							{
								$colorI = '#FFFFFF';
								$tituloI = 'Activar rol instructor a '.$persona->Nombre.' '.$persona->Apellidos.'.';
							}
							else
							{
								$colorI = null;
								$tituloI = null;
							}
						}

						foreach ($this->mdl_persona->listarRol($persona->IdPersona,3) as $rol) 
						{
							if ($rol->IdRol == 3 && $rol->Estado == 1)
							{
								$colorJ = '#81B71A';
								$tituloJ = 'Desactivar rol jugador a '.$persona->Nombre.' '.$persona->Apellidos.'';
							}
							else if ($rol->IdRol == 3 && $rol->Estado == 0)
							{
								$colorJ = '#FFFFFF';
								$tituloJ = 'Activar rol jugador a '.$persona->Nombre.' '.$persona->Apellidos.'';
								$responsable = '<a class="btn btn-danger btn-expand" disabled style="color: white; background-color: #2A2A2A" href="javascript:void()" title="Debes tener asociado a '.$persona->Nombre.' '.$persona->Apellidos.' como un jugador para poder gestionar sus responsables." ><i class="fa fa-users"></i></a>';
							}
							else
							{
								$colorJ = null;
								$tituloJ = null;
							}
						}

						$estadoA = 'onclick="variarAdministrador('.$persona->IdPersona.');"';
						$estadoI = 'onclick="variarInstructor('.$persona->IdPersona.');"';
						$estadoJ = 'onclick="variarJugador('.$persona->IdPersona.');"';
					}
					else
					{
						$colorA = '#FFFFFF';
						$tituloA = 'No puedes gestionar Administradores.';
						$colorI = '#FFFFFF';
						$tituloI = 'No puedes gestionar Instructores.';
						$estadoA = 'disabled';
						$estadoI = 'disabled';
						$estadoJ = 'onclick="variarJugador('.$persona->IdPersona.');"';

						foreach ($this->mdl_persona->listarRol($persona->IdPersona,3) as $rol) 
						{
							if ($rol->IdRol == 3 && $rol->Estado == 1)
							{
								$colorJ = '#81B71A';
								$tituloJ = 'Desactivar rol jugador a '.$persona->Nombre.' '.$persona->Apellidos.'';
							}
							else if ($rol->IdRol == 3 && $rol->Estado == 0)
							{
								$colorJ = '#FFFFFF';
								$tituloJ = 'Activar rol jugador a '.$persona->Nombre.' '.$persona->Apellidos.'';
								$responsable = '<a class="btn btn-danger btn-expand" disabled style="color: white; background-color: #2A2A2A" href="javascript:void()" title="Debes tener asociado a '.$persona->Nombre.' '.$persona->Apellidos.' como un jugador para poder gestionar sus responsables." ><i class="fa fa-users"></i></a>';
							}
							else
							{
								$colorJ = null;
								$tituloJ = null;
							}
						}
					}
				}

				if ($persona->Estado == 0)
				{
					$estadoA = ' disabled ';
					$estadoI = ' disabled ';
					$estadoJ = ' disabled ';
				}

				$row = array();
				$row[] = $estado;
				$row[] = $persona->Documento;
				$row[] = $persona->Nombre.' '.$persona->Apellidos;
				$row[] = '
				<center>
					<a class="btn btn-inverse btn-expand" href="javascript:void()" title="'.$tituloA.'" '.$estadoA.' ><i class="fa fa-user-secret" style="color: '.$colorA.'"></i></a>
					<a class="btn btn-inverse btn-expand" href="javascript:void()" title="'.$tituloI.'" '.$estadoI.' ><i class="fa fa-graduation-cap" style="color: '.$colorI.'"></i></a>
					<a class="btn btn-inverse btn-expand" href="javascript:void()" title="'.$tituloJ.'" '.$estadoJ.' ><i class="fa fa-gamepad" style="color: '.$colorJ.'"></i></a>
				</center>';

				$row[] = '
				<center>
					'.$responsable.'
					'.$cuenta.'
					'.$planclase.'
				</center>';

				$row[] = '
				<center>
					<a class="btn btn-info btn-expand" style="background-color: #2A2A2A; color: #81B71A;" href="javascript:void()" title="Mas información" onclick="listarInformacion('.$persona->IdPersona.');"><i class="fa fa-info"></i></a>
					'.$edit.'
					'.$eliminar.'
				</center>';

				$data[] = $row;
			}

			$output = array(
				"data" => $data
				);

			echo json_encode($output);
		}
		else
		{
			redirect('error404');
		}
	}

	public function nuevaPersona()
	{
		if ($this->input->is_ajax_request())
		{
			$data = array(
				'Documento' => $this->input->post('documento'),
				'Nombre' => $this->input->post('nombre'),
				'Apellidos' => $this->input->post('apellidos'),
				'Genero' => $this->input->post('genero'),
				'Correo' => $this->input->post('correo'),
				'DireccionResidencia' => $this->input->post('direccion'),
				'Telefono' => $this->input->post('telefono'),
				'Celular' => $this->input->post('celular'),
				'FechaNacimiento' => $this->input->post('fnacimiento'),
				'IdEps' => $this->input->post('eps'),
				'FechaIngreso' => date("Y").'-'.date("m").'-'.date("d"),
				'Estado' => 1
				);

			$id = $this->mdl_persona->nuevaPersona($data);

			if (!empty($id))
			{
				$dataA = array('IdPersona_deb' => $id, 'IdRol' => 1, 'Estado' => 0);

				if ($this->mdl_persona->registrarRol($dataA))
				{
					$dataI = array('IdPersona_deb' => $id, 'IdRol' => 2, 'Estado' => 0);

					if ($this->mdl_persona->registrarRol($dataI))
					{
						$dataJ = array('IdPersona_deb' => $id, 'IdRol' => 3, 'Estado' => 0);

						if ($this->mdl_persona->registrarRol($dataJ))
						{

							if ($this->mdl_persona->registrarCuentaA($dataC))
							{

								if ($this->mdl_persona->registrarCuentaI($dataCI))
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
								echo "no";
							}
						}
						else
						{
							echo "no";
						}
					}
					else
					{
						echo "no";
					}
				}
				else
				{
					echo "no";
				}
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

	public function listarPersona()
	{
		if ($this->input->is_ajax_request())
		{
			$id = $this->input->post('id');
			$data = $this->mdl_persona->listarPersona($id);
			echo json_encode($data->row());
		}
		else
		{
			redirect('error404');
		}
	}

	public function listarPlanclase()
	{
		if ($this->input->is_ajax_request())
		{
			$id = $this->input->post('id');
			$data = $this->mdl_persona->listarJugador_planclase($id);
			echo json_encode($data);
		}
		else
		{
			redirect('error404');
		}
	}

	public function tablaPlanClase($id)
	{
		if ($this->input->is_ajax_request())
		{
			$data = array();
			foreach ($this->mdl_persona->tablaJugador_planclase($id) as $planclase)
			{
				if ($planclase->Estado == 1) 
				{
					$accion = 'Inhabilitar Plan de Clases';
					$color = ' color: #F13A3A; background-color: #2A2A2A;';
					$clase = 'danger';
					$estado = 'Activo';
				}
				else
				{
					$accion = 'Habilitar Plan de Clases';
					$color = 'color:#81B71A; background-color: #2A2A2A;';
					$clase = 'success';
					$estado = 'Inactivo';
				}

				$row = array();
				$row[] = $estado;
				$row[] = $planclase->FechaInicio;
				$row[] = $planclase->DiasRestantes;


				$row[] = '
				<center>
					<a class="btn btn-'.$clase.' btn-lg btn-expand" style="'.$color.'" href="javascript:void()" title="'.$accion.'" onclick="variarPlanClase('.$planclase->IdPlanClase.')"><i class="fa fa-exchange"></i></a>
				</center>';

				$data[] = $row;
			}
			
			$output = array(
				"data" => $data
				);

			echo json_encode($output);
		}
		else
		{
			redirect('error404');
		}
	}

	public function actualizarPersona()
	{
		if ($this->input->is_ajax_request())
		{
			$id = $this->input->post('idpersona');
			$data = array(
				'Documento' => $this->input->post('documentoM'),
				'Genero' => $this->input->post('generoM'),
				'Nombre' => $this->input->post('nombreM'),
				'Apellidos' => $this->input->post('apellidosM'),
				'Correo' => $this->input->post('correoM'),
				'DireccionResidencia' => $this->input->post('direccionM'),
				'Telefono' => $this->input->post('telefonoM'),
				'Celular' => $this->input->post('celularM'),
				'IdEps' => $this->input->post('epsM'),
				'FechaNacimiento' => $this->input->post('fnacimientoM')
				);

			if ($this->mdl_persona->actualizarPersona($id, $data))
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

	// GESTION DE RESPONSABLES

	public function listarResponsable()
	{
		if ($this->input->is_ajax_request())
		{
			$id = $this->input->post('id');
			$data = $this->mdl_persona->listarResponsables($id);

			echo json_encode($data);
		}
		else
		{
			redirect('error404');
		}
	}

	public function cargarResponsables($id)
	{
		if ($this->input->is_ajax_request())
		{
			$data = array();
			foreach ($this->mdl_persona->cargarResponsable($id) as $responsable)
			{
				if ($responsable->Estado == 1) 
				{
					$accion = 'Inhabilitar responsable';
					$color = ' color: #F13A3A; background-color: #2A2A2A;';
					$clase = 'danger';
					$estado = 'Activo';
				}
				else
				{
					$accion = 'Habilitar responsable';
					$color = 'color:#81B71A; background-color: #2A2A2A;';
					$clase = 'success';
					$estado = 'Inactivo';
				}

				$row = array();
				$row[] = $estado;
				$row[] = $responsable->Documento;
				$row[] = $responsable->Nombre.' '.$responsable->Apellidos;
				$row[] = 'Tel: '.$responsable->Telefono.' - Cel: '.$responsable->Celular;


				$row[] = '
				<center>
					<a class="btn btn-'.$clase.' btn-lg btn-expand" style="'.$color.'" href="javascript:void()" title="'.$accion.'" onclick="variarEstadoResponsable('.$responsable->IdResponsableJugador.')"><i class="fa fa-exchange"></i></a>
				</center>';

				$data[] = $row;
			}
			
			$output = array(
				"data" => $data
				);

			echo json_encode($output);
		}
		else
		{
			redirect('error404');
		}
	}

	public function validarRJugador()
	{
		if ($this->input->is_ajax_request())
		{
			$IdResponsable = ($this->input->post('slResponsable')) / 3;
			$IdJugador = $this->input->post('idjugadorR');

			foreach ($this->mdl_persona->listarIdJugador($IdJugador)->result() as $infopersona)
			{

				if($infopersona->IdPersona == $IdResponsable)
				{
					echo "noMU";
				}
				else
				{
					if ($this->mdl_persona->validarRJugador($IdResponsable, $IdJugador)->num_rows() < 1)
					{
						echo "ok";
					}
					else if ($this->mdl_persona->validarRJugador($IdResponsable, $IdJugador)->num_rows() > 0) 
					{
						echo "noYA";
					}
					else
					{
						echo "no";
					}
				}
				break;
			}
		}
		else
		{
			redirect('error404');
		}
	}

	public function asignarResponsable()
	{
		if ($this->input->is_ajax_request())
		{
			$IdResponsable = $this->input->post('slResponsable');
			$ResponsableParentesco = $this->input->post('slRRol');
			$IdJugador = $this->input->post('idjugadorR');

			$data = array(
				'IdPersonaRol_det' => $IdJugador,
				'Parentesco' => $ResponsableParentesco,
				'IdPersona_deb' => $IdResponsable,
				'Estado' => 1
				);

			if ($this->mdl_persona->asignarResponsable($data))
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

    // MODIFICAR CUENTA

	public function listarCuenta()
	{
		if ($this->input->is_ajax_request())
		{
			$id = $this->input->post('id');
			$tipo = $this->input->post('tipo');

			$data = $this->mdl_persona->listarCuenta($id,$tipo);
			if (!empty($data))
			{
				echo json_encode($data);
			}
			else
			{
				$dataPersona = $this->mdl_persona->listarPersona($id);
				foreach ($dataPersona->result() as $oPersona)
				{
					//Se prepara un nuevo nombre para el usuario
					$nombreUsuario = strtolower((count(explode(' ', $oPersona->Nombre))) > 1 ? explode(' ', $oPersona->Nombre)[0] . substr(explode(' ', $oPersona->Nombre)[1], 0, 1) : $oPersona->Nombre);
					$nombreUsuario .= strtolower(substr(explode(' ', $oPersona->Apellidos)[0], 0, 1) . substr(explode(' ', $oPersona->Apellidos)[1], 0, 1) . substr($oPersona->FechaNacimiento, 0,4));
					$passwordUsuario = $oPersona->Documento . substr(strtolower($oPersona->Nombre), 0,3);

					$PersonROl = '';

					foreach($this->mdl_persona->listarPersona_Rol($id) as $oPersonaRol)
					{
						$PersonROl .= ','. $oPersonaRol->IdPersonaRol;
					}

					$dataLogin = array(
						'Usuario' => ucwords($nombreUsuario),
						'Clave' => md5($passwordUsuario),
						'Estado' => 1,
						'IdPersonaRol' => substr($PersonROl, 1),
						'IdPersona' => $id
						);

					if ($this->mdl_persona->registrarCuenta($dataLogin))
					{
						echo json_encode($this->mdl_persona->listarCuenta($id,$tipo));
					}
					else
					{
						echo 'no';
					}

					break;
				}
			}
		}
		else
		{
			redirect('error404');
		}
	}

	public function modificarUsuario()
	{
		if ($this->input->is_ajax_request())
		{
			$id = $this->input->post('idusuarioU');
			$usuario = $this->input->post('usuario');

			$data = array('Usuario' => $usuario);

			if ($this->mdl_persona->actualizarUsuario($id,$data))
			{
				$aData = $this->mdl_persona->listarPersona_notificación($id);
				$res = $this->notificacion($aData, 'informacioncuenta');
				if ($res)
				{
					echo "ok";
				}
				else
				{
					echo $res;
				}
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

	public function modificarClave()
	{
		if ($this->input->is_ajax_request())
		{
			$id = $this->input->post('idusuarioC');
			$clave = $this->input->post('clave');

			$data = array('Clave' => md5($clave));

			if ($this->mdl_persona->actualizarUsuario($id,$data))
			{
				$aData = $this->mdl_persona->listarPersona_notificación($id);
				$res = $this->notificacion($aData, 'informacioncuenta');
				if ($res)
				{
					echo "ok";
				}
				else
				{
					echo $res;
				}
				
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

	// MODIFICAR ESTADOS

	public function variarRol()
	{
		if ($this->input->is_ajax_request())
		{
			$id = $this->input->post('id');
			$idrol = $this->input->post('rol');
			$idPR;
			$estado;
			foreach ($this->mdl_persona->listarRol($id,$idrol) as $rol)
			{
				if ($rol->Estado == 1) { $estado = 0; } else { $estado = 1; }
				$idPR = $rol->IdPersonaRol;
				break;
			}

			$data = array('Estado' => $estado);

			if ($this->mdl_persona->actualizarRol($idPR,$data))
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

	public function variarEstadoPersona()
	{
		if ($this->input->is_ajax_request())
		{
			$id = $this->input->post('idpersona');
			$estado;
			foreach ($this->mdl_persona->listarPersona($id)->result() as $persona) {
				if ($persona->Estado == 1) { $estado = 0; } else { $estado = 1; } 
				break;
			}

			$data = array('Estado' => $estado);

			if ($this->mdl_persona->actualizarPersona($id,$data))
			{
				if ($estado == 0)
				{
					$dataRol = array('Estado' => 0);
					$this->mdl_persona->actualizarRolInactivo($id, $dataRol);
					echo "ok";
				}
				else
				{
					echo "ok";
				}
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

	private function notificacion($correo, $tipo)
	{
		$this->email->initialize(array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'rackettenisservices@gmail.com',
			'smtp_pass' => 'Neiderman18',
			'smtp_port' => 465,
			'crlf' => "\r\n",
			'newline' => "\r\n"
			));


		$tipoNotificacion = '';

		switch ($tipo)
		{
			case 'informacionpersonal':
			$tipoNotificacion = 'Recientemente el administrador de la aplicación ha realizado cambios en tu información personal';
			break;
			case 'informacioncuenta':
			$tipoNotificacion = 'Recientemente el administrador de la aplicación ha realizado cambios en tu información de inicio de sesión';
			break;
			
			default:
			$tipoNotificacion = 'Recientemente el administrador de la aplicación ha realizado cambios que involucran tu información en el sistema';
			break;
		}

		$mensaje = "<html>
		<head>
			<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' >
			<script src='https://code.jquery.com/jquery-2.2.3.min.js'></script>
			<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
		</head>
		<body style='font-family: Agency FB'>
			<div class='row'>
				<div class='col-md-2 col-sm-2 col-xs-2'><br></div>
				<div class='col-md-8 col-sm-8 col-xs-8'>
					<div style='padding: 20px; border-radius: 27px 27px 27px 27px;	-moz-border-radius: 27px 27px 27px 27px; -webkit-border-radius: 27px 27px 27px 27px; border: 18px ridge rgba(150,150,150,0.8); background: rgba(255,255,255,0.7);'>
						<center><img src='http://rtservicesv-nman.rhcloud.com/assets/img/logo-vertical.png'></center>
						<br>
						<center><h2 style='font-size: 25pt;'>Notificaciones - RTSERVICES</h2></center>
						<center><p style='font-size: 18pt;'>" . $tipoNotificacion . ".</p></center>
						<br>
					</div>
				</div>
				<div class='col-md-2 col-sm-2 col-xs-2'><br></div>
			</div>
		</body>
		</html>";

		$this->email->from('rackettenisservices@gmail.com', 'Administración RTSERVICES');
		$this->email->to('esneider.m12@gmail.com');
		$this->email->subject('Notificaciones - RTSERVICES');
		$this->email->message($mensaje);
		
		if ($this->email->send())
		{
			return true;
		}
		else
		{
			echo $this->email->print_debugger();
		}
	}

}

/* End of file persona.php */
/* Location: ./application/controllers/persona.php */