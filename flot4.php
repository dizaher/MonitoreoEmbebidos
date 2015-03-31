<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Flot Examples</title>
    

<script type="text/javascript" src="flot/jquery-1.8.3.min.js"></script>      
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="/js/flot/excanvas.min.js"></script><![endif]-->   
<script type="text/javascript" src="flot/jquery.flot.js"></script>
<script type="text/javascript" src="flot/jquery.flot.min.js"></script>
<script type="text/javascript" src="flot/jquery.flot.time.js"></script>
<script type="text/javascript" src="flot/jquery.flot.axislabels.js"></script>
<script type="text/javascript" src="flot/jquery.flot.symbol.js"></script>

 </head>
    <body>

    <h1>Database Plotting</h1>
<?php

    $server = "localhost";
    $user="root";
    $password=""; 
    $database = "datos";

    $connection = mysql_connect($server,$user,$password);
    $db = mysql_select_db($database,$connection);

    $query = "SELECT Px, Id FROM ti";
    $result = mysql_query($query);  

    while($row = mysql_fetch_assoc($result))
    {
        $dataset1[] = array($row['Id'],$row['Px']);
    }

?>

<script type="text/javascript">
//Sin(x)
var data1 = <?php echo json_encode($dataset1); ?>;
//Cos(x)
var data2 = [
    [0, 0.995], [1, 0.98007], [2, 0.95534], [3, 0.92106], [4, 0.87758], [5, 0.82534], [6, 0.76484], [7, 0.69671], [8, 0.62161], [9, 0.5403], [10, 0.4536], [11, 0.36236], [12, 0.2675], [13, 0.16997], [14, 0.07074], [15, -0.0292], [16, -0.12884], [17, -0.2272], [18, -0.32329], [19, -0.41615], [20, -0.50485], [21, -0.5885], [22, -0.66628], [23, -0.73739], [24, -0.80114], [25, -0.85689], [26, -0.90407], [27, -0.94222], [28, -0.97096], [29, -0.98999], [30, -0.99914], [31, -0.99829], [32, -0.98748], [33, -0.9668], [34, -0.93646], [35, -0.89676], [36, -0.8481], [37, -0.79097], [38, -0.72593], [39, -0.65364], [40, -0.57482], [41, -0.49026], [42, -0.4008], [43, -0.30733], [44, -0.2108], [45, -0.11215], [46, -0.01239], [47, 0.0875], [48, 0.18651], [49, 0.28366], [50, 0.37798]
];
//PI * x
var data3 = [
    [0, 0.31416], [1, 0.62832], [2, 0.94248], [3, 1.25664], [4, 1.5708], [5, 1.88496], [6, 2.19911], [7, 2.51327], [8, 2.82743], [9, 3.14159], [10, 3.45575], [11, 3.76991], [12, 4.08407], [13, 4.39823], [14, 4.71239], [15, 5.02655], [16, 5.34071], [17, 5.65487], [18, 5.96903], [19, 6.28319], [20, 6.59734], [21, 6.9115], [22, 7.22566], [23, 7.53982], [24, 7.85398], [25, 8.16814], [26, 8.4823], [27, 8.79646], [28, 9.11062], [29, 9.42478], [30, 9.73894], [31, 10.0531], [32, 10.36726], [33, 10.68142], [34, 10.99557], [35, 11.30973], [36, 11.62389], [37, 11.93805], [38, 12.25221], [39, 12.56637], [40, 12.88053], [41, 13.19469], [42, 13.50885], [43, 13.82301], [44, 14.13717], [45, 14.45133], [46, 14.76549], [47, 15.07964], [48, 15.3938], [49, 15.70796], [50, 16.02212]    
];
var data4 = [
    [0, 0.48], [1, 0.58], [2, 0.68], [3, 1.88], [4, 1.99], [5, 1.109], [6, 2.209], [7, 2.309], [8, 2.409], [9, 3.509], [10, 3.609], [11, 3.709], [12, 4.809], [13, 4.909], [14, 4.1109], [15, 5.1119], [16, 5.11129], [17, 5.309], [18, 5.409], [19, 6.309], [20, 6.409], [21, 6.509], [22, 7.109], [23, 7.209], [24, 7.309], [25, 8.109], [26, 8.209], [27, 8.309], [28, 9.109], [29, 9.209], [30, 9.309], [31, 10.109], [32, 10.209], [33, 10.309], [34, 10.409], [35, 11.109], [36, 11.209], [37, 11.309], [38, 12.109], [39, 12.209], [40, 12.309], [41, 13.109], [42, 13.209], [43, 13.309], [44, 14.109], [45, 14.209], [46, 14.309], [47, 15.109], [48, 15.209], [49, 15.309], [50, 16.109]    
];


var dataset = [
    {
        label: "Sin(x)",
        data: data1,
        
        color: "#FF0000",
        points: { symbol: "circle", fillColor: "#FF0000", show: true },
        lines: { show: true }
    }, {
        label: "Cos(x)",
        data: data2,
       
        color: "#0062FF",
        points: { symbol: "triangle", fillColor: "#0062FF", show: true },
        lines: {show:true, fill:true}
    }, {
        label: "PI * x",
        data: data3,
       
        color: "#319400",
        points: { symbol: "diamond", fillColor: "#319400", show: true },
        lines: { show: true }
    },{
        label: "PI * x",
        data: data4,
       
        color: "#FFFF00",
        points: { symbol: "square", fillColor: "#FFFF00", show: true },
        lines: { show: true }
    }
];


var options = {
    
    
    grid: {
        hoverable: true,
        borderWidth: 3,
        mouseActiveRadius: 50,
        backgroundColor: { colors: ["#ffffff", "#EDF5FF"] },
        axisMargin: 20
    }
};

$(document).ready(function () {
    $.plot($("#flot-placeholder"), dataset, options);
    $("#flot-placeholder").UseTooltip();
});




function gd(year, month, day) {
    return new Date(year, month - 1, day).getTime();
}

var previousPoint = null, previousLabel = null;

$.fn.UseTooltip = function () {
    $(this).bind("plothover", function (event, pos, item) {
        if (item) {
            if ((previousLabel != item.series.label) || (previousPoint != item.dataIndex)) {
                previousPoint = item.dataIndex;
                previousLabel = item.series.label;
                $("#tooltip").remove();
                
                var x = item.datapoint[0];
                var y = item.datapoint[1];

                var color = item.series.color;

                showTooltip(item.pageX, item.pageY, color,
                            "<strong>" + item.series.label + "</strong>"  +
                            " : <strong>" + y + "</strong> ");
            }
        } else {
            $("#tooltip").remove();
            previousPoint = null;
        }
    });
};

function showTooltip(x, y, color, contents) {
    $('<div id="tooltip">' + contents + '</div>').css({
        position: 'absolute',
        display: 'none',
        top: y - 40,
        left: x - 120,
        border: '2px solid ' + color,
        padding: '3px',
        'font-size': '9px',
        'border-radius': '5px',
        'background-color': '#fff',
        'font-family': 'Verdana, Arial, Helvetica, Tahoma, sans-serif',
        opacity: 0.9
    }).appendTo("body").fadeIn(200);
}




</script>
http://www.pikemere.co.uk/blog/tutorial-flot-how-to-create-bar-charts/
http://www.a2zwebhelp.com/jquery-css-flot-graph
<!-- HTML -->
<div id="flot-placeholder" style="width:550px;height:300px;margin:0 auto"></div>
circle,square,diamond,triangle,cross
 </body>
</html> 