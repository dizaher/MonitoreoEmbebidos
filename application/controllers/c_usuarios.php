<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Heredamos de la clase CI_Controller */
class C_usuarios extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('m_usuarios');    
  }
 
  public function index($group_id = NULL)
  {
    if($this->session->userdata('logged_in'))
     {
        $session_data = $this->session->userdata('logged_in');          
        $data['users'] = $this->m_usuarios->users($group_id);
        $data['contenido'] = 'Usuarios/catusuarios_view';
        $data['nombre'] = $session_data['nombre'];
        $this->load->view('productosAdmin_view', $data);                  
      
    }
    else
     {
       //If no session, redirect to login page
       redirect('login', 'refresh');     
     }
  
  }
 
  public function create()
  { 
    $data['perfiles'] = $this->m_usuarios->get_perfil_dropdown();   
    $this->load->library('form_validation');
    $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[toc_usuarios.u_correo]');
    $this->form_validation->set_rules('first_name','Nombre','trim|required');
    $this->form_validation->set_rules('last_name','Apellidos','trim|required');    
    $this->form_validation->set_rules('phone','Teléfono','trim|required');        
    $this->form_validation->set_rules('password','Password','required');
    $this->form_validation->set_rules('password_confirm','Password confirmation','required|matches[password]');
    $this->form_validation->set_rules('perfil','Perfil','trim|required');

    if($this->form_validation->run()===FALSE)
    {
      $session_data = $this->session->userdata('logged_in');                
      $data['contenido'] = 'Usuarios/createuser_view';
      $data['nombre'] = $session_data['nombre'];
      $this->load->view('productosAdmin_view', $data);
    }
    else
    {      
      $email = $this->input->post('email');
      $password = $this->input->post('password');      
      $first_name = $this->input->post('first_name');
      $last_name = $this->input->post('last_name');
      $perfil = $this->input->post('perfil');
      $phone = $this->input->post('phone');
      $this->m_usuarios->new_user($email,$password,$first_name,$last_name,$perfil,$phone);      
      redirect('c_usuarios','refresh');
    }
  }
 
  public function edit($user_id = NULL)
  {
    $user_id = $this->input->post('user_id') ? $this->input->post('user_id') : $user_id;
    $this->data['page_title'] = 'Edit user';
    $this->load->library('form_validation');

    $this->form_validation->set_rules('first_name','First name','trim');
    $this->form_validation->set_rules('last_name','Last name','trim');
    $this->form_validation->set_rules('company','Company','trim');
    $this->form_validation->set_rules('phone','Phone','trim');
    $this->form_validation->set_rules('username','Username','trim|required');
    $this->form_validation->set_rules('email','Email','trim|required|valid_email');
    $this->form_validation->set_rules('password','Password','min_length[6]');
    $this->form_validation->set_rules('password_confirm','Password confirmation','matches[password]');
    $this->form_validation->set_rules('groups[]','Groups','required|integer');
    $this->form_validation->set_rules('user_id','User ID','trim|integer|required');

    if($this->form_validation->run() === FALSE)
    {
      if($user = $this->ion_auth->user((int) $user_id)->row())
      {
        $this->data['user'] = $user;
      }
      else
      {
        $this->session->set_flashdata('message', 'The user doesn\'t exist.');
        redirect('admin/users', 'refresh');
      }
      $this->data['groups'] = $this->ion_auth->groups()->result();
      $this->data['usergroups'] = array();
      if($usergroups = $this->ion_auth->get_users_groups($user->id)->result())
      {
        foreach($usergroups as $group)
        {
          $this->data['usergroups'][] = $group->id;
        }
      }
      $this->load->helper('form');
      $this->render('admin/users/edit_user_view');
    }
    else
    {
      $user_id = $this->input->post('user_id');
      $new_data = array(
        'username' => $this->input->post('username'),
        'email' => $this->input->post('email'),
        'first_name' => $this->input->post('first_name'),
        'last_name' => $this->input->post('last_name'),
        'company' => $this->input->post('company'),
        'phone' => $this->input->post('phone')
      );
      if(strlen($this->input->post('password'))>=6) $new_data['password'] = $this->input->post('password');

      $this->ion_auth->update($user_id, $new_data);

      //Update the groups user belongs to
      $groups = $this->input->post('groups');
      if (isset($groups) && !empty($groups))
      {
        $this->ion_auth->remove_from_group('', $user_id);
        foreach ($groups as $group)
        {
          $this->ion_auth->add_to_group($group, $user_id);
        }
      }

      $this->session->set_flashdata('message',$this->ion_auth->messages());
      redirect('admin/users','refresh');
    }
  }
 
  public function delete($user_id = NULL)
  {
    if(is_null($user_id))
    {
      $this->session->set_flashdata('message','There\'s no user to delete');
    }
    else
    {
      $this->ion_auth->delete_user($user_id);
      $this->session->set_flashdata('message',$this->ion_auth->messages());
    }
    redirect('admin/users','refresh');
  }
}