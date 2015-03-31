<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verifyreportescs extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->library('form_validation');
   $this->load->database();
   $this->load->helper('form');   
   $this->load->model('reportes'); 
   $this->load->library("pagination");  
 }

  function index()
  {  
    if($this->session->userdata('logged_in'))
    {
      $session_data = $this->session->userdata('logged_in');          
      $data = array('nombre'=> $session_data['nombre']);
      //El método tiene la validación de credenciales o usuarios   

      $this->form_validation->set_rules('from', 'Fecha Inicio', 'trim|required');
      $this->form_validation->set_rules('to', 'Fecha Fin', 'trim|required');

      if($this->form_validation->run() == FALSE)
      {
        //Validación de campo fallado. Usuario redirigido a la página iniciar sesión
        $this->load->view('reportes_calentador_view', $data);
      } 
      $datapost = array('from'=> $this->input->post('from'), 'to' => $this->input->post('to'));
      $this->session->set_userdata($datapost);     
      $this->pagination();      
    }
    else
    {
      //If no session, redirect to login page
      redirect('login', 'refresh');     
    }   
  }
  ////////////////////////////////////////////////////////////////////////////////////////////////////////
  public function pagination() {
    $session_data = $this->session->userdata('logged_in');
    $inicio = $this->session->userdata('from');      
    $fin = $this->session->userdata('to');        
    //Go to private area          
    $config = array();
    $config["base_url"] = base_url() . "index.php/verifyreportescs/pagination";
    $config["total_rows"] = $this->reportes->consultarNumDatos_cs($inicio, $fin);
    $config["per_page"] = 20;
    $config["uri_segment"] = 3;

    $this->pagination->initialize($config);

    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $data = array('nombre'=> $session_data['nombre']);
    $data["results"] = $this->reportes->consultar_datos_cs($inicio, $fin,$config["per_page"], $page);
    $data["links"] = $this->pagination->create_links();

    $this->load->view("reportes_csconsulta_view", $data);
  }
  //////////////////////////////////////////////////////////////
  public function exportar_csv_consulta()
  {    
    $this->load->dbutil();
    $this->load->helper('download');
    $inicio = $this->session->userdata('from');      
    $fin = $this->session->userdata('to');
    $delimiter = ",";
    $newline = "\r\n";
    $query = $this->reportes->get_datosconsulta_cs($inicio, $fin);    
    $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
    force_download('CSV_Report.csv', $data);     
  } 
}
?>