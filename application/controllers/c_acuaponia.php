<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_acuaponia extends CI_Controller {

	public function __construct()
	{		
		parent::__construct();		
		$this->load->helper('url');		
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->load->library("pagination");		
		$this->load->model('alarmas');		
		$this->load->database();	
		$this->load->model('m_acuaponia');
		$this->load->model('estado_productos');
	}	
	/** 
	ALARMAS ACUAPONIA

	*/	
	public function alarmasacu()
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
	REPORTES ACUAPONIA

	*/
	///////////////PARA GENERAR LA VISTA DE LOS REPORTES 
	public function reportesacu($res = null)
	{
		if($this->session->userdata('logged_in'))
	    {
	    	$session_data = $this->session->userdata('logged_in');     
			$data['nombre'] = $session_data['nombre']; 
			$data['correo'] = $session_data['cve_usuario'];
			$data['perfil'] = $session_data['perfil_cve_perfil']; 
	      	$data['results'] = $res;
	      	$data['links'] = $res;
	      	$data['contenido']='Acuaponia/reportes_acuaponia_view';
			$this->load->view('productosAdmin_view',$data);     	      	
	    }
	    else
	    {     
	      	redirect('login', 'refresh');     
	    }
	}
  /////////////////PARA MOSTRAR TODOS LOS DATOS RECOLECTADOS
  	public function pagination() {
        $session_data = $this->session->userdata('logged_in');
        $config = array();
        $config["base_url"] = base_url() . "index.php/c_acuaponia/pagination";
        $config["total_rows"] = $this->m_acuaponia->getNumDatos_acu();
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
 
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;        
		$data['nombre'] = $session_data['nombre']; 
		$data['correo'] = $session_data['cve_usuario'];
		$data['perfil'] = $session_data['perfil_cve_perfil'];
        $data["results"] = $this->m_acuaponia->get_datos_acu($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
 		$data['contenido']='Acuaponia/reportes_acuaponia_view';
        $this->load->view("productosAdmin_view", $data);
   }
   ////////////////PARA A UN ARCHIVO CSV TODOS LOS DATOS RECOLECTADOS  
   	public function exportar_csv_all()
  	{    
    	$this->load->dbutil();
	    $this->load->helper('download');
    	$delimiter = ",";
    	$newline = "\r\n";
    	$query = $this->m_acuaponia->get_alldatos_acu();   
    	$data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
    	force_download('CSV_Report.csv', $data);     
  	} 

  	///////////// PARA GENERAR UN REPORTE POR FECHAS 
  	public function reportefechas() {
  		$this->form_validation->set_rules('fechas', 'Rango', 'trim|required');      	

      	if($this->form_validation->run() == FALSE)
      	{
        	$this->reportesacu();
      	}
      	else{
      		$session_data = $this->session->userdata('logged_in');
      		$data['nombre'] = $session_data['nombre']; 
			$data['correo'] = $session_data['cve_usuario'];
			$data['perfil'] = $session_data['perfil_cve_perfil'];
	      	$postfecha = $this->input->post('fechas');  
			$session_data = $this->session->set_flashdata('fechas',$postfecha);	      	   	      	         
		    $config = array();
		    $config["base_url"] = base_url() . "index.php/c_acuaponia/reportefechas";
		    $config["total_rows"] = $this->m_acuaponia->consultarNumDatos_acu($postfecha);
		    $config["per_page"] = 20;
		    $config["uri_segment"] = 3;

		    $this->pagination->initialize($config);

		    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;		      		
		    $data["results"] = $this->m_acuaponia->consultar_datos_acu($postfecha,$config["per_page"], $page);
		    $data["links"] = $this->pagination->create_links();
			$data['contenido']='Acuaponia/reportes_acuaponia_view';
        	$this->load->view("productosAdmin_view", $data);
		}
   }

  	//////////// PARA EXPORTAR A UN ARCHIVO CSV EL REPORTE POR FECHAS 
   	public function exportar_fechas()
  	{    
    	$this->load->dbutil();
	    $this->load->helper('download');
	    $postfecha = $this->session->flashdata('fechas');      	    
	    $delimiter = ",";
	    $newline = "\r\n";
	    $query = $this->m_acuaponia->get_datosconsulta_acu($postfecha);    
	    $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
	    force_download('CSV_Report.csv', $data);     
  	}
  	/** 
	GRÁFICOS ACUAPONIA

	*/
    
    public function graficos()
    {                                     
        $data['registros']= $this->model_calentador->listEntradas();          
        //$this->load->view('charts',$data);
        $this->load->view('graphs_acuaponia_view', $data);
    }   
    /** 
	ESTADO ACUAPONIA

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