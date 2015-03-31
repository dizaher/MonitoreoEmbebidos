<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Graphs_biodiesel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_calentador');
        $this->load->helper('url');
        $this->load->database('default');
        $this->model_calentador->insert_datos();
    }
    public function index()
    {                                     
        $data['registros']= $this->model_calentador->listEntradas();          
        //$this->load->view('charts',$data);
        $this->load->view('graphs_biodiesel_view', $data);
    }
}
/*
 * end of application/controllers/consultas.php
 */