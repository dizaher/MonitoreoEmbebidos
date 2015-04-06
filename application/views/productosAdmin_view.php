<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Monitoreo SE</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url(); ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo base_url(); ?>css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>css/AdminLTE.css" rel="stylesheet" type="text/css" />        
    </head>
    <body class="skin-blue layout-top-nav">
    <div class="wrapper">
      <header class="main-header">         
          <!-- Header Navbar: style can be found in header.less -->
          <nav class="navbar navbar-static-top" role="navigation">   
          <h1 class="titulo">Sistema de monitoreo de sistemas Embebidos</h1>                                  
              <div class="navbar-right">
                  <ul class="nav navbar-nav">                                                                                          
                      <!-- User Account: style can be found in dropdown.less -->                        
                      <li class="dropdown user user-menu">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              <i class="glyphicon glyphicon-user"></i>
                              <span><?php echo $nombre; ?><i class="caret"></i></span>
                          </a>
                          <ul class="dropdown-menu">
                              <!-- User image -->
                              <li class="user-header bg-light-blue">
                                  <img src="../img/avatar3.png" class="img-circle" alt="User Image" />
                                  <p>
                                      <?php echo $nombre; ?> - Web Developer
                                      <small>Member since Nov. 2012</small>
                                  </p>
                              </li>                                
                              <!-- Menu Footer-->
                              <li class="user-footer">                                    
                                  <div class="pull-right">
                                      <a href="c_principal/logout" class="btn btn-default btn-flat">Salir</a>
                                  </div>
                              </li>
                          </ul>
                      </li>
                  </ul>
              </div>
          </nav>
        </header>
        </div>
      
      <?php $this->load->view($contenido) ?>  

      <div class="container">
        <section class="content">     
          <div class="row">
            <div class="col-lg-4">
              <img src="<?php echo base_url();?>img/logos/TOClogo.png" alt="..." class="margin">
            </div>
            <div class="col-lg-4">
              <img src="<?php echo base_url();?>img/logos/uv.png" alt="..." class="margin">
            </div>
            <div class="col-lg-4">
              <img src="<?php echo base_url();?>img/logos/mis.jpg" alt="..." class="margin">
            </div>
          </div>
        </section>
      </div>    
   <!-- jQuery 2.0.2 -->
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
      <!-- Bootstrap -->
      <script src="<?php echo base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>       
    </body>
</html>