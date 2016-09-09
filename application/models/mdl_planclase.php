<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_planclase extends CI_Model {

	public $tabla = 'rtsplanclase_deb';

	public function __construct()
	{
		parent::__construct();
	}

	public function consultarJugador($idPersona)
	{
		$this->db->select('rtspersona_deb.Nombre, rtspersona_deb.Apellidos, rtspersona_deb.Documento');
		$this->db->from($this->tabla);
		$this->db->join('rtspersonarol_det', 'rtspersonarol_det.IdPersonaRol = rtsplanclase_deb.IdPersonaRol_det', 'LEFT');
		$this->db->join('rtspersona_deb', 'rtspersona_deb.IdPersona = rtspersonarol_det.IdPersona_deb', 'LEFT');
		$this->db->where('rtspersonarol_det.IdRol', 3);
		$this->db->where('rtspersona_deb.IdPersona', $idPersona);
		$res = $this->db->get()->row();

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