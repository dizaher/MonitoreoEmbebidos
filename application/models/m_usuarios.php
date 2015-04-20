<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class M_usuarios extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
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
 function users(){
  $query = $this->db->get('toc_usuarios');
    if($query->num_rows() > 0 )
    {
    return $query->result();
    }
 }

 public function register($username, $password, $email, $additional_data = array(), $groups = array())
  {
    $this->trigger_events('pre_register');

    $manual_activation = $this->config->item('manual_activation', 'ion_auth');

    if ($this->identity_column == 'email' && $this->email_check($email))
    {
      $this->set_error('account_creation_duplicate_email');
      return FALSE;
    }
    elseif ($this->identity_column == 'username' && $this->username_check($username))
    {
      $this->set_error('account_creation_duplicate_username');
      return FALSE;
    }
    elseif ( !$this->config->item('default_group', 'ion_auth') && empty($groups) )
    {
      $this->set_error('account_creation_missing_default_group');
      return FALSE;
    }

    //check if the default set in config exists in database
    $query = $this->db->get_where($this->tables['groups'],array('name' => $this->config->item('default_group', 'ion_auth')),1)->row();
    if( !isset($query->id) && empty($groups) )
    {
      $this->set_error('account_creation_invalid_default_group');
      return FALSE;
    }

    //capture default group details
    $default_group = $query;

    // If username is taken, use username1 or username2, etc.
    if ($this->identity_column != 'username')
    {
      $original_username = $username;
      for($i = 0; $this->username_check($username); $i++)
      {
        if($i > 0)
        {
          $username = $original_username . $i;
        }
      }
    }

    // IP Address
    $ip_address = $this->_prepare_ip($this->input->ip_address());
    $salt       = $this->store_salt ? $this->salt() : FALSE;
    $password   = $this->hash_password($password, $salt);

    // Users table.
    $data = array(
        'username'   => $username,
        'password'   => $password,
        'email'      => $email,
        'ip_address' => $ip_address,
        'created_on' => time(),
        'active'     => ($manual_activation === false ? 1 : 0)
    );

    if ($this->store_salt)
    {
      $data['salt'] = $salt;
    }

    //filter out any data passed that doesnt have a matching column in the users table
    //and merge the set user data and the additional data
    $user_data = array_merge($this->_filter_data($this->tables['users'], $additional_data), $data);

    $this->trigger_events('extra_set');

    $this->db->insert($this->tables['users'], $user_data);

    $id = $this->db->insert_id();

    //add in groups array if it doesn't exits and stop adding into default group if default group ids are set
    if( isset($default_group->id) && empty($groups) )
    {
      $groups[] = $default_group->id;
    }

    if (!empty($groups))
    {
      //add to groups
      foreach ($groups as $group)
      {
        $this->add_to_group($group, $id);
      }
    }

    $this->trigger_events('post_register');

    return (isset($id)) ? $id : FALSE;
  }
}
?>