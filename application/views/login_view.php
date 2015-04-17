<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ingreso a SMPPSS</title>
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

      <div class="form-box" id="login-box">
          <div class="header">Ingreso a Monitoreo de SE</div>
          <?php echo form_open('c_ingreso'); ?>
                  
              <div class="body bg-gray">
                  <div class="form-group">
                    <?php echo form_error('username'); ?>
                      <label for="exampleInputEmail1">Dirección de correo</label>
                      <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Ingresa email" value="<?php echo set_value('username'); ?>">
                  </div>
                  <div class="form-group">
                    <?php echo form_error('password'); ?>
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value="<?php echo set_value('password'); ?>">
                  </div>                      
              </div>
              <div class="footer">                                                               
                  <button type="submit" class="btn bg-olive btn-block">Iniciar sesión</button>                    
                  
              </div>
          </form>
          
      </div>            
      <!-- jQuery 2.0.2 -->
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
      <!-- Bootstrap -->
      <script src="<?php echo base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>       
    </body>
</html>