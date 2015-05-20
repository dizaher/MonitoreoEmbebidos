<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_principal extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');  
		$this->load->helper('form');  
	}	

	function index(){	
		if($this->session->userdata('logueado'))
		{			
			$session_data = $this->session->userdata('logueado');	
			$data['nombre'] = $session_data['nombre']; 
			$data['correo'] = $session_data['cve_usuario'];
			$data['perfil'] = $session_data['perfil_cve_perfil'];    
			
			$data['contenido']='productos_view';
			$this->load->view('productosAdmin_view', $data);
		}		
		else
		{
			//If no session, redirect to login page
			redirect('c_ingreso', 'refresh');     
		}		        	
	}
	

	public function acuaponico()
	{		   
		if($this->session->userdata('logueado'))
		{			
			$session_data = $this->session->userdata('logueado');	
			$data['nombre'] = $session_data['nombre']; 
			$data['correo'] = $session_data['cve_usuario'];
			$data['perfil'] = $session_data['perfil_cve_perfil'];
			$data['contenido']='Acuaponia/acuaponico_view';
			$this->load->view('productosAdmin_view',$data);
		}		
		else
		{
			//If no session, redirect to login page
			redirect('c_ingreso', 'refresh');     
		} 
	}

	public function calentador()
	{		    
		if($this->session->userdata('logueado'))
		{			
			$session_data = $this->session->userdata('logueado');	
			$data['nombre'] = $session_data['nombre']; 
			$data['correo'] = $session_data['cve_usuario'];
			$data['perfil'] = $session_data['perfil_cve_perfil'];
			$data['contenido']='Calentador/calentadorSolar_view';
			$this->load->view('productosAdmin_view',$data);
		}		
		else
		{
			//If no session, redirect to login page
			redirect('c_ingreso', 'refresh');     
		}		
	}

	public function saar()
	{		    
		if($this->session->userdata('logueado'))
		{			
			$session_data = $this->session->userdata('logueado');	
			$data['nombre'] = $session_data['nombre']; 
			$data['correo'] = $session_data['cve_usuario'];
			$data['perfil'] = $session_data['perfil_cve_perfil'];
			$data['contenido']='Saar/saar_view';
			$this->load->view('productosAdmin_view',$data);
		}		
		else
		{
			//If no session, redirect to login page
			redirect('c_ingreso', 'refresh');     
		} 
	}

	public function users()
	{		   
		if($this->session->userdata('logueado'))
		{			
			$session_data = $this->session->userdata('logueado');	
			$data['nombre'] = $session_data['nombre']; 
			$data['correo'] = $session_data['cve_usuario'];
			$data['perfil'] = $session_data['perfil_cve_perfil'];
			$data['contenido']='catusuarios_view';
			$this->load->view('productosAdmin_view',$data);
		}		
		else
		{
			//If no session, redirect to login page
			redirect('c_ingreso', 'refresh');     
		} 		
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */