<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_calentador extends CI_Controller {

	public function __construct()
	{		
		parent::__construct();		
		$this->load->helper('url');		
		$this->load->helper(array('form'));
		$this->load->library("pagination");		
		$this->load->model('alarmas');
		$this->load->model('reportes');	
		$this->load->database();	
		$this->load->model('model_calentador');
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
	public function reportescs()
	{
		if($this->session->userdata('logged_in'))
	    {
	    	$session_data = $this->session->userdata('logged_in');            
	      	$data = array('nombre'=> $session_data['nombre']); 
	      	$data['contenido']='Calentador/reportes_calentador_view';
			$this->load->view('productosAdmin_view',$data);     	      	
	    }
	    else
	    {     
	      	redirect('login', 'refresh');     
	    }
	}
  //////////////////////////////////////////////////
  	public function pagination() {
        $session_data = $this->session->userdata('logged_in');
        $config = array();
        $config["base_url"] = base_url() . "index.php/reportesCalentador/pagination";
        $config["total_rows"] = $this->reportes->getNumDatos_cs();
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
 
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data = array('nombre'=> $session_data['nombre']);
        $data["results"] = $this->reportes->get_datos_cs($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
 
        $this->load->view("reportes_csall_view", $data);
   }
   ///////////////////////////////////////////////////  
   	public function exportar_csv_all()
  	{    
    	$this->load->dbutil();
	    $this->load->helper('download');
    	$delimiter = ",";
    	$newline = "\r\n";
    	$query = $this->reportes->get_alldatos_cs();   
    	$data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
    	force_download('CSV_Report.csv', $data);     
  	}    

  	/** 
	GRÁFICOS CALENTADOR SOLAR

	*/
    public function graficoscs()
    {                                     
        $data['registros']= $this->model_calentador->lisEnt();  
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