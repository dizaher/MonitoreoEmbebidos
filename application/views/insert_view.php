<!doctype html>
<html>
<head>
	<meta charset="UTF-8" />
    <title>Gráficos Calentador Solar</title>    
	    <!-- JavaScript -->
	<script src="<?php echo base_url(); ?>js/jquery.js"></script>	
	<link href="<?php echo base_url(); ?>css/examples.css" rel="stylesheet" type="text/css" />	
	<link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" />
  	<link href="<?php echo base_url(); ?>css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
	<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="../../excanvas.min.js"></script><![endif]-->		
	</head>
    <script type="text/javascript">
        var int=self.setInterval("refresh()",1500);
        function refresh()
        {
                location.reload(true);
        }
    </script>    
<body>
	<div class="container">
	    <div class="row">
	      <div class="span2">        
	        <img src="<?php echo base_url();?>img/TOClogo.png" alt="Logo TOC" width="400" heigth="350"/><br>
	      </div>
	      <div class="span8">        
	        <h2>Sistema de monitoreo de Productos Piloto de Sustentabilidad Social</h2>
	      </div>
	      <div class="span2">
	        <h6>Bienvenid@!
	        <a href="home/logout">Cerrar Sesión</a></h6>
	      </div>      
	    </div>        

		<h3>Insertar datos aleatorios </h3>        
	</div>	
    <div class="container">        
        <a class="btn btn-large btn-primary" href="<?php echo site_url('home') ?>"><i class="icon-arrow-left icon-white"></i> Regresar</a>            
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
</body>
