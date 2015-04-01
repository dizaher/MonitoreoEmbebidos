<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Flot Examples</title>    
    
    <script type="text/javascript" src="<?php echo base_url(); ?>js/flot/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/flot/jquery.flot.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/flot/jquery.flot.min.js"></script>
    <style>
    #flot-tooltip { font-size: 12px; font-family: Verdana, Arial, sans-serif; position: absolute; display: none; border: 2px solid; padding: 2px; background-color: #FFF; opacity: 0.8; -moz-border-radius: 5px; -webkit-border-radius: 5px; -khtml-border-radius: 5px; border-radius: 5px; }
    </style>    

 </head>
    <body>

    <h1>Database Plotting</h1>
    
    <div id="placeholder" style="width:600px;height:300px;"></div>

<script type="text/javascript">
$(function () {

    var dataset1 = <?php json_encode($registros); ?>;    

   $.plot($("#placeholder"),[dataset1],
   {
    series: {
       points: {
            show: true,
            radius: 3
       },
       lines: {
            show: true
       },
       shadowSize: 0
        },
        grid: {
               color: '#646464',               
               borderWidth: 1,
               hoverable: true
        },
        xaxis: {
               tickColor: 'transparent'
        },        
   }
    );
  // $.plot($("#placeholder"), [JSON.parse(dataset1)]);

});
</script>

 </body>
</html> 