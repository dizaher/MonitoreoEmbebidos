<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_calentador extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    //insertamos un nuevo usuario en la tabla users
    public function insert_datos()
    {   
        date_default_timezone_set("America/Mexico_City");
        $fecha = date('Y-m-d');
        $hora= date("H:i:s");
        $grados = rand(180, 900)/10;        
        $data = array(
            'ejeY'       =>   $grados,
            'Fecha'          =>   "$fecha $hora",
            );
            $this->db->insert('graficos',$data);
    }
    //mostramos los ultimos 100 registros insertados 
    public function listEntradas(){
        $this->db->select('ejeY')->from('graficos')->order_by('Fecha','desc')->limit(100);
        $query = $this->db->get();
        if($query->num_rows() > 0 )
        {
            return $query->result();
        }
    } 
    public function lisEnt(){ 
        //http://cassianinet.blogspot.mx/2011/09/cargando-select-con-codeigniter.html#axzz32weUkPjd       
        //consulta con llenado de datos en arreglo 
        $query = $this->db->query('SELECT Px, Py FROM ti');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $dataset1[] = array($row->Px,$row->Py);
            }
            $query->free_result();
            return $dataset1;
        }

    }
}
/*
 * end of application/models/consultas_model.php
 */