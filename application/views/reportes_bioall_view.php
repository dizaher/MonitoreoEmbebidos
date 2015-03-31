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
	  	 <script>
			$(function() {
			$( "#from" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 1,
			onClose: function( selectedDate ) {
			$( "#to" ).datepicker( "option", "minDate", selectedDate );
			}
			});
			$( "#to" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 1,
			onClose: function( selectedDate ) {
			$( "#from" ).datepicker( "option", "maxDate", selectedDate );
			}
			});
			});
			</script>			  	
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
		    	<h3>Biodiesel</h3>
		    	<a class="btn btn-large" href="<?php echo site_url('reportesBiodiesel/exportar_csv_all') ?>"><i class="icon-download"></i> Exportar</a>   			    						    		    						    		    		    	
				<hr>
		    	<table class="table">
				<tr>
				    <th>Fecha</th>
				    <th>Temperatura reactor</th>				    
				    <th>Bomba 1</th>
				    <th>Bomba 2</th>
				</tr>
				<?php 
				if ($results == 0) {
			    	echo "No hay datos";
			    }
			    else{

					foreach($results as $data){ ?>
					<tr>
					    <td><?php echo $data->fecha_hora; ?></td>
					    <td><?php echo $data->sensor_temp_reactor; ?></td>
					    <td><?php echo $data->bomba_1; ?></td>
					    <td><?php echo $data->bomba_2; ?></td>					    
					</tr>					 
					<?php
					}
				}
				?>
				</table>	 		    	
				<p><?php echo $links; ?></p>
			<hr>		
			<a class="btn btn-large btn-primary" href="<?php echo site_url('reportesBiodiesel') ?>"><i class="icon-arrow-left icon-white"></i> Regresar</a>
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