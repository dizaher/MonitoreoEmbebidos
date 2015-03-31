<?php
class Reportes extends CI_Model
{
  
  public function __construct()
  {
    
    parent::__construct();
  }
  /*
  ---------------CONSULTAS DE REPORTES DEL CALENTADOR SOLAR-------------------------------------------------
  */
  //consulta para mostrar los primeros 100 datos de mi tabla calentador 
  public function get_datos_cs($limit,$start)
  {         
    $this->db->limit($limit, $start);
    $query = $this->db->get("calentador_solar");

    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    return 0;
  }    
  //////////////////////////////////////////////////////////////////////////////////////////////////
  public function get_alldatos_cs()
  {                   
    $query = $this->db->query("select * from calentador_solar");    
    return $query;
  }    
  //////////////////////////////////////////////////////////////////////////////////////////////////
  public function get_datosconsulta_cs($fechai, $fechaf)
  {              
    $fi = date("Y-m-d", strtotime($fechai)).' 00:00:00';    
    $ff = date("Y-m-d", strtotime($fechaf)).' 23:59:59';     
    $query = $this->db->query("select * from calentador_solar where fecha_hora between '$fi' and '$ff'");    
    return $query;
  }    
  //////////////////////////////////////////////////////////////////////////////////////////////////
  function getNumDatos_cs()
  {
      return $this->db->count_all("calentador_solar");
  }
  ///////////////////////////////////////////////////////////////////////////////////////////////
  function consultarNumDatos_cs($fechai, $fechaf)
  {
      $fi = date("Y-m-d", strtotime($fechai)).' 00:00:00';    
      $ff = date("Y-m-d", strtotime($fechaf)).' 23:59:59';   
       
      $this->db->where("fecha_hora between '$fi' and '$ff'");
      $cont = $this->db->count_all("calentador_solar");
      return $cont;
  }
  ///////////////////////////////////////////////////////////////////////////////////////////////
  function consultar_datos_cs($fechai, $fechaf,$limit,$start)
 {    
    $fi = date("Y-m-d", strtotime($fechai)).' 00:00:00';    
    $ff = date("Y-m-d", strtotime($fechaf)).' 23:59:59';   
   
    $this->db->where("fecha_hora between '$fi' and '$ff'");    
    $this->db->limit($limit, $start);
    $query = $this->db->get("calentador_solar");

    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    return 0;          
 }
  /*
  ---------------CONSULTAS DE REPORTES DE ACUAPONIA -------------------------------------------------
  */
  public function get_datos_acu($limit,$start)
  {         
    $this->db->limit($limit, $start);
    $query = $this->db->get("acuaponia");

    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    return 0;
  }    
  //////////////////////////////////////////////////////////////////////////////////////////////////
  public function get_alldatos_acu()
  {                   
    $query = $this->db->query("select * from acuaponia");    
    return $query;
  }    
  //////////////////////////////////////////////////////////////////////////////////////////////////
  public function get_datosconsulta_acu($fechai, $fechaf)
  {              
    $fi = date("Y-m-d", strtotime($fechai)).' 00:00:00';    
    $ff = date("Y-m-d", strtotime($fechaf)).' 23:59:59';     
    $query = $this->db->query("select * from acuaponia where fecha_hora between '$fi' and '$ff'");    
    return $query;
  }    
  //////////////////////////////////////////////////////////////////////////////////////////////////
  function getNumDatos_acu()
  {
      return $this->db->count_all("acuaponia");
  }
  ///////////////////////////////////////////////////////////////////////////////////////////////
  function consultarNumDatos_acu($fechai, $fechaf)
  {
      $fi = date("Y-m-d", strtotime($fechai)).' 00:00:00';    
      $ff = date("Y-m-d", strtotime($fechaf)).' 23:59:59';   
       
      $this->db->where("fecha_hora between '$fi' and '$ff'");
      $cont = $this->db->count_all("acuaponia");
      return $cont;
  }
  ///////////////////////////////////////////////////////////////////////////////////////////////
  function consultar_datos_acu($fechai, $fechaf,$limit,$start)
 {    
    $fi = date("Y-m-d", strtotime($fechai)).' 00:00:00';    
    $ff = date("Y-m-d", strtotime($fechaf)).' 23:59:59';   
   
    $this->db->where("fecha_hora between '$fi' and '$ff'");    
    $this->db->limit($limit, $start);
    $query = $this->db->get("acuaponia");

    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    return 0;          
 }
  /*
  ---------------CONSULTAS DE REPORTES DE BIODIESEL -------------------------------------------------
  */
  public function get_datos_bio($limit,$start)
  {         
    $this->db->limit($limit, $start);
    $query = $this->db->get("reactor_biodiesel");

    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    return 0;
  }    
  //////////////////////////////////////////////////////////////////////////////////////////////////
  public function get_alldatos_bio()
  {                   
    $query = $this->db->query("select * from reactor_biodiesel");    
    return $query;
  }    
  //////////////////////////////////////////////////////////////////////////////////////////////////
  public function get_datosconsulta_bio($fechai, $fechaf)
  {              
    $fi = date("Y-m-d", strtotime($fechai)).' 00:00:00';    
    $ff = date("Y-m-d", strtotime($fechaf)).' 23:59:59';     
    $query = $this->db->query("select * from reactor_biodiesel where fecha_hora between '$fi' and '$ff'");    
    return $query;
  }    
  //////////////////////////////////////////////////////////////////////////////////////////////////
  function getNumDatos_bio()
  {
      return $this->db->count_all("reactor_biodiesel");
  }
  ///////////////////////////////////////////////////////////////////////////////////////////////
  function consultarNumDatos_bio($fechai, $fechaf)
  {
      $fi = date("Y-m-d", strtotime($fechai)).' 00:00:00';    
      $ff = date("Y-m-d", strtotime($fechaf)).' 23:59:59';   
       
      $this->db->where("fecha_hora between '$fi' and '$ff'");
      $cont = $this->db->count_all("reactor_biodiesel");
      return $cont;
  }
  ///////////////////////////////////////////////////////////////////////////////////////////////
  function consultar_datos_bio($fechai, $fechaf,$limit,$start)
 {    
    $fi = date("Y-m-d", strtotime($fechai)).' 00:00:00';    
    $ff = date("Y-m-d", strtotime($fechaf)).' 23:59:59';   
   
    $this->db->where("fecha_hora between '$fi' and '$ff'");    
    $this->db->limit($limit, $start);
    $query = $this->db->get("reactor_biodiesel");

    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    return 0;          
 }
  /*
  ---------------CONSULTAS DE REPORTES DE EOLICO -------------------------------------------------
  */
  public function get_datos_eo($limit,$start)
  {         
    $this->db->limit($limit, $start);
    $query = $this->db->get("generador_eolico");

    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    return 0;
  }    
  //////////////////////////////////////////////////////////////////////////////////////////////////
  public function get_alldatos_eo()
  {                   
    $query = $this->db->query("select * from generador_eolico");    
    return $query;
  }    
  //////////////////////////////////////////////////////////////////////////////////////////////////
  public function get_datosconsulta_eo($fechai, $fechaf)
  {              
    $fi = date("Y-m-d", strtotime($fechai)).' 00:00:00';    
    $ff = date("Y-m-d", strtotime($fechaf)).' 23:59:59';     
    $query = $this->db->query("select * from generador_eolico where fecha_hora between '$fi' and '$ff'");    
    return $query;
  }    
  //////////////////////////////////////////////////////////////////////////////////////////////////
  function getNumDatos_eo()
  {
      return $this->db->count_all("generador_eolico");
  }
  ///////////////////////////////////////////////////////////////////////////////////////////////
  function consultarNumDatos_eo($fechai, $fechaf)
  {
      $fi = date("Y-m-d", strtotime($fechai)).' 00:00:00';    
      $ff = date("Y-m-d", strtotime($fechaf)).' 23:59:59';   
       
      $this->db->where("fecha_hora between '$fi' and '$ff'");
      $cont = $this->db->count_all("generador_eolico");
      return $cont;
  }
  ///////////////////////////////////////////////////////////////////////////////////////////////
  function consultar_datos_eo($fechai, $fechaf,$limit,$start)
 {    
    $fi = date("Y-m-d", strtotime($fechai)).' 00:00:00';    
    $ff = date("Y-m-d", strtotime($fechaf)).' 23:59:59';   
   
    $this->db->where("fecha_hora between '$fi' and '$ff'");    
    $this->db->limit($limit, $start);
    $query = $this->db->get("generador_eolico");

    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    return 0;          
 }
}
/*
 * end application/models/home_model.php
 */