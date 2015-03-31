<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Gráficos Biodiesel</title>    
        <!-- JavaScript -->
    <script src="<?php echo base_url(); ?>js/jquery.js"></script>   
    <link href="<?php echo base_url(); ?>css/examples.css" rel="stylesheet" type="text/css" />  
    <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="../../excanvas.min.js"></script><![endif]-->        
    </head>
    <script type="text/javascript">
        /*var int=self.setInterval("refresh()",1000);
        function refresh()
        {
                location.reload(true);
        }*/
    </script>
    <script>
    $(function () {
    $(document).ready(function() {
        Highcharts.setOptions({
            global: {
                useUTC: false
            }
        });
    
        var chart;
        $('#container').highcharts({
            chart: {
                type: 'spline',
                animation: Highcharts.svg, // don't animate in old IE
                marginRight: 10,
                events: {
                    load: function() {
    
                        // set up the updating of the chart each second
                        var series = this.series[0];
                        setInterval(function() {
                            var x = (new Date()).getTime(), // hora actual
                                y = Math.random();
                            series.addPoint([x, y], true, true);
                        }, 1000);
                    }
                }
            },
            title: {
                text: 'Datos Biodiesel en tiempo real'
            },
            xAxis: {
                type: 'datetime',
                tickPixelInterval: 150
            },
            yAxis: {
                title: {
                    text: 'Value'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) +'<br/>'+
                        Highcharts.numberFormat(this.y, 2);
                }
            },
            legend: {
                enabled: false
            },
            exporting: {
                enabled: true
            },
            series: [{
                name: 'Random data',
                data: (function() {
                    // generar un arreglo con datos aleatorios
                    var data = [],
                        time = (new Date()).getTime(),
                        i;
    
                    for (i = -19; i <= 0; i++) {
                        data.push({
                            x: time + i * 1000,
                            y: Math.random() 
                        });
                    }
                    return data;
                })()
            }]
        });
    });
    
});
</script>
<!-- HTML -->
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
            <h6>Bienvenid@!
            <a href="home/logout">Cerrar Sesión</a></h6>
          </div>      
        </div>        

        <h3>Gráficos Reactor Biodiesel</h3>        
    </div>

    <div class="container">
        <script src="<?php echo base_url(); ?>js/Highcharts/js/highcharts.js"></script>
        <script src="<?php echo base_url(); ?>js/Highcharts/js/modules/exporting.js"></script>      
        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>		
		<a class="btn btn-large btn-primary" href="<?php echo site_url('biodiesel') ?>"><i class="icon-arrow-left icon-white"></i> Regresar</a>			
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
</body>
