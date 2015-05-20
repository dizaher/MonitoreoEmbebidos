<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_ingreso extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('m_usuarios');
   $this->load->helper('form');
 }

 function index()
 {
   //El método tiene la validación de credenciales o usuarios
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Nombre de usuario', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Contraseña', 'trim|required|xss_clean|callback_check_database|max_length[15]');

   if($this->form_validation->run() == FALSE)
   {
     //Validación de campo fallado. Usuario redirigido a la página iniciar sesión
     $this->load->view('login_view');
   }
   else
   {
     //Go to private area
     $uri = 'c_principal';
    echo "<script>javascript:alert('Bienvenido'); window.location = '".$uri."'</script>";    
     //redirect('c_principal/menu');
   }

 }

 function logout()
  {    
    $this->session->sess_destroy();
    $this->load->view('login_view');
  }

 function check_database($password)
 {
   //Validación de campo tuvo éxito. Validar contra la base de datos
    $username = $this->input->post('username');        
    $cla = md5($password);
   //consultar la base de datos   
   $result = $this->m_usuarios->busca_user($username);

   if($result)
   {      
      foreach($result as $row)
      {    
               
        if ($row->u_password == $cla) { 
          $sess_array = array(
         'cve_usuario' => $row->u_correo,
         'nombre' => $row->u_nombre,
         'perfil_cve_perfil' => $row->p_descripcion
       );
       $this->session->set_userdata('logueado', $sess_array);         
          return TRUE;  
        }
        else{
          $this->form_validation->set_message('check_database', 'Tu usuario o contraseña es incorrecta');                  
          return false;

        }
      }                
    }
    else{
      $this->form_validation->set_message('check_database', 'El usuario no se encuentra en la base de datos');
          return false;
    } 
 }
}
?>
</body>
</html>