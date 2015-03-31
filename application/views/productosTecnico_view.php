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
        <img src="<?php echo base_url();?>img/TOClogo.png" alt="Logo TOC" width="400" heigth="350"/><br>
      </div>
      <div class="span8">        
        <h2>Sistema de monitoreo de Productos Piloto de Sustentabilidad Social</h2>
      </div>
      <div class="span2">
        <h6>Bienvenid@ <?php echo $nombre; ?>!
        <a href="home/logout">Cerrar Sesión</a></h6>
      </div>      
    </div>                      
    <ul class="thumbnails">
      <li class="span4">
          <a class="thumbnail" href="#">
              <img alt="260x180" data-src="holder.js/260x180" style="width: 260px; height: 180px;" src="<?php echo base_url();?>img/acuaponia.png"></img>
          </a>
      </li>
      <li class="span4">
          <a class="thumbnail" href="#">
              <img alt="260x180" data-src="holder.js/260x180" style="width: 260px; height: 180px;" src="<?php echo base_url();?>img/calentador.png"></img>
          </a>
      </li>
      <li class="span4">
          <a class="thumbnail" href="#">
              <img alt="260x180" data-src="holder.js/260x180" style="width: 260px; height: 180px;" src="<?php echo base_url();?>img/diesel.png"></img>
          </a>
      </li>
      <li class="span4">
          <a class="thumbnail" href="#">
              <img alt="260x180" data-src="holder.js/260x180" style="width: 260px; height: 180px;" src="<?php echo base_url();?>img/monitoreo.png"></img>
          </a>
      </li>
      <li class="span4">
          <a class="thumbnail" href="#">
              <img alt="260x180" data-src="holder.js/260x180" style="width: 260px; height: 180px;" src="<?php echo base_url();?>img/eolico.png"></img>
          </a>
      </li>
      <li class="span4">
          <a class="thumbnail" href="#">
              <img alt="260x180" data-src="holder.js/260x180" style="width: 260px; height: 180px;" src="<?php echo base_url();?>img/deshidratador.png"></img>
          </a>
      </li>
      <li class="span4">
          <a class="thumbnail" href="#">
              <img alt="260x180" data-src="holder.js/260x180" style="width: 260px; height: 180px;" src="<?php echo base_url();?>img/agua.png"></img>
          </a>
      </li>
      <li class="span4">
          <a class="thumbnail" href="#">
              <img alt="260x180" data-src="holder.js/260x180" style="width: 260px; height: 180px;" src="<?php echo base_url();?>img/biodigestor.png"></img>
          </a>
      </li>      
    </ul>
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