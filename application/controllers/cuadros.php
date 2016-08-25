<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuadros extends CI_Controller{

  private $idEtapa;

  public function __construct()
  {
    parent::__construct();
    $this->load->model('mdl_cuadros');
    $this->idEtapa = ($this->input->get('etapa')) ? $this->input->get('etapa') : null;
  }

  function index()
  {
    if (!$this->session->userdata('usuario_id'))
		{
			redirect('login');
		}
		if (is_null($this->idEtapa))
		{
			redirect('torneo');
		}
		else
		{
      $this->load->view('msp/cabecera', $data);
      $this->load->view('cuadro/cuadro');
      $this->load->view('msp/footer');
      $this->load->view('cuadro/add');
    }
  }

}
