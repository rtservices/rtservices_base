<?php
defined('BASEPATH') Or exit('No direct script access allowed');

class Mdl_asistencia extends CI_Model {

	public $tabla = 'rtsclase_deb';

	public function __construct()
	{
		parent::__construct();
	}

	public function cargarTabla()
	{
		$this->db->select('rp.Documento, rp.Nombre, rp.Apellidos,rc.*,(SELECT COUNT(*) FROM rtsclasejugador_det AS rcj WHERE rcj.IdClase_deb = rc.IdClase ) AS cantidad_jugadores');
		$this->db->from('rtsclase_deb AS rc');
		//$this->db->join('rtsclasejugador_det AS rcj','rc.IdClase = rcj.IdClase_deb','INNER');
		$this->db->join('rtspersonarol_det AS rpr','rc.IdPersonaRol_det = rpr.IdPersonaRol','INNER');
		$this->db->join('rtspersona_deb AS rp','rpr.IdPersona_deb = rp.IdPersona','INNER');
		$res = $this->db->get()->result();

		return $res;
	}
}

/* End of file mdl_clase.php */
/* Location: ./application/models/mdl_clase.php */