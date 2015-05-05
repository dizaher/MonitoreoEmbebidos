<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Heredamos de la clase CI_Controller */
class C_usuarios extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('m_usuarios');    
  }
 
  public function index()
  {
    if($this->session->userdata('logged_in'))
     {
        $session_data = $this->session->userdata('logged_in');          
        $data['users'] = $this->m_usuarios->users();
        $data['contenido'] = 'Usuarios/catusuarios_view';
        $data['nombre'] = $session_data['nombre'];        
        $data['correo'] = $session_data['cve_usuario'];
        $data['perfil'] = $session_data['perfil_cve_perfil'];
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
      $uri = 'c_usuarios';
      echo "<script>javascript:alert('Usuario registrado'); window.location = '".$uri."'</script>";      
      //redirect('c_usuarios','refresh');
    }
  }
 
  public function edit($user_id = NULL)
  {
    $data['perfiles'] = $this->m_usuarios->get_perfil_dropdown();
    $user_id = $this->input->post('user_correo') ? $this->input->post('user_correo') : $user_id;
    $this->data['page_title'] = 'Edit user';
    $this->load->library('form_validation');
    
    $this->form_validation->set_rules('first_name','Nombre','trim|required');
    $this->form_validation->set_rules('last_name','Apellidos','trim|required');    
    $this->form_validation->set_rules('phone','Teléfono','trim|required');        
    $this->form_validation->set_rules('password','Password','required');
    $this->form_validation->set_rules('password_confirm','Password confirmation','required|matches[password]');
    $this->form_validation->set_rules('perfil','Perfil','trim|required');

    if($this->form_validation->run() == FALSE)
    {
      if($user = $this->m_usuarios->user((int) $user_id)->row())
      {
        //$this->data['user'] = $user;
        $data['user'] = $user;
      }
      else
      {
        $this->session->set_flashdata('message', 'El usuario no existe.');
        redirect('c_usuarios', 'refresh');
      }
      
      $this->load->helper('form');
      $session_data = $this->session->userdata('logged_in');
      $data['contenido'] = 'Usuarios/edituser_view';
      $data['nombre'] = $session_data['nombre'];
      $this->load->view('productosAdmin_view', $data);
      //$this->load->view('Usuarios/edituser_view', $this->data);
    }
    else
    {
      $user_id = $this->input->post('user_id');
      $new_data = array(        
        'u_nombre' => $this->input->post('first_name'),
        'u_apellidos' => $this->input->post('last_name'),        
        'u_telefono' => $this->input->post('phone'),
        'u_password' => md5($this->input->post('password')),
        'u_idperfil' => $this->input->post('perfil')
      );
      $this->m_usuarios->update($user_id, $new_data);      
      $uri = 'c_usuarios';
      echo "<script>javascript:alert('Usuario actualizado'); window.location = '".$uri."'</script>";
      
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