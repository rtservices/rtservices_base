<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error404 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('error/error404');
	}

}

/* End of file error404.php */
/* Location: ./application/controllers/error404.php */