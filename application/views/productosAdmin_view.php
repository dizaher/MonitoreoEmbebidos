<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Principal SMPPSS</title>
	<link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
  <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 40px;
      }

      /* Custom container */
      .container-narrow {
        margin: 0 auto;
        max-width: 700px;
      }
      .container-narrow > hr {
        margin: 10px 0;
      }
            
    </style>
    
  </head>

  <body>

    <div class="container-narrow">
      <div class="row-fluid">
        <div class="span2">
          <img src="<?php echo base_url();?>img/TOClogo.png" alt="Logo TOC" width="100px"/>
        </div>
        <div class="span6">
          <h3 class="muted">Sistema de monitoreo de Productos Piloto de Sustentabilidad Social</h3>
        </div>
        <div class="span4">                    
          <p class="text-right">Bienvenid@ <?php echo $nombre; ?>! <a href="cprincipal/logout">Cerrar Sesión</a></p> 
          <div class="btn-group pull-right">
            <a class="btn btn-small" href="<?php echo site_url('catusuarios/administracion') ?>"><i class="icon-user"></i> Usuarios</a>                          
          </div>
        </div>
      </div>  
      <hr>    
      
      <?php $this->load->view($contenido) ?>

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