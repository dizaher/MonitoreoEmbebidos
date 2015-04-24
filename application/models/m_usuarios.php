<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class M_usuarios extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
        $this->load->library('encrypt');
    }
 
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
 function login($username, $password)
 {
   $this -> db -> select('u_correo, u_nombre, u_password, u_idperfil');
   $this -> db -> from('toc_usuarios');
   $this -> db -> where('u_correo', $username);
   $this -> db -> where('u_password', $password);
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
 function users(){
  $query = $this->db->get('toc_usuarios');
    if($query->num_rows() > 0 )
    {
    return $query->result();
    }
 }

 public function register($username, $password, $email, $additional_data = array())
  {    

    if ($this->identity_column == 'email' && $this->email_check($email))
    {
      $this->set_error('account_creation_duplicate_email');
      return FALSE;
    }
    
    $user_data = array_merge($this->_filter_data($this->tables['users'], $additional_data), $data);

    $this->trigger_events('extra_set');

    $this->db->insert($this->tables['users'], $user_data);

    $id = $this->db->insert_id();

    

    return (isset($id)) ? $id : FALSE;
  }

  function new_user($email,$password,$first_name,$last_name,$perfil,$phone)
  {
       $data = array(
            'u_nombre' => $first_name,
            'u_apellidos' => $last_name,
            'u_correo' => $email,
            'u_password' => $this->encrypt->encode($password),
            'u_telefono' => $phone,
            'u_idperfil' => $perfil            
        );
        return $this->db->insert('toc_usuarios', $data);  
    }
}
?>