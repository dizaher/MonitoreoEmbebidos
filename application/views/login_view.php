<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Ingreso a SMPPSS</title>
  <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" />    
  <link href="<?php echo base_url(); ?>css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <div class="container"> 
    <?php echo form_open('verifylogin', 'class="form-signin"'); ?>

    <?php echo validation_errors('<div class="alert alert-error">', '</div>'); ?> 
        <img src="<?php echo base_url();?>img/TOClogo.png" alt="Logo TOC" width="400" heigth="350"/>       
        <h2 class="form-signin-heading">Ingresar a SMPPSS</h2>
        <label for="username">Nombre de usuario:</label>
        <input type="text" id="username" name="username"  class="input-block-level"  placeholder="Usuario" maxlength="15" size="15" value="<?php echo set_value('username'); ?>">
        <label for="username">Contraseña:</label>
        <input type="password" id="password" name="password"  class="input-block-level" maxlength="15" size="15" placeholder="Password" value="<?php echo set_value('password'); ?>">        
        <button class="btn btn-large btn-primary" type="submit">Ingresar</button>
      </form>

    </div> <!-- /container -->    
</body>
</html>