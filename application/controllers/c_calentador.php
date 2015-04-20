<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_calentador extends CI_Controller {

	public function __construct()
	{		
		parent::__construct();		
		$this->load->helper('url');		
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->load->library("pagination");		
		$this->load->model('alarmas');		
		$this->load->database();	
		$this->load->model('m_calentador');
		$this->load->model('estado_productos');
	}	
	
	/** 
	ALARMAS CALENTADOR SOLAR

	*/
	public function alarmascs()
	{
		if($this->session->userdata('logged_in'))
	   {
		    $session_data = $this->session->userdata('logged_in');  		    
			$data = array('nombre'=> $session_data['nombre'] ,'alarmasdia' => $this->alarmas->get_alarmas_cs());			
			$this->load->view('alarmas_calentador_view',$data);
		}
		else
	   {
	     //If no session, redirect to login page
	     redirect('login', 'refresh');     
	   }
		
	}
	
	/** 
	REPORTES CALENTADOR SOLAR

	*/
	///////////////PARA GENERAR LA VISTA DE LOS REPORTES 
	public function reportescs($res = null)
	{
		if($this->session->userdata('logged_in'))
	    {
	    	$session_data = $this->session->userdata('logged_in'); 	    	           
	      	$data = array('nombre'=> $session_data['nombre']); 
	      	$data['results'] = $res;
	      	$data['links'] = $res;
	      	$data['contenido']='Calentador/reportes_calentador_view';
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
        $config["base_url"] = base_url() . "index.php/c_calentador/pagination";
        $config["total_rows"] = $this->m_calentador->getNumDatos_cs();
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
 
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data = array('nombre'=> $session_data['nombre']);
        $data["results"] = $this->m_calentador->get_datos_cs($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
 		$data['contenido']='Calentador/reportes_calentador_view';
        $this->load->view("productosAdmin_view", $data);
   }
   ////////////////PARA A UN ARCHIVO CSV TODOS LOS DATOS RECOLECTADOS  
   	public function exportar_csv_all()
  	{    
    	$this->load->dbutil();
	    $this->load->helper('download');
    	$delimiter = ",";
    	$newline = "\r\n";
    	$query = $this->m_calentador->get_alldatos_cs();   
    	$data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
    	force_download('CSV_Report.csv', $data);     
  	} 

  	///////////// PARA GENERAR UN REPORTE POR FECHAS 
  	public function reportefechas() {
  		$this->form_validation->set_rules('fechas', 'Rango', 'trim|required');      	

      	if($this->form_validation->run() == FALSE)
      	{
        	$this->reportescs();
      	}
      	else{
      		$session_data = $this->session->userdata('logged_in');
	      	$postfecha = $this->input->post('fechas');     	      	         
		    $config = array();
		    $config["base_url"] = base_url() . "index.php/c_calentador/reportefechas";
		    $config["total_rows"] = $this->m_calentador->consultarNumDatos_cs($postfecha);
		    $config["per_page"] = 20;
		    $config["uri_segment"] = 3;

		    $this->pagination->initialize($config);

		    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		    $data = array('nombre'=> $session_data['nombre']);
		    $data["results"] = $this->m_calentador->consultar_datos_cs($postfecha,$config["per_page"], $page);
		    $data["links"] = $this->pagination->create_links();
			$data['contenido']='Calentador/reportes_calentador_view';
        	$this->load->view("productosAdmin_view", $data);
		}
   }

  	//////////// PARA EXPORTAR A UN ARCHIVO CSV EL REPORTE POR FECHAS 
   	public function exportar_fechas()
  	{    
    	$this->load->dbutil();
	    $this->load->helper('download');
	    $inicio = $this->session->userdata('from');      
	    $fin = $this->session->userdata('to');
	    $delimiter = ",";
	    $newline = "\r\n";
	    $query = $this->m_calentador->get_datosconsulta_cs($postfecha);    
	    $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
	    force_download('CSV_Report.csv', $data);     
  	}
  	/** 
	GRÁFICOS CALENTADOR SOLAR

	*/
    public function graficoscs()
    {                                     
        $data['registros']= $this->m_calentador->lisEnt();  
        //$this->load->view('charts',$data);
        $this->load->view('graphs_calentador_view', $data);
    }    
    /** 
	ESTADO CALENTADOR SOLAR

	*/
    
	
	public function estadocs()
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