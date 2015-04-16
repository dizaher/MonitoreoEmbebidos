<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_ingreso extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('m_usuarios');
 }

 function index()
 {
   //El método tiene la validación de credenciales o usuarios
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Nombre de usuario', 'trim|required|xss_clean|max_length[15]|callback_check_rol');
   $this->form_validation->set_rules('password', 'Contraseña', 'trim|required|xss_clean|callback_check_database|max_length[15]');

   if($this->form_validation->run() == FALSE)
   {
     //Validación de campo fallado. Usuario redirigido a la página iniciar sesión
     redirect('c_principal');
   }
   else
   {
     //Go to private area
     redirect('c_principal/menu');
   }

 }

 function check_database($password)
 {
   //Validación de campo tuvo éxito. Validar contra la base de datos
   $username = $this->input->post('username');

   //consultar la base de datos
   $result = $this->m_usuarios->login($username, $password);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'cve_usuario' => $row->cve_usuario,
         'nombre' => $row->nombre,
         'perfil_cve_perfil' => $row->perfil_cve_perfil
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else  { 
     $this->form_validation->set_message('check_database', 'Tu usuario o contraseña es incorrecta');
     return false;
   }
 }
}
?>
</body>
</html>