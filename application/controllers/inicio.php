<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('menuprincipal/msp/cabecera');
		// $this->load->view('View File', $data, FALSE);
		$this->load->view('menuprincipal/msp/pie');
	}

}

/* End of file inicio.php */
/* Location: ./application/controllers/inicio.php */