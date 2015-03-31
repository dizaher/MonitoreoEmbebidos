<div class="container">
  <section class="content">     
      <div class="row">
        <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                  <div class="inner">
                      <h3>
                          Calentador Solar
                      </h3>                      
                  </div>                 
                  <img style="width: 200px; height: 180px;" src="<?php echo base_url();?>img/icons/calentador.png"></img>
                  <a href="<?php echo site_url('cprincipal/calentador') ?>" class="small-box-footer">
                      Consultar<i class="fa fa-arrow-circle-right"></i>
                  </a>                  
              </div>
          </div><!-- ./col -->
          <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                  <div class="inner">
                      <h3>
                          Acuaponia
                      </h3>                      
                  </div>                  
                  <img style="width: 200px; height: 180px;" src="<?php echo base_url();?>img/icons/acuaponia.png"></img>
                  <a href="<?php echo site_url('cprincipal/acuaponico') ?>" class="small-box-footer">
                      Consultar<i class="fa fa-arrow-circle-right"></i>
                  </a>                  
              </div>
          </div><!-- ./col -->          
          <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                  <div class="inner">
                      <h3>
                          SAAR
                      </h3>                      
                  </div>
                  <img style="width: 200px; height: 180px;" alt="" src="<?php echo base_url();?>img/icons/agua.png">                  
                  <a href="<?php echo site_url('cprincipal/saar') ?>" class="small-box-footer">
                      Consultar<i class="fa fa-arrow-circle-right"></i>
                  </a>                  
              </div>
          </div><!-- ./col -->
          <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                  <div class="inner">
                      <h3>
                          Usuarios
                      </h3>                      
                  </div>                  
                  <img style="width: 200px; height: 180px;" alt="" src="<?php echo base_url();?>img/icons/person.png">
                  <a href="<?php echo site_url('cprincipal/users') ?>" class="small-box-footer">
                      Administrar<i class="fa fa-arrow-circle-right"></i>
                  </a>
              </div>
          </div><!-- ./col -->
      </div><!-- /.row -->
  </section><!-- /.content -->
</div>



<a class="btn btn-small pull-right" href="<?php echo site_url('cprincipal') ?>"><i class="icon-arrow-left"></i> Regresar</a>
<div class="row-fluid">
  <h3>Calentador Solar</h3>                                    
  <ul class="thumbnails">
    <li class="span6">
      <div class="thumbnail">
        <a class="thumbnail" href="<?php echo site_url('alarmas_calentador') ?>">
            <img alt="260x180" data-src="holder.js/260x180" src="<?php echo base_url();?>img/alarmas.png"></img>
        </a>        
        <div class="caption">
          <h3>Alarmas</h3>
        </div>
      </div>
    </li>
    <li class="span6">
      <div class="thumbnail">
        <a class="thumbnail" href="<?php echo site_url('reportesCalentador') ?>">
            <img alt="260x180" data-src="holder.js/260x180" src="<?php echo base_url();?>img/reporte.png"></img>
        </a>
        <div class="caption">
          <h3>Reportes</h3>
        </div>
      </div>
    </li>             
  </ul>         
</div>

<div class="row-fluid">
  <ul class="thumbnails">
    <li class="span6">
      <div class="thumbnail">
        <a class="thumbnail" href="<?php echo site_url('graphs_calentador') ?>">
            <img alt="260x180" data-src="holder.js/260x180" src="<?php echo base_url();?>img/graphs.png"></img>
        </a>      
        <div class="caption">
          <h3>Gráficos</h3>
        </div>
      </div>
    </li>
    <li class="span6">
      <div class="thumbnail">
        <a class="thumbnail" href="<?php echo site_url('estado_calentador') ?>">
            <img alt="260x180" data-src="holder.js/260x180" src="<?php echo base_url();?>img/config.png"></img>
        </a>
        <div class="caption">
          <h3>Estado</h3>
        </div>
      </div>
    </li>             
  </ul>                  
</div>    
<a class="btn btn-small" href="<?php echo site_url('cprincipal') ?>"><i class="icon-arrow-left"></i> Regresar</a>    