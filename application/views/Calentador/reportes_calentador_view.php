<div class="container">   
<h1 class="text-light-blue">Reportes Calentador Solar</h1> 
  <section class="content">         
    <a href="<?php echo site_url('c_principal/calentador') ?>" class="btn btn-app"><i class="fa fa-mail-reply"></i>Regresar</a>
      <div class="row">  		
              <div class="box box-primary">                
                <div class="box-body">
                  <!-- Date range -->  
                  <div class="row">
                  	<div class="col-md-6">
	                  <div class="form-group">
	                    <label>Reporte por rango de fechas:</label>
	                    <?php echo form_open('c_calentador/reportefechas'); ?>

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

		                  	<a href="<?php echo site_url('c_calentador/pagination') ?>" class="btn btn-block btn-default">
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
	              		?>						
	              		<a class="btn btn-primary pull-right" href="<?php echo site_url('c_calentador/exportar_csv_all') ?>"><i class="fa fa-download"></i> Exportar CSV</a>
				    	<table class="table">
				    		<caption>Resultados de consulta</caption>
						<tr>
						    <th>Fecha</th>
						    <th>Temp 1</th>
						    <th>Temp 2</th>
						    <th>Temp 3</th>
						    <th>Temp 4</th>
						    <th>Bomba</th>
						</tr>
						<?php 
						if ($results == 0) {
					    	echo "No hay datos";
					    }
					    else{

							foreach($results as $data){ ?>
							<tr>
							    <td><?php echo $data->cs_fecha; ?></td>
							    <td><?php echo $data->cs_temp1; ?></td>
							    <td><?php echo $data->cs_temp2; ?></td>
							    <td><?php echo $data->cs_temp3; ?></td>
							    <td><?php echo $data->cs_temp4; ?></td>
							    <td><?php echo $data->cs_bomba; ?></td>
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
      <a href="<?php echo site_url('c_principal/calentador') ?>" class="btn btn-app"><i class="fa fa-mail-reply"></i>Regresar</a>
  </section><!-- /.content -->
</div>		