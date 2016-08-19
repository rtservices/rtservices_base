<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_torneo extends CI_Model {

	public $tabla = 'rtstorneo';

	public function __construct()
	{
		parent::__construct();
	}

	public function cargarTabla()
	{
		$this->db->select('*');
		$this->db->from($this->tabla);
		$res = $this->db->get()->result();

		return $res;
	}

	public function listarTorneo($id)
	{
		$this->db->select('*');
		$this->db->from($this->tabla);
		$this->db->where('IdTorneo', $id);
		$res = $this->db->get();

		return $res;
	}

	public function actualizarTorneo($id,$data)
	{
		$this->db->where('IdTorneo', $id);
		$res = $this->db->update($this->tabla, $data);
		return $res;
	}

	public function listarEtapa($id,$etapa)
	{
		$this->db->select('*');
		$this->db->from('rtsetapa_deb');
		$this->db->where('IdTorneo', $id);
		$this->db->like('NombreEtapa', $etapa, 'both');
		$res = $this->db->get()->row();

		return $res;
	}

	public function listarInscritosEtapa($id)
	{
		$this->db->select('rtspersona_deb.Documento, rtspersona_deb.Nombre, rtspersona_deb.Apellidos, rtscategoria.NombreCategoria, rtsetapajugador_det.IdEtapaJugador');
		$this->db->from('rtsetapajugador_det');
		$this->db->join('rtspersonarol_det', 'rtsetapajugador_det.IdPersonaRol_det = rtspersonarol_det.IdPersonaRol', 'JOIN');
		$this->db->join('rtspersona_deb', 'rtspersonarol_det.IdPersonaRol = rtspersona_deb.IdPersona', 'JOIN');
		$this->db->join('rtscategoria', 'rtsetapajugador_det.IdCategoria = rtscategoria.IdCategoria', 'JOIN');
		$this->db->join('rtsetapa_deb', 'rtsetapajugador_det.IdEtapa_deb = rtsetapa_deb.IdEtapa', 'JOIN');
		$this->db->where('rtsetapa_deb.IdEtapa', $id);
		$res = $this->db->get()->result();

		return $res;
	}

	public function eliminarInscripcionJugador($id)
	{
		$this->db->where('IdEtapaJugador', $id);
		$res = $this->db->delete('rtsetapajugador_det');

		return $res;
	}

	// etapas - validaciones y otros

	public function cargarTablaEtapa($id)
	{
		$this->db->select('rtsetapajugador_det.*, rtspersona_deb.Documento, rtspersona_deb.Genero, rtspersona_deb.Nombre as NombreP, rtspersona_deb.Apellidos as ApellidosP, rtscategoria.NombreCategoria');
		$this->db->from('rtsetapajugador_det');
		$this->db->join('rtscategoria', 'rtsetapajugador_det.IdCategoria = rtscategoria.IdCategoria', 'INNER');
		$this->db->join('rtspersonarol_det', 'rtsetapajugador_det.IdPersonaRol_det = rtspersonarol_det.IdPersonaRol', 'INNER');
		$this->db->join('rtspersona_deb', 'rtspersonarol_det.IdPersona_deb = rtspersona_deb.IdPersona', 'INNER');
		$this->db->join('rtsetapa_deb', 'rtsetapajugador_det.IdEtapa_deb = rtsetapa_deb.IdEtapa', 'INNER');
		$this->db->where('rtsetapa_deb.IdEtapa', $id);

		$res = $this->db->get()->result();
		return $res;
	}

	public function validarEtapa($id)
	{
		$this->db->select('*');
		$this->db->from('rtsetapa_deb');
		$this->db->where('IdEtapa', $id);

		$res = $this->db->get()->result();
		return $res;
	}

	public function actualizarEtapa($id, $data)
	{
		$this->db->select('*');
		$this->db->from('rtsetapajugador_det');
		$this->db->where('IdEtapa_deb', $id);
		$dato = $this->db->get();
		if ($dato->num_rows() > 0)
		{
			$res = 'raices';
		}
		else
		{
			$this->db->where('IdEtapa', $id);
			$res = $this->db->update('rtsetapa_deb', $data);
		}

		return $res;
	}

	public function cargarComboJugador()
	{
		$this->db->select('rtspersonarol_det.IdPersonaRol, rtspersona_deb.*');
		$this->db->from('rtspersonarol_det');
		$this->db->join('rtspersona_deb', 'rtspersonarol_det.IdPersona_deb = rtspersona_deb.IdPersona', 'INNER');
		$this->db->where('rtspersona_deb.Estado', 1);
		$this->db->where('rtspersonarol_det.Estado', 1);
		$this->db->where('rtspersonarol_det.IdRol', 3);

		$res = $this->db->get()->result();
		return $res;
	}

	public function inscripcionJugador_id($id)
	{
		$this->db->select('*');
		$this->db->from('rtsetapajugador_det');
		$this->db->where('IdEtapaJugador', $id);

		$res = $this->db->get()->result();

		return $res;
	}

	public function actualizarInscripcion($id,$data)
	{
		$this->db->where('IdEtapaJugador', $id);
		$res = $this->db->update('rtsetapajugador_det', $data);

		return $res;
	}

	public function registrarTorneo($data)
	{
		$this->db->insert($this->tabla, $data);
		return $this->db->insert_id();
	}

	public function registrarEtapa($data)
	{
		$this->db->insert('rtsetapa_deb',$data);

	}

	//Funcion para agregar un jugador a una etapa
	public function inscribirPlanJugadorTorneo($data)
	{
		$res = $this->db->insert('rtsetapajugador_det', $data);
		return $res;
	}

}

/* End of file mdl_torneo.php */
/* Location: ./application/models/mdl_torneo.php */