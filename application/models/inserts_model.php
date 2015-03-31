<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Inserts_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    //insertamos un nuevo usuario en la tabla users
    public function insert_datos($arrayjson)
    {   
        date_default_timezone_set("America/Mexico_City");//zona horaria
        $fecha = date('Y-m-d');//fecha del cliente 
        $hora= date("H:i:s"); // hora del cliente
        switch ($x)
        {
            case 1:
                echo "Number 1";
                break;
            case 2:
                echo "Number 2";
                break;
            case 3:
                echo "Number 3";
                break;
            default:
            echo "No number between 1 and 3";
        }
        $grados = rand(180, 900)/10;        
        $data = array(
            'ejeY'       =>   $grados,
            'Fecha'          =>   "$fecha $hora",
            );
            $this->db->insert('graficos',$data);
    }             
}
/*
 * end of application/models/consultas_model.php
 */