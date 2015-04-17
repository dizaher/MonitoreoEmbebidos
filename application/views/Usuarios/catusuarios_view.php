<div class="container" style="margin-top: 60px;">
  <div class="row">
    <div class="col-lg-12">
      <a href="<?php echo site_url('admin/users/create');?>" class="btn btn-primary">Create user</a>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12" style="margin-top: 10px;">
    <?php
    if(!empty($users))
    {
      echo '<table class="table table-hover table-bordered table-condensed">';
      echo '<tr><td>ID</td><td>Username</td></td><td>Name</td><td>Email</td></tr>';
      foreach($users as $user)
      {
        echo '<tr>';
        echo '<td>'.$user->cve_usuario.'</td><td>'.$user->nombre.'</td><td>'.$user->clave.' '.$user->perfil_cve_perfil.'</td></td><td>';
        echo anchor('admin/users/edit/'.$user->cve_usuario,'<span class="glyphicon glyphicon-pencil"></span>').' '.anchor('admin/users/delete/'.$user->cve_usuario,'<span class="glyphicon glyphicon-remove"></span>');
        
        echo '</td>';
        echo '</tr>';
      }
      echo '</table>';
    }
    ?>
    </div>
  </div>
</div>