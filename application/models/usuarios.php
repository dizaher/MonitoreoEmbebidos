<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Usuarios extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
    }
 
 function get_perfil()
 {
   
   //$this -> db -> where('DATE('fecha_hora') = DATE(NOW()');
   //hora del cliente

    $this->db->select('cve_perfil');
    $this->db->from('perfil');    

    $query = $this->db->get();
    if($query->num_rows() > 0 )
    {
    return $query->result();
    } 
  
 } 
 function login($username, $password)
 {
   $this -> db -> select('cve_usuario, nombre, clave, perfil_cve_perfil');
   $this -> db -> from('usuarios');
   $this -> db -> where('nombre', $username);
   $this -> db -> where('clave', $password);
   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {    
     return $query->result();
   }
   else
   {
     return false;
   }
 }
}
?>