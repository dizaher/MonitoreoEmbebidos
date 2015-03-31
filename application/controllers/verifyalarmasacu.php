<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SMPPSS</title>
</head>
<body>
  
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verifyalarmasacu extends CI_Controller {

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
      $data = array('nombre'=> $session_data['nombre'] ,'alarmasdiatemp' => $this->alarmas->get_alarmas_acu_temp(),'alarmasdiaph' => $this->alarmas->get_alarmas_acu_ph());
      //El método tiene la validación de credenciales o usuarios   

     $this->form_validation->set_rules('from', 'Fecha Inicio', 'trim|required');
     $this->form_validation->set_rules('to', 'Fecha Fin', 'trim|required');
     $this->form_validation->set_rules('var', 'Variable', 'trim|required');

     if($this->form_validation->run() == FALSE)
     {
       //Validación de campo fallado. Usuario redirigido a la página iniciar sesión
       $this->load->view('alarmas_acuaponia_view', $data);
     }
     else
     {
       //Go to private area  
       $inicio = $this->input->post('from');
       $fin = $this->input->post('to');   
       $var = $this->input->post('var');       
       if ($var == 1) { //consultas de ph
          $data1 = array('nombre'=> $session_data['nombre'] ,'resph' => $this->alarmas->consultar_alarmas_acu_ph($inicio, $fin));           
          $this->load->view('alarmas_rangosacu_view', $data1);     
       }       
       else{//consultas de temperatura
          $data1 = array('nombre'=> $session_data['nombre'] ,'restemp' => $this->alarmas->consultar_alarmas_acu_temp($inicio, $fin));           
          $this->load->view('alarmas_rangosacu_view', $data1);
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