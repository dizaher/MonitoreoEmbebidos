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
    <body class="skin-blue">
    <div class="wrapper">
    <header class="header">            
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">               
                <div class="navbar-right">
                    <ul class="nav navbar-nav">                                                                      
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>Jane Doe <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="../img/avatar3.png" class="img-circle" alt="User Image" />
                                    <p>
                                        Jane Doe - Web Developer
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-default btn-flat">Sign out</a>
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
      <section class="content">
       <!-- info row -->
      <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">              
              <address>
                  <strong>TOC Technology Outsourcing Center</strong><br>
                  Calle México # 34,Colonia Pumar<br>
                  Xalapa , Veracruz<br>
                  Teléfono: </abbr> +052 (228) 8419919<br/>
                  Email: <a href="mailto:#">contacto@tocveracruz.com.mx</a>
              </address>
          </div><!-- /.col -->          
      </div><!-- /.row -->
    </section> 
   <!-- jQuery 2.0.2 -->
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
      <!-- Bootstrap -->
      <script src="<?php echo base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>       
    </body>
</html>