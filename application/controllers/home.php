
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function index()
 {  
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');     
     $data['nombre'] = $session_data['nombre']; 
     $perfil = $session_data['perfil_cve_perfil'];    
     if($perfil==1){//condición para mostrar la vista del administrador 
      $this->load->view('productosAdmin_view', $data);    
     }
     else{
      if ($perfil==2) {//condición para la vista del tecnico
        $this->load->view('productosTecnico_view', $data);        
      }
      else
        if ($perfil==3) {// condición para la vista del usuario
          $this->load->view('user_view', $data);         
        }
     }  
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');     
   }
 }

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('home', 'refresh');
 }

}

?>