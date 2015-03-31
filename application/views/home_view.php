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
        <img src="<?php echo base_url();?>img/TOClogo.png" alt="Logo TOC" /><br>
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
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-signal"></i> Gráficos<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo site_url('graphcs/carga_vista') ?>">Calentador Solar</a></li>
                  <li><a href="<?php echo site_url('graphbio/carga_vista') ?>">Biodiesel</a></li>
                  <li><a href="<?php echo site_url('graphacu/carga_vista') ?>">Acuaponia</a></li>                  
                  <li><a href="<?php echo site_url('graphge/carga_vista') ?>">Generador Eólico</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-folder-open"></i> Reportes<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li class="dropdown-submenu">
                  <a tabindex="-1" href="#">Alarmas</a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Calentador Solar</a></li>
                    <li><a href="#">Biodiesel</a></li>
                    <li><a href="#">Acuaponia</a></li>                  
                    <li><a href="#">Generador Eólico</a></li>
                  </ul>
                  </li>                  
                  <li class="dropdown-submenu">
                  <a tabindex="-1" href="#">Bitácora</a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Calentador Solar</a></li>
                    <li><a href="#">Biodiesel</a></li>
                    <li><a href="#">Acuaponia</a></li>                  
                    <li><a href="#">Generador Eólico</a></li>
                  </ul>
                  </li>                              
                </ul>
              </li> 
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-wrench"></i> Administración<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Calentador Solar</a></li>
                  <li><a href="#">Biodiesel</a></li>
                  <li><a href="#">Acuaponia</a></li>                  
                  <li><a href="#">Generador Eólico</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-user"></i> Catálogos<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo site_url('catusuarios/administracion') ?>">Usuarios</a></li>
                  <li><a href="<?php echo site_url('catmodulos/administracion') ?>">Módulos</a></li>
                  <li><a href="#">Producto Piloto</a></li>                  
                </ul>
              </li>                                                                                   
          </ul>
      </div>
    </div>             
  </div>
  <div class="container">
   <!--lo mismo para las provincias, pero como provincias es un
      array nos toca recorrerlo con un foreach por ejemplo-->
    <?php foreach($provincias as $provincia): ?>  
      
      <div><?php echo $provincia->temp_tuberia_1 ?></div>
      
    <?php endforeach ?>
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
   <!-- /container -->   
  <script type="text/javascript" src="<?php echo base_url();?>js/jquery.js" ></script>
  <script type="text/javascript" src="<?php echo base_url();?>js/bootstrap.min.js" ></script>
</body>
</html>