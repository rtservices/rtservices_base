<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_partidos extends CI_Model {

	public $tabla = 'rtspartidotennis_deb';

	public function __construct()
	{
		parent::__construct();
	}

	function cargarTabla()
	{
       $this->db->select('rp.nombre AS jugadoruno, rp2.nombre AS jugadordos, rp.Apellidos AS apeuno, rp2.Apellidos AS apedos,  rc.NombreCuadro,re.NombreEtapa, rca.NombreCategoria, rpt.*');
       $this->db->from('rtspartidotennis_deb AS rpt');
       $this->db->join('rtsjugadorcuadro_det AS rjc','rpt.IdJugadorCuadro_detJug1 = rjc.IdJugadorCuadro','INNER');
       $this->db->join('rtscuadro_deb AS rc','rjc.IdCuadro_deb = rc.IdCuadro','INNER');
       $this->db->join('rtsetapajugador_det AS rej','rjc.IdEtapaJugador_det = rej.IdEtapaJugador','INNER');
       $this->db->join('rtsetapa_deb AS re','rej.IdEtapa_deb = re.IdEtapa','INNER');
       $this->db->join('rtscategoria AS rca','rej.IdCategoria = rca.IdCategoria','INNER');
       $this->db->join('rtspersonarol_det AS rpr','rej.IdPersonaRol_det = rpr.IdPersonaRol','INNER');
       $this->db->join('rtspersona_deb AS rp','rpr.IdPersona_deb = rp.IdPersona','INNER'); 
       //consulta 2
       $this->db->join('rtsjugadorcuadro_det AS rjc2','rpt.IdJugadorCuadro_detJug2 = rjc2.IdJugadorCuadro','INNER');
       $this->db->join('rtsetapajugador_det AS rej2','rjc2.IdEtapaJugador_det = rej2.IdEtapaJugador','INNER');
       $this->db->join('rtspersonarol_det AS rpr2','rej2.IdPersonaRol_det = rpr2.IdPersonaRol','INNER');
       $this->db->join('rtspersona_deb AS rp2','rpr2.IdPersona_deb = rp2.IdPersona','INNER');

       $res = $this->db->get()->result();
		return $res;
	}

	function listarPartidos($id)
	{
		$this->db->select('rp.nombre AS jugadoruno, rp2.nombre AS jugadordos, rp.Apellidos AS apeuno, rp2.Apellidos AS apedos,  rc.NombreCuadro,re.NombreEtapa, rca.NombreCategoria, rpt.*');
       $this->db->from('rtspartidotennis_deb AS rpt');
       $this->db->join('rtsjugadorcuadro_det AS rjc','rpt.IdJugadorCuadro_detJug1 = rjc.IdJugadorCuadro','INNER');
       $this->db->join('rtscuadro_deb AS rc','rjc.IdCuadro_deb = rc.IdCuadro','INNER');
       $this->db->join('rtsetapajugador_det AS rej','rjc.IdEtapaJugador_det = rej.IdEtapaJugador','INNER');
       $this->db->join('rtsetapa_deb AS re','rej.IdEtapa_deb = re.IdEtapa','INNER');
       $this->db->join('rtscategoria AS rca','rej.IdCategoria = rca.IdCategoria','INNER');
       $this->db->join('rtspersonarol_det AS rpr','rej.IdPersonaRol_det = rpr.IdPersonaRol','INNER');
       $this->db->join('rtspersona_deb AS rp','rpr.IdPersona_deb = rp.IdPersona','INNER'); 
       //consulta 2
       $this->db->join('rtsjugadorcuadro_det AS rjc2','rpt.IdJugadorCuadro_detJug2 = rjc2.IdJugadorCuadro','INNER');
       $this->db->join('rtsetapajugador_det AS rej2','rjc2.IdEtapaJugador_det = rej2.IdEtapaJugador','INNER');
       $this->db->join('rtspersonarol_det AS rpr2','rej2.IdPersonaRol_det = rpr2.IdPersonaRol','INNER');
       $this->db->join('rtspersona_deb AS rp2','rpr2.IdPersona_deb = rp2.IdPersona','INNER');
       $this->db->where('rpt.IdPartidotennis', $id);

      $res = $this->db->get();

		return $res;
	}

	public function eliminarPartidos($id)
	{
		$this->db->where('IdPartidotennis', $id);
		$res = $this->db->delete('rtspartidotennis_deb');
		return $res;
	}

	

	public function listarPersona()
	{
	  $this->db->select('rp.Nombre AS nombrecom, rjc.* ');
	  $this->db->from('rtspersona_deb AS rp');
	  $this->db->join('rtspersonarol_det AS rpr','rp.IdPersona = rpr.IdPersona_deb','INNER');
	  $this->db->join('rtsetapajugador_det AS rej ','rpr.IdPersonaRol = rej.IdPersonaRol_det','INNER');
	  $this->db->join('rtsjugadorcuadro_det AS rjc','rej.IdEtapaJugador = rjc.IdEtapaJugador_det','INNER');
      $res = $this->db->get()->result();

	  return $res;
	}

	public function actualizarPartidos($id,$data)
	{
		$this->db->where('IdPartidotennis', $id);
		$res = $this->db->update($this->tabla, $data);

		return $res;
	}

	function cargarTabla2($id)
	{
       $this->db->select('rp.nombre AS jugadoruno, rp2.nombre AS jugadordos, rp.Apellidos AS apeuno, rp2.Apellidos AS apedos,  rc.NombreCuadro,re.NombreEtapa, rca.NombreCategoria, rpt.*');
       $this->db->from('rtspartidotennis_deb AS rpt');
       $this->db->join('rtsjugadorcuadro_det AS rjc','rpt.IdJugadorCuadro_detJug1 = rjc.IdJugadorCuadro','INNER');
       $this->db->join('rtscuadro_deb AS rc','rjc.IdCuadro_deb = rc.IdCuadro','INNER');
       $this->db->join('rtsetapajugador_det AS rej','rjc.IdEtapaJugador_det = rej.IdEtapaJugador','INNER');
       $this->db->join('rtsetapa_deb AS re','rej.IdEtapa_deb = re.IdEtapa','INNER');
       $this->db->join('rtscategoria AS rca','rej.IdCategoria = rca.IdCategoria','INNER');
       $this->db->join('rtspersonarol_det AS rpr','rej.IdPersonaRol_det = rpr.IdPersonaRol','INNER');
       $this->db->join('rtspersona_deb AS rp','rpr.IdPersona_deb = rp.IdPersona','INNER'); 
       //consulta 2
       $this->db->join('rtsjugadorcuadro_det AS rjc2','rpt.IdJugadorCuadro_detJug2 = rjc2.IdJugadorCuadro','INNER');
       $this->db->join('rtsetapajugador_det AS rej2','rjc2.IdEtapaJugador_det = rej2.IdEtapaJugador','INNER');
       $this->db->join('rtspersonarol_det AS rpr2','rej2.IdPersonaRol_det = rpr2.IdPersonaRol','INNER');
       $this->db->join('rtspersona_deb AS rp2','rpr2.IdPersona_deb = rp2.IdPersona','INNER');
       $this->db->where('IdPartidotennis',$id);
       $res = $this->db->get()->result();
		return $res;
	}

}