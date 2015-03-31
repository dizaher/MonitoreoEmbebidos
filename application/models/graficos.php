<?php
//heredamos todos los recursos de la clase CI_Model
class Graficos extends CI_Model
{
  
  public function __construct()
  {
    
    parent::__construct();
    $this->load->database();
    
  }
  
  //el método provincias
  public function getDatos()
  {            
    $query = $this->db->get("calentador_solar");
  // Genera: SELECT * FROM calentador_solar WHERE temp_tuberia_1 > '38'
    if($query -> num_rows() > 0){    
      return $query->result();
    }
    else{
      return false;
    }
  }
  
}
/*
 * end application/models/home_model.php
 */