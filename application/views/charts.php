<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="css/960.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <style type="text/css">

        body{
            background: #ffefef;
        }
        #consulta{
            display: none;
            font-size: 12px;
            background: #d5d8dd;
            margin-bottom: 15px;
        }
        .container_12{
            background: #1b89da;
            border: 5px solid #fff;
        }
        #cuerpo{
            margin-top: 10px;
        }
        #cabecera{
            margin-top: 10px;
            background: #111;
            color: #fff;
            margin-left: 0px;
        }
        .mostrar{
            color: #fff;
            font-weight: bold;
            text-align: center;
            font-size: 22px;
            cursor: pointer;
        }
        pre{
            border: 1px solid #111;
            background: #fff;
            margin-left: -60px;
            margin-right: 30px;
        }
        #consulta_sql{
            margin: 20px 0px;
        }
        h3{
            font-size: 18px;
            text-align: center;
            color: #9e0606;
        }
    </style>
</head>
<script type="text/javascript">
    $(document).ready(function(){
        $(".mostrar").click(function(){
            $(this).next('#consulta').slideToggle();
        });
    })
</script>
<script type="text/javascript">
     /*   var int=self.setInterval("refresh()",1000);
        function refresh()
        {
                location.reload(true);
        }*/
</script>
<body>    
    <div class="container_12">
        <div class="mostrar">Consulta de los ultimos datos registrados</div>
        <div class="grid_12" id="consulta">            
            <?php
            foreach($registros as $fila)
            {
                ?>
                <div class="grid_12" id="cuerpo">
                    <div class="grid_3"><?=$fila->ejeY?></div>
                    <div class="grid_5"><?=$fila->Fecha?></div>                    
                </div>
                <?php
            }
            ?>            
        </div>
    </div>
    <div class="container_12">
        <div class="mostrar">Quinta consulta usando get_where</div>
        <div class="grid_12" id="consulta">
 
            <div class="grid_12" id="cabecera">
                <div class="grid_2">Username</div>
                <div class="grid_3">First name</div>
                <div class="grid_3">Last name</div>
                <div class="grid_3">Register date</div>
            </div>
            <?php
            foreach($search_before_users as $fila)
            {
                ?>
                <div class="grid_12" id="cuerpo">
                    <div class="grid_2"><?=$consulta_get_where->username?></div>
                    <div class="grid_3"><?=$consulta_get_where->fname?></div>
                    <div class="grid_3"><?=$consulta_get_where->lname?></div>
                    <div class="grid_3"><?=$consulta_get_where->register_date?></div>
                </div>
                <?php
            }
            ?>
            <div class="grid_11 push_1" id="consulta_sql">
                <pre>
                    $query = $this->db->get_where('users',array('id' => 1));
                    return $query->row();
                </pre><br>
                <h3>Obtenemos los datos del usuario con id 1 en la misma línea con get_where</h3>
            </div>
        </div>
    </div>
</body>
</html>