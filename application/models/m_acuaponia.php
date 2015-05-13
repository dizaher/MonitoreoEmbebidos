<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_acuaponia extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
  ---------------CONSULTAS DE REPORTES DEL SISTEMA ACUAPONICO-------------------------------------------
  */
  //********************************************************************************************************
  function getNumDatos_acu()
  {
      return $this->db->count_all("toc_acuaponia");
  }
  //////////////////consulta para mostrar los primeros 100 datos de mi tabla acuponia 
  public function get_datos_acu($limit,$start)
  {         
    $this->db->limit($limit, $start);
    $query = $this->db->get("toc_acuaponia");

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
    $query = $this->db->query("select * from toc_acuaponia");    
    return $query;
  }    
  //********************************************************************************************************
    
  //////////////////////////////////////////////////////////////////////////////////////////////////
  public function get_datosconsulta_acu($postfecha)
  {              
    $fechai = substr($postfecha, 0, 10);
    $fechaf = substr($postfecha, 14, 23);
    $fi = date("Y-m-d", strtotime($fechai)).' 00:00:00';    
    $ff = date("Y-m-d", strtotime($fechaf)).' 23:59:59';

    $query = $this->db->query("select * from toc_acuaponia where a_fecha between '$fi' and '$ff'");    
    return $query;
  }    
  
  ///////////////////////////////////////////////////////////////////////////////////////////////
  function consultarNumDatos_acu($postfecha)
  {   $fechai = substr($postfecha, 0, 10);
      $fechaf = substr($postfecha, 14, 23);
      $fi = date("Y-m-d", strtotime($fechai)).' 00:00:00';    
      $ff = date("Y-m-d", strtotime($fechaf)).' 23:59:59';   
       
      $this->db->where("a_fecha between '$fi' and '$ff'");
      $cont = $this->db->count_all("toc_acuaponia");
      return $cont;
  }
  ///////////////////////////////////////////////////////////////////////////////////////////////
  function consultar_datos_acu($postfecha,$limit,$start)
 {    
    $fechai = substr($postfecha, 0, 10);
    $fechaf = substr($postfecha, 14, 23);
    $fi = date("Y-m-d", strtotime($fechai)).' 00:00:00';    
    $ff = date("Y-m-d", strtotime($fechaf)).' 23:59:59';   
   
    $this->db->where("a_fecha between '$fi' and '$ff'");    
    $this->db->limit($limit, $start);
    $query = $this->db->get("toc_acuaponia");

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
 * end of application/models/consultas_model.php
 */