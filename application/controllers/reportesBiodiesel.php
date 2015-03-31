<?php
//heredamos todos los recursos de la clase CI_Controller
class ReportesBiodiesel extends CI_Controller
{ 
  public function __construct()
  {   
    parent::__construct();   
    $this->load->helper("url");    
    $this->load->library("pagination");   
    $this->load->helper(array('form'));
    $this->load->model('reportes');              
    $this->load->database();            
  }

  public function index()
  {
    if($this->session->userdata('logged_in'))
    {
      $session_data = $this->session->userdata('logged_in');            
      $data = array('nombre'=> $session_data['nombre']);      
      $this->load->view('reportes_biodiesel_view',$data);
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
        $config["base_url"] = base_url() . "index.php/reportesBiodiesel/pagination";
        $config["total_rows"] = $this->reportes->getNumDatos_bio();
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
 
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data = array('nombre'=> $session_data['nombre']);
        $data["results"] = $this->reportes->get_datos_bio($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
 
        $this->load->view("reportes_bioall_view", $data);
   }
   ///////////////////////////////////////////////////  
   public function exportar_csv_all()
  {    
    $this->load->dbutil();
    $this->load->helper('download');
    $delimiter = ",";
    $newline = "\r\n";
    $query = $this->reportes->get_alldatos_bio();   
    $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
    force_download('CSV_Report.csv', $data);     
  }                     
}
/*
* end application/controllers/home.php
*/