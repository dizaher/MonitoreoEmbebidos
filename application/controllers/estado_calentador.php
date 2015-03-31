<?php
//heredamos todos los recursos de la clase CI_Controller
class Estado_calentador extends CI_Controller
{	
	public function __construct()
	{		
		parent::__construct();		
		$this->load->helper('url');				
		$this->load->database('default');		
		$this->load->model('estado_productos');		
	}
	
	public function index()
	{
		if($this->session->userdata('logged_in'))
	   {
		    $session_data = $this->session->userdata('logged_in');  		    
			$data = array('nombre'=> $session_data['nombre'] ,'estados' => $this->estado_productos->get_estado_cs());			
			$this->load->view('estado_calentador_view',$data);
		}
		else
	   {
	     //If no session, redirect to login page
	     redirect('login', 'refresh');     
	   }
		
	}
}
/*
 * end application/controllers/Estado_calentador.php
 */