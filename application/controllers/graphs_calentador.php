<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Graphs_calentador extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_calentador');
        $this->load->helper('url');
        $this->load->database('default');        
    }
    public function index()
    {                                     
        $data['registros']= $this->model_calentador->lisEnt();  
        //$this->load->view('charts',$data);
        $this->load->view('graphs_calentador_view', $data);
    }    
}
/*
 * end of application/controllers/graphs_Calentador.php
 */