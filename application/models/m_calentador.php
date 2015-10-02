<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_calentador extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
  ---------------CONSULTAS DE REPORTES DEL CALENTADOR SOLAR-------------------------------------------------
  */
  //********************************************************************************************************
  function getNumDatos_cs()
  {
      return $this->db->count_all("toc_calentador_solar");
  }
  //////////////////consulta para mostrar los primeros 100 datos de mi tabla calentador 
  public function get_datos_cs($limit,$start)
  {         
    $this->db->limit($limit, $start);
    $query = $this->db->get("toc_calentador_solar");

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
    $query = $this->db->query("select * from toc_calentador_solar");    
    return $query;
  }    
  //********************************************************************************************************
    
  //////////////////////////////////////////////////////////////////////////////////////////////////
  public function get_datosconsulta_cs($postfecha)
  {              
    $fechai = substr($postfecha, 0, 10);
    $fechaf = substr($postfecha, 14, 23);
    $fi = date("Y-m-d", strtotime($fechai)).' 00:00:00';    
    $ff = date("Y-m-d", strtotime($fechaf)).' 23:59:59';     
    $query = $this->db->query("select * from toc_calentador_solar where cs_fecha between '$fi' and '$ff'");    
    return $query;
  }    
    
  function consultarNumDatos_cs($postfecha)
  {   $fechai = substr($postfecha, 0, 10);
      $fechaf = substr($postfecha, 14, 23);
      $fi = date("Y-m-d", strtotime($fechai)).' 00:00:00';    
      $ff = date("Y-m-d", strtotime($fechaf)).' 23:59:59';   
       
      $this->db->where("cs_fecha between '$fi' and '$ff'");
      $cont = $this->db->count_all("toc_calentador_solar");
      return $cont;
  }
  
  function consultar_datos_cs($postfecha,$limit,$start)
 {    
    $fechai = substr($postfecha, 0, 10);
    $fechaf = substr($postfecha, 14, 23);
    $fi = date("Y-m-d", strtotime($fechai)).' 00:00:00';    
    $ff = date("Y-m-d", strtotime($fechaf)).' 23:59:59';   
   
    $this->db->where("cs_fecha between '$fi' and '$ff'");    
    $this->db->limit($limit, $start);
    $query = $this->db->get("toc_calentador_solar");

    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    return 0;          
 }
 /**
  ---------------CONSULTAS DE ALARMAS DEL CALENTADOR SOLAR-------------------------------------------------
  */


 function getNumDatosAlarmas_cs()
  {
    date_default_timezone_set("America/Mexico_City");//zona horaria 
    $fi = date("Y-m-d").' 00:00:00';    
    $ff = date("Y-m-d").' 23:59:59'; 
    $query = $this->db->query("select * from toc_calentador_solar where cs_temp1 > 38 and cs_fecha between '".$fi."' and '".$ff."'");

    return $query->num_rows();

    /*$this->db->where('cs_temp1 >', 38);
    $this->db->where("cs_fecha between ' $fi' and '$ff'");    
    $cont = $this->db->count_all("toc_calentador_solar");
    return $cont; */  
  }
  //////////////////consulta para mostrar los primeros 100 datos de mi tabla calentador 
  public function get_datosAlarmas_cs($limit,$start)
  {         
    $fi = date("Y-m-d").' 00:00:00';    
    $ff = date("Y-m-d").' 23:59:59';
    $this->db->where("cs_fecha between '$fi' and '$ff'");    
    $this->db->where('cs_temp1 >', 38);
    $this->db->limit($limit, $start);
    $query = $this->db->get("toc_calentador_solar");

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