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
		    	<h3>Eólico</h3>	    			    						    		    						    		                 		  			
			    <?php
			    if (isset($alarmasvol)){
			     	if ($alarmasvol == 0) {
				    	echo "Sin alarmas en Voltaje";
				    }
				    else{
				    	?>
				    	<h4>Alarmas Voltaje</h4>
				    	<?php
					    foreach ($alarmasvol as $avo) {				 			    					    
						    ?> 	
							    <div class="alert">
								    <button type="button" class="close" data-dismiss="alert">&times;</button>
								    <strong>Advertencia!</strong>			      
							      		<?php echo $avo->fecha_hora.','.$avo->voltaje ?>
							  	</div>			      
						    <?php 					
			    		}
		    		}	
			     } 
			     else{
				     if (isset($alarmasvi)) {			     	
				     	if ($alarmasvi == 0) {
					    	echo "Sin alarmas en Viento";
					    }
					    else{
					    	?>
					    	<h4>Alarmas Viento</h4>
					    	<?php
						    foreach ($alarmasvi as $avi) {				    					    					    
							    ?> 	
								    <div class="alert">
									    <button type="button" class="close" data-dismiss="alert">&times;</button>
									    <strong>Advertencia!</strong>			      
								      		<?php echo $avi->fecha_hora.','.$avi->velocidad_viento ?>
								  	</div>			      
							    <?php 												
				    		}
			    		}
				     }
				     else{
				     	echo "No se definieron las variables";
				     }
			 	}
			      		
	    		?>
	    	<hr>	    	
			<a class="btn btn-large btn-primary" href="<?php echo site_url('alarmas_eolico') ?>"><i class="icon-arrow-left icon-white"></i> Regresar</a>
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