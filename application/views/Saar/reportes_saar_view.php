<div class="container">   
<h1 class="text-light-blue">Reportes Sistema de Agua</h1> 
  <section class="content">         
    <a href="<?php echo site_url('c_principal/saar') ?>" class="btn btn-app"><i class="fa fa-mail-reply"></i>Regresar</a>
      <div class="row">  		
              <div class="box box-primary">                
                <div class="box-body">
                  <!-- Date range -->  
                  <div class="row">
                  	<div class="col-md-6">
	                  <div class="form-group">
	                    <label>Reporte por rango de fechas:</label>
	                    <?php echo form_open('c_saar/reportefechas'); ?>

	                    <?php if(validation_errors()):?>
						<div class="alert alert-warning alert-dismissible">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <?php echo validation_errors(); ?>
						</div>		    
					    <?php endif;?>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                        <i class="fa fa-calendar"></i>
	                      </div>
	                      <input name="fechas" class="form-control pull-right" id="reservation" type="text">                  		
	                    </div><!-- /.input group -->       
	                    <br>             
	                    <button class="btn btn-block btn-primary">Consultar</button>
	                    <?php echo form_close(); ?>
	                  </div><!-- /.form group --> 	                                                     	
                  	</div>
                  	<div class="col-md-6">
                  		 <div class="form-group"> 
                  		 <label>Reporte de todos los datos sensados:</label>  
                  		 <br>

		                  	<a href="<?php echo site_url('c_saar/pagination') ?>" class="btn btn-block btn-default">
		                  		<i class="fa fa-table"></i> Consultar Todos
		                  	</a>                  	
		                  </div>
                  	</div>                   					                                 
					</div>                
                </div><!-- /.box-body -->
              </div><!-- /.box -->  
              <div class="box box-primary">
              	<div class="box-body">              		
              		<?php
              		if ($results == null) {
              			echo $results;
              		}
              		else{              			
              			if (isset($_POST['fechas'])) {              				              		
	              		?>							              		
	              		<a class="btn btn-primary pull-right" href="<?php echo site_url('c_saar/exportar_fechas') ?>"><i class="fa fa-download"></i> Exportar CSV</a>
	              		<?php
	              		}
	              		else{
	              		?>
	              		<a class="btn btn-primary pull-right" href="<?php echo site_url('c_saar/exportar_csv_all') ?>"><i class="fa fa-download"></i> Exportar CSV</a>
	              		<?php
	              		}
	              		?>
				    	<table class="table">
				    		<caption>Resultados de consulta</caption>
						<tr>
						    <th>Fecha</th>
						    <th>Flujo</th>
						    <th>Nivel 1</th>						    
						    <th>Nivel 2</th>
						</tr>
						<?php 
						if ($results == 0) {
					    	echo "No hay datos";
					    }
					    else{

							foreach($results as $data){ ?>
							<tr>
							    <td><?php echo $data->sa_fecha; ?></td>
							    <td><?php echo $data->sa_flujo; ?></td>
							    <td><?php echo $data->sa_nivel1; ?></td>
							    <td><?php echo $data->sa_nivel2; ?></td>							    
							</tr>
							 
							<?php
							}
						}
						?>
						</table>	 		    	
						<p><?php echo $links; ?></p>
					<?php } ?>
              	</div>              	
              </div>                                     		    					
      </div><!-- /.row -->
      <a href="<?php echo site_url('c_principal/saar') ?>" class="btn btn-app"><i class="fa fa-mail-reply"></i>Regresar</a>
  </section><!-- /.content -->
</div>		