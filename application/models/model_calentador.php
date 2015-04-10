<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_calentador extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
  ---------------CONSULTAS DE REPORTES DEL CALENTADOR SOLAR-------------------------------------------------
  */
  //consulta para mostrar los primeros 100 datos de mi tabla calentador 
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
  //////////////////////////////////////////////////////////////////////////////////////////////////
  public function get_datosconsulta_cs($fechai, $fechaf)
  {              
    $fi = date("Y-m-d", strtotime($fechai)).' 00:00:00';    
    $ff = date("Y-m-d", strtotime($fechaf)).' 23:59:59';     
    $query = $this->db->query("select * from toc_calentador_solar where fecha_hora between '$fi' and '$ff'");    
    return $query;
  }    
  //////////////////////////////////////////////////////////////////////////////////////////////////
  function getNumDatos_cs()
  {
      return $this->db->count_all("toc_calentador_solar");
  }
  ///////////////////////////////////////////////////////////////////////////////////////////////
  function consultarNumDatos_cs($fechai, $fechaf)
  {
      $fi = date("Y-m-d", strtotime($fechai)).' 00:00:00';    
      $ff = date("Y-m-d", strtotime($fechaf)).' 23:59:59';   
       
      $this->db->where("fecha_hora between '$fi' and '$ff'");
      $cont = $this->db->count_all("toc_calentador_solar");
      return $cont;
  }
  ///////////////////////////////////////////////////////////////////////////////////////////////
  function consultar_datos_cs($fechai, $fechaf,$limit,$start)
 {    
    $fi = date("Y-m-d", strtotime($fechai)).' 00:00:00';    
    $ff = date("Y-m-d", strtotime($fechaf)).' 23:59:59';   
   
    $this->db->where("fecha_hora between '$fi' and '$ff'");    
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


    //insertamos un nuevo usuario en la tabla users
    public function insert_datos()
    {   
        date_default_timezone_set("America/Mexico_City");
        $fecha = date('Y-m-d');
        $hora= date("H:i:s");
        $grados = rand(180, 900)/10;        
        $data = array(
            'ejeY'       =>   $grados,
            'Fecha'          =>   "$fecha $hora",
            );
            $this->db->insert('graficos',$data);
    }
    //mostramos los ultimos 100 registros insertados 
    public function listEntradas(){
        $this->db->select('ejeY')->from('graficos')->order_by('Fecha','desc')->limit(100);
        $query = $this->db->get();
        if($query->num_rows() > 0 )
        {
            return $query->result();
        }
    } 
    public function lisEnt(){ 
        //http://cassianinet.blogspot.mx/2011/09/cargando-select-con-codeigniter.html#axzz32weUkPjd       
        //consulta con llenado de datos en arreglo 
        $query = $this->db->query('SELECT Px, Py FROM ti');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $dataset1[] = array($row->Px,$row->Py);
            }
            $query->free_result();
            return $dataset1;
        }

    }
}
/*
 * end of application/models/consultas_model.php
 */