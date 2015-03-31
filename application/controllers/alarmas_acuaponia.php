<?php
//heredamos todos los recursos de la clase CI_Controller
class Alarmas_acuaponia extends CI_Controller
{	
	public function __construct()
	{		
		parent::__construct();		
		$this->load->helper('url');		
		$this->load->helper(array('form'));
		$this->load->database('default');		
		$this->load->model('alarmas');		
	}
	
	public function index()
	{
		if($this->session->userdata('logged_in'))
	   {
		    $session_data = $this->session->userdata('logged_in');  		    
			$data = array('nombre'=> $session_data['nombre'] ,'alarmasdiatemp' => $this->alarmas->get_alarmas_acu_temp(),'alarmasdiaph' => $this->alarmas->get_alarmas_acu_ph());			
			$this->load->view('alarmas_acuaponia_view',$data);
		}
		else
	   {
	     //If no session, redirect to login page
	     redirect('login', 'refresh');     
	   }
		
	}
}
/*
 * end application/controllers/home.php
 */