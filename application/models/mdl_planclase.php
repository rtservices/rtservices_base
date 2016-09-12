<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_planclase extends CI_Model {

	public $tabla = 'rtsplanclase_deb';

	public function __construct()
	{
		parent::__construct();
	}

	public function consultarJugador($idPersona)
	{
		$this->db->select('rtspersonarol_det.IdPersonaRol, rtspersona_deb.Nombre, rtspersona_deb.Apellidos, rtspersona_deb.Documento');
		$this->db->from('rtspersona_deb');
		$this->db->join('rtspersonarol_det', 'rtspersonarol_det.IdPersona_deb = rtspersona_deb.IdPersona', 'LEFT');
		$this->db->join('rtsplanclase_deb', 'rtsplanclase_deb.IdPersonaRol_det = rtspersonarol_det.IdPersonaRol', 'LEFT');
		$this->db->where('rtspersonarol_det.IdRol', 3);
		$this->db->where('rtspersona_deb.IdPersona', $idPersona);
		$res = $this->db->get()->row();

		return $res;
	}

	public function cargarTablaPC($Id)
	{
		$this->db->select('IdPlanClase, FechaInicio, Estado');
		$this->db->from($this->tabla);
		$this->db->where('IdPersonaRol_det', $Id);
		$res = $this->db->get()->result();

		return $res;
	}

	public function consultarPlanJugador()
	{
		$this->db->select('*');
		$this->db->from($this->tabla);
		// $this->db->where('Field / comparison', $Value);
	}

}

/* End of file mdl_planclase.php */
/* Location: ./application/models/mdl_planclase.php */