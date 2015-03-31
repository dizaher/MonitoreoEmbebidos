<?php
//heredamos todos los recursos de la clase CI_Model
class Alarmas extends CI_Model
{  
  public function __construct()
  {
    
    parent::__construct();      
  }
  /*///////////////////////////////////////////////////////////////////////////////////
  * 
  * funcion que busca las alarmas del dia y envia el arreglo con los valores obtenidos ya sea un arreglo vacio o con datosof something that should require
  * 
  *////////////////////////////////////////////////////////////////////////////////////
  public function get_alarmas_cs()
  {         
    date_default_timezone_set("America/Mexico_City");//zona horaria 
    $fecha = date('Y-m-d'); //fecha del cliente       
    $query = $this->db->select("fecha_hora, temp_tuberia_1");
    $query = $this->db->where("temp_tuberia_1 >",38 ); 
    $query = $this->db->where("fecha_hora between '$fecha 00:00:00' and '$fecha 23:59:59'");
    $query = $this->db->get("calentador_solar");  
    if($query -> num_rows() > 0){    
      return $query->result();
    }
    else{
      return 0;
    }
  }  
  //función para checar alarmas por rangos de fechas, recibe la fecha de inicio y de fin
  function consultar_alarmas_cs($fechai, $fechaf)
 {    
    $fi = date("Y-m-d", strtotime($fechai)).' 00:00:00';    
    $ff = date("Y-m-d", strtotime($fechaf)).' 23:59:59';   

    $query = $this->db->select('fecha_hora, temp_tuberia_1');    
    $query = $this->db->where('temp_tuberia_1 >',38); 
    $query = $this->db->where("fecha_hora between'$fi' and '$ff'");    
    $query = $this->db->get("calentador_solar"); 

   if($query -> num_rows() > 0)
   {    
     return $query->result();
   }
   else
   {
     return 0;
   }
 }
 /*///////////////////////////////////////////////////////////////////////////////////
  * 
  * funcion que busca las alarmas del dia y envia el arreglo con los valores obtenidos ya sea un arreglo vacio o con datosof something that should require
  * 
  *////////////////////////////////////////////////////////////////////////////////////
  public function get_alarmas_acu_temp()
  {         
    date_default_timezone_set("America/Mexico_City");//zona horaria 
    $fechaacu = date('Y-m-d'); //fecha del cliente       
    $query = $this->db->select("fecha_hora, temp_agua");    
    $query = $this->db->where("fecha_hora between '$fechaacu 00:00:00' and '$fechaacu 23:59:59' and (temp_agua > 29 or temp_agua < 19)");    
    $query = $this->db->get("acuaponia");  
    if($query -> num_rows() > 0){    
      return $query->result();
    }
    else{
      return 0;
    }
  }  
  public function get_alarmas_acu_ph()
  {         
    date_default_timezone_set("America/Mexico_City");//zona horaria 
    $fechaacu = date('Y-m-d'); //fecha del cliente       
    $query = $this->db->select("fecha_hora, ph");
    $query = $this->db->where("fecha_hora between '$fechaacu 00:00:00' and '$fechaacu 23:59:59' and (ph > 8 or ph < 6)");  
    $query = $this->db->get("acuaponia");  
    if($query -> num_rows() > 0){    
      return $query->result();
    }
    else{
      return 0;
    }
  }  
  //función para checar alarmas por rangos de fechas, recibe la fecha de inicio y de fin
  function consultar_alarmas_acu_temp($fechai, $fechaf)
 {    
    $fi = date("Y-m-d", strtotime($fechai)).' 00:00:00';    
    $ff = date("Y-m-d", strtotime($fechaf)).' 23:59:59';   

    $query = $this->db->select("fecha_hora, temp_agua");        
    $query = $this->db->where("fecha_hora between'$fi' and '$ff' and (temp_agua > 29 or temp_agua < 19)");    
    $query = $this->db->get("acuaponia"); 

   if($query -> num_rows() > 0)
   {    
     return $query->result();
   }
   else
   {
     return 0;
   }
 }
   function consultar_alarmas_acu_ph($fechai, $fechaf)
 {    
    $fi = date("Y-m-d", strtotime($fechai)).' 00:00:00';    
    $ff = date("Y-m-d", strtotime($fechaf)).' 23:59:59';   

    $query = $this->db->select("fecha_hora, ph");       
    $query = $this->db->where("fecha_hora between'$fi' and '$ff' and (ph > 8 or ph < 6)");    
    $query = $this->db->get("acuaponia"); 

   if($query -> num_rows() > 0)
   {    
     return $query->result();
   }
   else
   {
     return 0;
   }
 }
 /*///////////////////////////////////////////////////////////////////////////////////
  * 
  * funcion que busca las alarmas del dia y envia el arreglo con los valores obtenidos ya sea un arreglo vacio o con datosof something that should require
  * 
  *////////////////////////////////////////////////////////////////////////////////////
  public function get_alarmas_bio()
  {         
    date_default_timezone_set("America/Mexico_City");//zona horaria 
    $fecha = date('Y-m-d'); //fecha del cliente       
    $query = $this->db->select("fecha_hora, sensor_temp_reactor");    
    $query = $this->db->where("fecha_hora between '$fecha 00:00:00' and '$fecha 23:59:59' and (sensor_temp_reactor < 60 or sensor_temp_reactor > 70)");
    $query = $this->db->get("reactor_biodiesel");  
    if($query -> num_rows() > 0){    
      return $query->result();
    }
    else{
      return 0;
    }
  }  
  //función para checar alarmas por rangos de fechas, recibe la fecha de inicio y de fin
  function consultar_alarmas_bio($fechai, $fechaf)
 {    
    $fi = date("Y-m-d", strtotime($fechai)).' 00:00:00';    
    $ff = date("Y-m-d", strtotime($fechaf)).' 23:59:59';   

    $query = $this->db->select('fecha_hora, sensor_temp_reactor');        
    $query = $this->db->where("fecha_hora between'$fi' and '$ff' and (sensor_temp_reactor < 60 or sensor_temp_reactor > 70)");    
    $query = $this->db->get("reactor_biodiesel"); 

   if($query -> num_rows() > 0)
   {    
     return $query->result();
   }
   else
   {
     return 0;
   }
 }
 /*///////////////////////////////////////////////////////////////////////////////////
  * 
  * funcion que busca las alarmas del dia y envia el arreglo con los valores obtenidos ya sea un arreglo vacio o con datosof something that should require
  * 
  *////////////////////////////////////////////////////////////////////////////////////
  public function get_alarmas_eo_voltaje()
  {         
    date_default_timezone_set("America/Mexico_City");//zona horaria 
    $fecha = date('Y-m-d'); //fecha del cliente       
    $query = $this->db->select("fecha_hora, voltaje");    
    $query = $this->db->where("fecha_hora between '$fecha 00:00:00' and '$fecha 23:59:59' and (voltaje < 0 or voltaje > 12)");
    $query = $this->db->get("generador_eolico");  
    if($query -> num_rows() > 0){    
      return $query->result();
    }
    else{
      return 0;
    }
  }  
  public function get_alarmas_eo_viento()
  {         
    date_default_timezone_set("America/Mexico_City");//zona horaria 
    $fecha = date('Y-m-d'); //fecha del cliente       
    $query = $this->db->select("fecha_hora, velocidad_viento");    
    $query = $this->db->where("fecha_hora between '$fecha 00:00:00' and '$fecha 23:59:59' and (velocidad_viento < 4 or velocidad_viento > 4)");
    $query = $this->db->get("generador_eolico");  
    if($query -> num_rows() > 0){    
      return $query->result();
    }
    else{
      return 0;
    }
  }  
  //función para checar alarmas por rangos de fechas, recibe la fecha de inicio y de fin
  function consultar_alarmas_eo_voltaje($fechai, $fechaf)
 {    
    $fi = date("Y-m-d", strtotime($fechai)).' 00:00:00';    
    $ff = date("Y-m-d", strtotime($fechaf)).' 23:59:59';   

    $query = $this->db->select("fecha_hora, voltaje");         
    $query = $this->db->where("fecha_hora between'$fi' and '$ff' and (voltaje < 0 or voltaje > 12)");    
    $query = $this->db->get("generador_eolico"); 

   if($query -> num_rows() > 0)
   {    
     return $query->result();
   }
   else
   {
     return 0;
   }
 }
 function consultar_alarmas_eo_viento($fechai, $fechaf)
 {    
    $fi = date("Y-m-d", strtotime($fechai)).' 00:00:00';    
    $ff = date("Y-m-d", strtotime($fechaf)).' 23:59:59';   

    $query = $this->db->select("fecha_hora, velocidad_viento");        
    $query = $this->db->where("fecha_hora between'$fi' and '$ff' and (velocidad_viento < 4 or velocidad_viento > 4)");    
    $query = $this->db->get("generador_eolico"); 

   if($query -> num_rows() > 0)
   {    
     return $query->result();
   }
   else
   {
     return 0;
   }
 }
  
}
/*
 * end application/models/alarmas.php
 */