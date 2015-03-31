<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Conexion_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('inserts_model');
        $this->load->helper('url');
        $this->load->database('default');
        
    }
    public function index()
    {            

        $this->inserts_model->insert_datos($arrayjson);
    }
}
/*
 * end of application/controllers/conexion_controller.php
 */