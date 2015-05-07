<div class="container">
    <h1 class="text-light-blue">Administración de Usuarios</h1>
  <section class="content">         
    <a href="<?php echo site_url('c_principal/menu') ?>" class="btn btn-app"><i class="fa fa-mail-reply"></i>Regresar</a>
      <div class="row">        
        <div class="col-lg-12">
          <a href="<?php echo site_url('c_usuarios/create');?>" class="btn btn-primary">Nuevo Usuario</a>
          
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Usuarios Registrados</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tbody><tr>
                      <th>Usuario</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Telefóno</th>
                      <th>Password</th>
                      <th>Perfil</th>
                      <th>Acciones</th>
                    </tr>                    
                <?php
                if(!empty($users))
                {                  
                  foreach($users as $user)
                  {
                    echo '<tr>';
                    echo '<td>'.$user->u_correo.'</td><td>'.$user->u_nombre.'</td><td>'.$user->u_apellidos.' </td><td>'.$user->u_telefono.'</td><td>'.$user->u_password.'</td><td>'.$user->p_descripcion.'</td><td>';
                    echo anchor('c_usuarios/edit/'.$user->u_correo,'<span class="glyphicon glyphicon-pencil"></span>').' '.anchor('c_usuarios/delete/'.$user->u_correo,'<span class="glyphicon glyphicon-remove"></span>',array('onClick' => "return confirm('Estas seguro de eliminarlo?')"));
                    
                    echo '</td>';
                    echo '</tr>';
                  }          
                }
                ?>
                </tbody>
              </table>
            </div><!-- /.box-body -->               
          </div><!-- /.box -->
        </div>
      </div><!-- /.row -->
      <a href="<?php echo site_url('c_principal/menu') ?>" class="btn btn-app"><i class="fa fa-mail-reply"></i>Regresar</a>
  </section><!-- /.content -->
</div>