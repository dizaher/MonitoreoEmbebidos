<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SMPPSS</title>
</head>
<body>
  
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verifyalarmascs extends CI_Controller {

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
      $data = array('nombre'=> $session_data['nombre'] ,'alarmasdia' => $this->alarmas->get_alarmas_cs());
      //El método tiene la validación de credenciales o usuarios   

     $this->form_validation->set_rules('from', 'Fecha Inicio', 'trim|required');
     $this->form_validation->set_rules('to', 'Fecha Fin', 'trim|required|callback_check_database');

     if($this->form_validation->run() == FALSE)
     {
       //Validación de campo fallado. Usuario redirigido a la página iniciar sesión
       $this->load->view('alarmas_calentador_view', $data);
     }
     else
     {
       //Go to private area  
       $inicio = $this->input->post('from');
       $fin = $this->input->post('to');   
      $data1 = array('nombre'=> $session_data['nombre'] ,'result' => $this->alarmas->consultar_alarmas_cs($inicio, $fin));           
      $this->load->view('alarmas_rangoscs_view', $data1);    
       //redirect('alarmas_rangoscs', $resultados);
     }
  }
  else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');     
   }   
 }

 function check_database($to)
 {
   //Validación de campo tuvo éxito. Validar contra la base de datos
   $from = $this->input->post('from');

   //consultar la base de datos
   $result = $this->alarmas->consultar_alarmas_cs($from, $to);

   if($result>= 0)
   {            
     return true;
   }
   else  { 
     $this->form_validation->set_message('check_database', 'Error en consulta');
     return false;
   }
 }
}
?>
</body>
</html>