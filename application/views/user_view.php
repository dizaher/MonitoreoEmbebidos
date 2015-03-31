<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Principal SMPPSS</title>
	<link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
</head>
<body>	   	
   	<div class="container">
    <div class="row">
      <div class="span2">        
        <img src="../img/TOClogo.png" alt="Logo TOC" width="400" heigth="350"><br>
      </div>
      <div class="span8">        
        <h3>Sistema de monitoreo de Productos Piloto de Sustentabilidad Social</h3>
      </div>
      <div class="span2">
        <h6>Bienvenid@ <?php echo $nombre; ?>!
        <a href="home/logout">Cerrar Sesión</a></h6>
      </div>      
    </div>        
    <div class="navbar">
      <div class="navbar-inner">        
          <ul class="nav">
            <li class="active"><a href="#tab1" data-toggle="tab"><i class="icon-bell"></i> Alarmas</a></li>
            <li><a href="#tab2" data-toggle="tab"><i class="icon-signal"></i> Gráficos</a></li>
            <li><a href="#"><i class="icon-folder-open"></i> Reportes</a></li>
            <li><a href="#"><i class="icon-wrench"></i> Administración</a></li>            
          </ul>
      </div>
    </div>          
    <footer class="piePagina">
       
          <address>
          <strong>&copy; Copyright 2013 Todos los derechos Reservados.TOC Technology Outsourcing Center</strong><br>
          Calle México # 34,Colonia Pumar, Xalapa , Veracruz, México    
          <abbr title="Teléfono">Tel:</abbr> +052 (228) 8419919<br>
          www.tocveracruz.com.mx, RFC: TTO0804297VA<br>
          <a href="mailto:#">contacto@tocveracruz.com.mx</a>
          </address>
                    
    </footer>
  </div> <!-- /container -->  
  <script type="text/javascript" src="<?php echo base_url();?>js/jquery.js" ></script>
  <script type="text/javascript" src="<?php echo base_url();?>js/bootstrap.min.js" ></script>
</body>
</html>