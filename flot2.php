<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Flot Examples</title>
    <link href="./flot/layout.css" rel="stylesheet" type="text/css">
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="../excanvas.min.js"></script><![endif]-->
    <script language="javascript" type="text/javascript" src="flot/jquery.js"></script>
    <script language="javascript" type="text/javascript" src="flot/jquery.flot.js"></script>

 </head>
    <body>

    <h1>Database Plotting</h1>

    <div id="placeholder" style="width:600px;height:300px;"></div>

<?php

    $server = "localhost";
    $user="root";
    $password=""; 
    $database = "datos";

    $connection = mysql_connect($server,$user,$password);
    $db = mysql_select_db($database,$connection);

    $query = "SELECT Px, Py FROM ti";
    $result = mysql_query($query);  

    while($row = mysql_fetch_assoc($result))
    {
        $dataset1[] = array($row['Px'],$row['Py']);
    }

?>

<script type="text/javascript">
$(function () {
    var dataset1 = <?php echo json_encode($dataset1); ?>;

   //$.plot($("#placeholder"),[dataset1] );
  $.plot($("#placeholder"), [
    {
        data: dataset1,
        bars: {
            show: true,
            fillColor:  "#AA4643"            
        }        
    }
    ]);
});
</script>
http://www.pikemere.co.uk/blog/tutorial-flot-how-to-create-bar-charts/
http://www.a2zwebhelp.com/jquery-css-flot-graph
 </body>
</html> 