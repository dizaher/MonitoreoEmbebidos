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
        <!-- daterange picker -->
        <link href="<?php echo base_url(); ?>css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />             
        <!-- Bootstrap time Picker -->
        <link href="<?php echo base_url(); ?>css/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>        
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
            <div class="col-xs-4 col-md-4">
              <img src="<?php echo base_url();?>img/logos/TOClogo.png" alt="..." class="margin displayed">
            </div>
            <div class=" col-xs-4 col-md-4">
              <img src="<?php echo base_url();?>img/logos/uv.png" alt="..." class="margin displayed">
            </div>
            <div class="col-xs-4 col-md-4">
              <img src="<?php echo base_url();?>img/logos/mis.jpg" alt="..." class="margin displayed">
            </div>
          </div>
        </section>
      </div>        
     <!-- jQuery 2.1.3 -->
    <script src="<?php echo base_url(); ?>js/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url(); ?>js/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- InputMask -->
    <script src="<?php echo base_url(); ?>js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>    
    <!-- date-range-picker -->
    <script src="<?php echo base_url(); ?>js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>    
    <!-- bootstrap time picker -->
    <script src="<?php echo base_url(); ?>js/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
    
    <!-- Page script -->
    <script type="text/javascript">
      $(function () {
        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
                
        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
    </body>
</html>