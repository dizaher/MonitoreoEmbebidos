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
		if($this->session->userdata('logged_in'))
	    {
	    	$session_data = $this->session->userdata('logged_in'); 	    	           
	      	$data = array('nombre'=> $session_data['nombre']); 
	      	$data['results'] = $res;
	      	$data['links'] = $res;
	      	$data['contenido']='Saar/reportes_saar_view';
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
        $config["base_url"] = base_url() . "index.php/c_saar/pagination";
        $config["total_rows"] = $this->m_saar->getNumDatos_sa();
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
 
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data = array('nombre'=> $session_data['nombre']);
        $data["results"] = $this->m_saar->get_datos_sa($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
 		$data['contenido']='Saar/reportes_saar_view';
        $this->load->view("productosAdmin_view", $data);
   }
   ////////////////PARA A UN ARCHIVO CSV TODOS LOS DATOS RECOLECTADOS  
   	public function exportar_csv_all()
  	{    
    	$this->load->dbutil();
	    $this->load->helper('download');
    	$delimiter = ",";
    	$newline = "\r\n";
    	$query = $this->m_saar->get_alldatos_sa();   
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
	      	$postfecha = $this->input->post('fechas');  
			$session_data = $this->session->set_flashdata('fechas',$postfecha);	      	   	      	         
		    $config = array();
		    $config["base_url"] = base_url() . "index.php/c_saar/reportefechas";
		    $config["total_rows"] = $this->m_saar->consultarNumDatos_sa($postfecha);
		    $config["per_page"] = 20;
		    $config["uri_segment"] = 3;

		    $this->pagination->initialize($config);

		    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		    $data = array('nombre'=> $session_data['nombre']);
		    $data["results"] = $this->m_saar->consultar_datos_sa($postfecha,$config["per_page"], $page);
		    $data["links"] = $this->pagination->create_links();
			$data['contenido']='Saar/reportes_saar_view';
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
	    $query = $this->m_saar->get_datosconsulta_sa($postfecha);    
	    $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
	    force_download('CSV_Report.csv', $data);     
  	}
  	/** 
	GRÁFICOS SAAR

	*/
    
    public function graficos()
    {                                     
        $data['registros']= $this->model_calentador->listEntradas();          
        //$this->load->view('charts',$data);
        $this->load->view('graphs_acuaponia_view', $data);
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