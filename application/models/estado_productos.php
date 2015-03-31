<?php
//heredamos todos los recursos de la clase CI_Model
class Estado_productos extends CI_Model
{  
  public function __construct()
  {
    
    parent::__construct();      
  }
  /*///////////////////////////////////////////////////////////////////////////////////
  * 
  * funcion que busca las alarmas del dia y envia el arreglo con los valores obtenidos ya sea un arreglo vacio o con datosof something that should require
  * 
  *////////////////////////////////////////////////////////////////////////////////////
  public function get_estado_cs()
  {                     
    $query = $this->db->get("calentador_solar");  
    return $query->result();
  }    
}
/*
 * end application/models/alarmas.php
 */