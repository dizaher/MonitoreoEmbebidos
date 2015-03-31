<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Heredamos de la clase CI_Controller */
class Catalogos extends CI_Controller {

  function __construct()
  {

    parent::__construct();
    $this->load->helper('url');    
  }

  function index()
  {
  	if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');     
     $data['nombre'] = $session_data['nombre']; 
     $perfil = $session_data['perfil_cve_perfil'];
     $this->load->view('catalogos_view', $data);
    }
    
    else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');     
   }
  }

  /*
   *
   **/
  
}