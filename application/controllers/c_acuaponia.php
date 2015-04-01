<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_acuaponia extends CI_Controller {

	public function __construct()
	{		
		parent::__construct();		
		$this->load->helper('url');		
		$this->load->helper(array('form'));
		$this->load->database('default');		
		$this->load->model('alarmas');	
		$this->load->library("pagination");	
		$this->load->model('reportes');
	}	
	/** 
	ALARMAS ACUAPONIA

	*/	
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
	
	/** 
	REPORTES ACUAPONIA

	*/	
  public function index()
  {
    if($this->session->userdata('logged_in'))
    {
      $session_data = $this->session->userdata('logged_in');            
      $data = array('nombre'=> $session_data['nombre']);      
      $this->load->view('reportes_acuaponia_view',$data);
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
        $config["base_url"] = base_url() . "index.php/reportesAcuaponia/pagination";
        $config["total_rows"] = $this->reportes->getNumDatos_acu();
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
 
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data = array('nombre'=> $session_data['nombre']);
        $data["results"] = $this->reportes->get_datos_acu($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
 
        $this->load->view("reportes_acuall_view", $data);
   }
   ///////////////////////////////////////////////////  
   public function exportar_csv_all()
  {    
    $this->load->dbutil();
    $this->load->helper('download');
    $delimiter = ",";
    $newline = "\r\n";
    $query = $this->reportes->get_alldatos_acu();   
    $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
    force_download('CSV_Report.csv', $data);     
  }         

  	/** 
	GRÁFICOS ACUAPONIA

	*/
    
    public function index()
    {                                     
        $data['registros']= $this->model_calentador->listEntradas();          
        //$this->load->view('charts',$data);
        $this->load->view('graphs_acuaponia_view', $data);
    }   
    /** 
	ESTADO ACUAPONIA

	*/
    
	
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

/* End of file CONTROL CALENTADOR .php */