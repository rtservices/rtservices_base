<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_planclase extends CI_Model {

	public $tabla = 'rtsplanclase_deb';

	public function __construct()
	{
		parent::__construct();
	}

	public function consultarJugador()
	{
		$this->db->select('*');
		$this->db->from($tabla);
		$this->db->where('Field / comparison', $Value);
	}

	public function consultarPlanJugador()
	{
		$this->db->select('*');
		$this->db->from($tabla);
		$this->db->where('Field / comparison', $Value);
	}

}

/* End of file mdl_planclase.php */
/* Location: ./application/models/mdl_planclase.php */