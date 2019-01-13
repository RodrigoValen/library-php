<?php

$a = new SQLMan();
$a->tablename = "usuario";
$autores= $a->select();
// print_r($autores);
?>
      <div class="page-content">

        <!-- Header Bar -->
<?php Action::load("header");?>
        <!-- End Header Bar -->

          <div class="row">
            <div class="col-lg-12">
                  <a href="./index.php?view=nuevacerveceria" class="btn btn-default pull-right">Nueva Cervecería</a>
            <h1>Cervecerías</h1>
              <div class="widget">
                <div class="widget-title">
                  <i class="fa fa-male"></i> Cervecerías
                </div>
                <div class="widget-body no-padding">

                  <div class="table-responsive">
<?php if(count($autores)>0):?>
                    <table class="table">
                      <tbody>
                      <?php foreach($autores as $autor):?>
                        <tr>
                        <td><?php echo $autor->fields["nombre"]; ?></td>
                        <td>
                        <a href="./index.php?view=editusuario&id=<?php echo $autor->fields["id"]; ?>" </a>
                        <a href="./index.php?action=delusuario&id=<?php echo $autor->fields["id"]; ?>" </a>
                        </td>
                        </tr>
                      <?php endforeach; ?>
                      </tbody>
                    </table>
<?php endif; ?>
                  </div>
                </div>
              </div>
            </div>

          </div>

        <!-- End Main Content -->

      </div><!-- End Page Content -->