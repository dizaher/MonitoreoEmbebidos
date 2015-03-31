<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SMPPSS</title>
</head>
<body>
  
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verifyalarmaseo extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->library('form_validation');
   $this->load->database();
   $this->load->helper('form');
   $this->load->helper('url');
   $this->load->model('alarmas');   
 }

 function index()
 {
    if($this->session->userdata('logged_in'))
     {
      $session_data = $this->session->userdata('logged_in');          
      $data = array('nombre'=> $session_data['nombre'] ,'alarmasdiavol' => $this->alarmas->get_alarmas_eo_voltaje(),'alarmasdiavi' => $this->alarmas->get_alarmas_eo_viento());
      //El método tiene la validación de credenciales o usuarios   

     $this->form_validation->set_rules('from', 'Fecha Inicio', 'trim|required');
     $this->form_validation->set_rules('to', 'Fecha Fin', 'trim|required');
     $this->form_validation->set_rules('var', 'Variable', 'trim|required');

     if($this->form_validation->run() == FALSE)
     {
       //Validación de campo fallado. Usuario redirigido a la página iniciar sesión
       $this->load->view('alarmas_eolico_view', $data);
     }
     else
     {
       //Go to private area  
       $inicio = $this->input->post('from');
       $fin = $this->input->post('to');   
       $var = $this->input->post('var');       
       if ($var == 1) { //consultas de voltaje
          $data1 = array('nombre'=> $session_data['nombre'] ,'alarmasvol' => $this->alarmas->consultar_alarmas_eo_voltaje($inicio, $fin));           
          $this->load->view('alarmas_rangoseo_view', $data1);     
       }       
       else{//consultas de viento
          $data1 = array('nombre'=> $session_data['nombre'] ,'alarmasvi' => $this->alarmas->consultar_alarmas_eo_viento($inicio, $fin));           
          $this->load->view('alarmas_rangoseo_view', $data1);
       } 
       //redirect('alarmas_rangoscs', $resultados);
     }
  }
  else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');     
   }   
 }

}
?>
</body>
</html>