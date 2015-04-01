<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_principal extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');  
		$this->load->helper('form');  
	}

	function index()
	{  		
		$this->load->view('login_view');		
	}

	public function menu(){
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');     
			$data['nombre'] = $session_data['nombre']; 
			$perfil = $session_data['perfil_cve_perfil'];    
			if($perfil==1){//condición para mostrar la vista del administrador 
				$data['contenido']='productos_view';
				$this->load->view('productosAdmin_view', $data);    
			}
			else{
				if ($perfil==2) {//condición para la vista del tecnico
					$data['contenido']='productos_view';
					$this->load->view('productosTecnico_view', $data);        
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
		$this->session->sess_destroy();
		redirect('login', 'refresh');
	}

	public function acuaponico()
	{
		$session_data = $this->session->userdata('logged_in');     
		$data['nombre'] = $session_data['nombre'];
		$data['contenido']='Acuaponia/acuaponico_view';
		$this->load->view('productosAdmin_view',$data); 
	}

	public function calentador()
	{
		$session_data = $this->session->userdata('logged_in');     
		$data['nombre'] = $session_data['nombre'];
		$data['contenido']='Calentador/calentadorSolar_view';
		$this->load->view('productosAdmin_view',$data); 
	}

	public function saar()
	{
		$session_data = $this->session->userdata('logged_in');     
		$data['nombre'] = $session_data['nombre'];
		$data['contenido']='Saar/saar_view';
		$this->load->view('productosAdmin_view',$data); 
	}

	public function users()
	{
		$session_data = $this->session->userdata('logged_in');     
		$data['nombre'] = $session_data['nombre'];
		$data['contenido']='generadorEolico_view';
		$this->load->view('productosAdmin_view',$data); 
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */