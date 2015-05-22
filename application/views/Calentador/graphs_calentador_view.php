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
                                  <p>
                                      <?php echo $correo; ?>
                                      <small><?php echo $perfil; ?></small>
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
      
      <div class="container">
          <h1 class="text-light-blue">Calentador Solar</h1>

        <section class="content">         
          <a href="<?php echo site_url('c_principal/calentador') ?>" class="btn btn-app"><i class="fa fa-mail-reply"></i>Regresar</a>
                <div class="row">
                  <div class="col-xs-12">
                    <!-- interactive chart -->
                    <div class="box box-primary">
                      <div class="box-header">
                        <i class="fa fa-bar-chart-o"></i>
                        <h3 class="box-title">Lecturas en tiempo real</h3>                        
                      </div>
                      <div class="box-body">
                        <div id="interactive" style="height: 300px;"></div>
                      </div><!-- /.box-body-->
                    </div><!-- /.box -->

                  </div><!-- /.col -->
                </div><!-- /.row -->
            <a href="<?php echo site_url('c_principal/calentador') ?>" class="btn btn-app"><i class="fa fa-mail-reply"></i>Regresar</a>
        </section><!-- /.content -->
      </div> 

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
    <!-- FastClick -->
    <script src='<?php echo base_url(); ?>js/plugins/fastclick/fastclick.min.js'></script>
   
    
    <!-- FLOT CHARTS -->
    <script src="<?php echo base_url(); ?>js/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
    <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
    <script src="<?php echo base_url(); ?>js/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>        

    <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
    <script src="<?php echo base_url(); ?>js/plugins/flot/jquery.flot.pie.min.js" type="text/javascript"></script>
    <!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
    <script src="<?php echo base_url(); ?>js/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
        
    <script type="text/javascript">
      $(function () {        
        // We use an inline data source in the example, usually data would
        // be fetched from a server
        var data = [], totalPoints = 100;
        function getRandomData() {
          if (data.length > 0)
            data = data.slice(1);
          // Do a random walk
          while (data.length < totalPoints) {
            var prev = data.length > 0 ? data[data.length - 1] : 50,
                    y = prev + Math.random() * 10 - 5;

            if (y < 0) {
              y = 0;
            } else if (y > 100) {
              y = 100;
            }
            data.push(y);
          }
          // Zip the generated y values with the x values
          var res = [];
          for (var i = 0; i < data.length; ++i) {
            res.push([i, data[i]]);
          }
          return res;
        }
        
        var interactive_plot = $.plot("#interactive", [getRandomData()], {
          grid: {
            borderColor: "#f3f3f3",
            borderWidth: 1,
            tickColor: "#f3f3f3"
          },
          series: {
            shadowSize: 0, // Drawing is faster without shadows
            color: "#3c8dbc"
          },
          lines: {
            fill: true, //Converts the line chart to area chart
            color: "#3c8dbc"
          },
          yaxis: {
            min: 0,
            max: 100,
            show: true
          },
          xaxis: {
            show: true
          }
        });

        var updateInterval = 500; //Fetch data ever x milliseconds
        var realtime = "on"; //If == to on then fetch data every x seconds. else stop fetching
        function update() {

          interactive_plot.setData([getRandomData()]);
          // Since the axes don't change, we don't need to call plot.setupGrid()
          interactive_plot.draw();
          if (realtime === "on")
            setTimeout(update, updateInterval);
        }
        //INITIALIZE REALTIME DATA FETCHING
        update();                
      });      
    </script>
    </body>
</html>



