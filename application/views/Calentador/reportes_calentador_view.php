<div class="container">   
<h1 class="text-light-blue">Reportes Calentador Solar</h1> 
  <section class="content">         
    <a href="<?php echo site_url('c_principal/calentador') ?>" class="btn btn-app"><i class="fa fa-mail-reply"></i>Regresar</a>
      <div class="row">  
		<?php echo form_open('verifyreportescs'); ?>
			<?php echo validation_errors('<div class="alert alert-error">', '</div>'); ?>
              <div class="box box-primary">
                
                <div class="box-body">
                  <!-- Date range -->  
                  <div class="row">
                  	<div class="col-md-6">
	                  <div class="form-group">
	                    <label>Reporte por rango de fechas:</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                        <i class="fa fa-calendar"></i>
	                      </div>
	                      <input class="form-control pull-right" id="reservation" type="text">                  		
	                    </div><!-- /.input group -->       
	                    <br>             
	                    <button class="btn btn-block btn-primary">Consultar</button>
	                  </div><!-- /.form group -->                                    		
                  	</div>
                  	<div class="col-md-6">
                  		 <div class="form-group"> 
                  		 <label>Reporte de todos los datos sensados:</label>  
                  		 <br>

		                  	<a href="<?php echo site_url('reportesCalentador/pagination') ?>" class="btn btn-block btn-default">
		                  		<i class="fa fa-table"></i> Consultar Todos
		                  	</a>                  	
		                  </div>
                  	</div>                   					                                 
					</div>                
                </div><!-- /.box-body -->
              </div><!-- /.box -->                                       		    
			<?php echo form_close(); ?>			
      </div><!-- /.row -->
      <a href="<?php echo site_url('c_principal/calentador') ?>" class="btn btn-app"><i class="fa fa-mail-reply"></i>Regresar</a>
  </section><!-- /.content -->
</div>		