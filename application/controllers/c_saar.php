<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_saar extends CI_Controller {

	public function __construct()
	{		
		parent::__construct();		
		$this->load->helper('url');		
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->load->library("pagination");		
		$this->load->model('alarmas');		
		$this->load->database();	
		$this->load->model('m_saar');
		$this->load->model('estado_productos');
	}	
	/** 
	ALARMAS SAAR

	*/	
	public function alarmassa()
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
	
	/** 
	REPORTES SAAR

	*/
	///////////////PARA GENERAR LA VISTA DE LOS REPORTES 
	public function reportessa($res = null)
	{
		if($this->session->userdata('logueado'))
	    {
	    	$session_data = $this->session->userdata('logueado');     
			$data['nombre'] = $session_data['nombre']; 
			$data['correo'] = $session_data['cve_usuario'];
			$data['perfil'] = $session_data['perfil_cve_perfil']; 
	      	$data['results'] = $res;
	      	$data['links'] = $res;
	      	$data['contenido']='Saar/reportes_saar_view';
			$this->load->view('productosAdmin_view',$data);     	      	
	    }
	    else
	    {     
	      	redirect('c_ingreso', 'refresh');     
	    }
	}
  /////////////////PARA MOSTRAR TODOS LOS DATOS RECOLECTADOS
  	public function pagination() {
  		if($this->session->userdata('logueado'))
	    {
	        $session_data = $this->session->userdata('logueado');
	        $config = array();
	        $config["base_url"] = base_url() . "index.php/c_saar/pagination";
	        $config["total_rows"] = $this->m_saar->getNumDatos_sa();
	        $config["per_page"] = 20;
	        $config["uri_segment"] = 3;
	 
	        $this->pagination->initialize($config);
	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;        
			$data['nombre'] = $session_data['nombre']; 
			$data['correo'] = $session_data['cve_usuario'];
			$data['perfil'] = $session_data['perfil_cve_perfil'];
	        $data["results"] = $this->m_saar->get_datos_sa($config["per_page"], $page);
	        $data["links"] = $this->pagination->create_links();
	 		$data['contenido']='Saar/reportes_saar_view';
	        $this->load->view("productosAdmin_view", $data);
	    }
	    else
	    {     
	      	redirect('c_ingreso', 'refresh');     
	    }    
   }
   ////////////////PARA A UN ARCHIVO CSV TODOS LOS DATOS RECOLECTADOS  
   	public function exportar_csv_all()
  	{
  		if($this->session->userdata('logueado'))
	    {    
	    	$this->load->dbutil();
		    $this->load->helper('download');
	    	$delimiter = ",";
	    	$newline = "\r\n";
	    	$query = $this->m_saar->get_alldatos_sa();   
	    	$data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
	    	force_download('CSV_Report.csv', $data);   
    	}
	    else
	    {     
	      	redirect('c_ingreso', 'refresh');     
	    }  
  	} 

  	///////////// PARA GENERAR UN REPORTE POR FECHAS 
  	public function reportefechas() {
  		if($this->session->userdata('logueado'))
	    {
	  		$this->form_validation->set_rules('fechas', 'Rango', 'trim|required');      	

	      	if($this->form_validation->run() == FALSE)
	      	{
	        	$this->reportesacu();
	      	}
	      	else{
	      		$session_data = $this->session->userdata('logueado');
	      		$data['nombre'] = $session_data['nombre']; 
				$data['correo'] = $session_data['cve_usuario'];
				$data['perfil'] = $session_data['perfil_cve_perfil'];
		      	$postfecha = $this->input->post('fechas');  
				$session_data = $this->session->set_flashdata('fechas',$postfecha);	      	   	      	         
			    $config = array();
			    $config["base_url"] = base_url() . "index.php/c_saar/reportefechas";
			    $config["total_rows"] = $this->m_saar->consultarNumDatos_sa($postfecha);
			    $config["per_page"] = 20;
			    $config["uri_segment"] = 3;

			    $this->pagination->initialize($config);

			    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;		       			
			    $data["results"] = $this->m_saar->consultar_datos_sa($postfecha,$config["per_page"], $page);
			    $data["links"] = $this->pagination->create_links();
				$data['contenido']='Saar/reportes_saar_view';
	        	$this->load->view("productosAdmin_view", $data);
			}
		}
	    else
	    {     
	      	redirect('c_ingreso', 'refresh');     
	    }
   }

  	//////////// PARA EXPORTAR A UN ARCHIVO CSV EL REPORTE POR FECHAS 
   	public function exportar_fechas()
  	{
  		if($this->session->userdata('logueado'))
	    {    
	    	$this->load->dbutil();
		    $this->load->helper('download');
		    $postfecha = $this->session->flashdata('fechas');      	    
		    $delimiter = ",";
		    $newline = "\r\n";
		    $query = $this->m_saar->get_datosconsulta_sa($postfecha);    
		    $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
		    force_download('CSV_Report.csv', $data);     
		}
	    else
	    {     
	      	redirect('c_ingreso', 'refresh');     
	    }
  	}
  	/** 
	GRÁFICOS SAAR

	*/
    
    public function graphs_saar()
	{
		if($this->session->userdata('logueado'))
	    {
	    	$session_data = $this->session->userdata('logueado');     
			$data['nombre'] = $session_data['nombre']; 
			$data['correo'] = $session_data['cve_usuario'];
			$data['perfil'] = $session_data['perfil_cve_perfil']; 	      	
	      	$data['contenido']='';
			$this->load->view('Saar/graphs_saar_view',$data);     	      	
	    }
	    else
	    {     
	      	redirect('c_ingreso', 'refresh');     
	    }
	} 
    /** 
	ESTADO SAAR

	*/
    
	
	public function funcionamiento()
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

/* End of file CONTROL CALENTADOR .php */