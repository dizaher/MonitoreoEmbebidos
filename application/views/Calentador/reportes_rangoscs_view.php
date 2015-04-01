<!DOCTYPE html>
<html>	
	<head>		
		<meta charset="UTF-8" />		
		<!--de esta forma tan sencilla imprimimos
		la variable título que hemos traído desde el
		controlador hasta la vista a través del array data-->
		<title>Principal SMPPSS</title>
		<link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" />
	  	<link href="<?php echo base_url(); ?>css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
	  	<link href="<?php echo base_url(); ?>css/jquery-ui.css" rel="stylesheet" type="text/css">
		<script src="<?php echo base_url(); ?>js/jquery-1.10.2.js"></script>
		<script src="<?php echo base_url(); ?>js/jquery-ui.js"></script>			  	 		  
	</head>	
	<body>
		<div class="container">
		    <div class="row">
		      <div class="span2">        
		        <img src="<?php echo base_url();?>img/TOClogo.png" alt="Logo TOC" width="400" heigth="350"/><br>
		      </div>
		      <div class="span8">        
		        <h3>Sistema de monitoreo de Productos Piloto de Sustentabilidad Social</h3>
		      </div>
		      <div class="span2">
		        <h6>Bienvenid@ <?php echo $nombre; ?>!
		        <a href="home/logout">Cerrar Sesión</a></h6>
		      </div>      
		    </div> 
		    <div class="row fondo">	
		    <h3>Calentador Solar</h3>	    			    						    		    						    		    
				<h4>Reporte datos</h4>	
				<!--Se recorre el arreglo datoscal que se recibio y se muestran las alarmas   -->              		  			
			   <table class="table">
				<tr>
				    <th>Fecha</th>
				    <th>Tuberia 1</th>
				    <th>Tuberia 2</th>
				    <th>Agua Caliente</th>
				    <th>Agua Fría</th>
				</tr>
				<?php foreach($lista as $fila) : ?>
				<tr>
				    <td><?php echo $fila->fecha_hora; ?></td>
				    <td><?php echo $fila->temp_tuberia_1; ?></td>
				    <td><?php echo $fila->temp_tuberia_2; ?></td>
				    <td><?php echo $fila->temp_agua_caliente; ?></td>
				    <td><?php echo $fila->temp_agua_fria; ?></td>
				</tr>
				 
				<?php
				endforeach;
				?>
				</table>
				<div class="paginacion">
				<?php echo $paginacion ?>
				</div>
	    	<hr>	    	
			<a class="btn btn-large btn-primary" href="<?php echo site_url('reportesCalentador') ?>"><i class="icon-arrow-left icon-white"></i> Regresar</a>
			</div>			
	<div class="container">
		<div class="row">				
			<footer class="piePagina">       
		    <address>
		    <strong>&copy; Copyright 2013 Todos los derechos Reservados.TOC Technology Outsourcing Center</strong><br>
		    Calle México # 34,Colonia Pumar, Xalapa , Veracruz, México    
		    <abbr title="Teléfono">Tel:</abbr> +052 (228) 8419919<br>
		    www.tocveracruz.com.mx, RFC: TTO0804297VA<br>
		    <a href="mailto:#">contacto@tocveracruz.com.mx</a>
		    </address>                  
			</footer>
		</div>
	</div>
   <!-- /container -->     
 
  <script type="text/javascript" src="<?php echo base_url();?>js/bootstrap.min.js" ></script>
  <script type="text/javascript" src="<?php echo base_url();?>js/bootstrap.js" ></script>  
	</body>
	
</html>