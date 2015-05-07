<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class M_usuarios extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('encrypt');
  }
  ////////////////////////////////////////
  function get_perfil_dropdown()
  {
  $result = $this->db->get('toc_perfil');
  $return = array();
  if($result->num_rows() > 0){
    $return[''] = 'Selecciona el tipo de perfil';
    foreach($result->result_array() as $row){
      $return[$row['p_idperfil']] = $row['p_descripcion'];
    }
  }
  return $return;
  }
  ///////////////////////////////////////
  function busca_user($username)
  {
    $this -> db -> select('u_correo, u_nombre, u_password, p_descripcion');
    $this -> db -> where('u_correo', $username);              
    $this->db->join('toc_perfil', 'toc_usuarios.u_idperfil = toc_perfil.p_idperfil');    
    $query = $this -> db -> get('toc_usuarios');
    if($query -> num_rows() == 1)
    {    
      return $query->result();
    }
    else
    {
      return false;
    }
  }
  ////////////////////////////////////////////
  function users(){
    $this -> db -> select('u_correo, u_nombre, u_password, u_apellidos,u_telefono,p_descripcion');              
    $this->db->join('toc_perfil', 'toc_usuarios.u_idperfil = toc_perfil.p_idperfil');    
    $query = $this -> db -> get('toc_usuarios');


    //$query = $this->db->get('toc_usuarios');
    if($query->num_rows() > 0 )
    {
      return $query->result();
    }
  }
  ///////////////////////////////////////////////
  function new_user($email,$password,$first_name,$last_name,$perfil,$phone)
  {
    $data = array(
    'u_nombre' => $first_name,
    'u_apellidos' => $last_name,
    'u_correo' => $email,
    'u_password' => md5($password),
    'u_telefono' => $phone,
    'u_idperfil' => $perfil            
    );
    return $this->db->insert('toc_usuarios', $data);  
  }
  ///////////////////////////////////////////////////////
  public function user($id = NULL)
  {
    //if no id was passed use the current users id
    $id || $id = $this->session->userdata('cve_usuario');

    $this->db->limit(1);    
    $this->db->where('u_correo', $id);    

    return $this->db->get('toc_usuarios');
  }
  ////////////////////////////////////////////////
  public function update($id, array $data)
  {    

    //$user = $this->user($id)->row();
    $this->db->where('u_correo', $id);
    $this->db->update('toc_usuarios', $data); 
  }
  //////////////////////////////////////////////////
  public function delete_user($id)
  {    
    // delete user from users table should be placed after remove from group
    $this->db->delete('toc_usuarios', array('u_correo' => $id));
    // if user does not exist in database then it returns FALSE else removes the user from groups
    if ($this->db->affected_rows() == 0)
    {
        return FALSE;
    }  
    return TRUE;
  }
}
?>