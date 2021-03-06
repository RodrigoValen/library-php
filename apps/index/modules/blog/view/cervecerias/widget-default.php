<?php

$login = $_SESSION['nombre_usuario'];
$password = $_SESSION['password'];
$url = 'http://api.catalogos.local/Cervecerias.php'; 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
curl_setopt($ch, CURLOPT_USERPWD, "$login:$password"); 
$result= curl_exec($ch); 
$data = json_decode($result,true);
$cervecerias = $data['cerveceria'];
curl_close($ch); 


?>
      <div class="page-content">

        <!-- Header Bar -->
<?php Action::load("header");?>
        <!-- End Header Bar -->

          <div class="row">
            <div class="col-lg-12">
                  <a href="./index.php?view=nuevacerveceria" class="btn btn-default pull-right">Nueva Cervecería</a>
            <h1>Cervecería</h1>
<?php if(count($cervecerias)==0):?>
  <p class="alert alert-danger">No hay Cervecerías resgistradas</p>
<?php endif; ?>
              <div class="widget">
                <div class="widget-title">
                  <i class="fa fa-male"></i> Cervecerias
                </div>
                <div class="widget-body no-padding">

                  <div class="table-responsive">
<?php if(count($cervecerias)>0):?>
                    <table class="table">
                      <tbody>
                      <?php foreach($cervecerias as $cerveceria):?>
                        <tr>
                        <td><?php echo $cerveceria["nombre"]; ?></td>
                        <td>
                        <a href="./index.php?view=editcerveceria&id=<?php echo $cerveceria["id"]; ?>" class="btn btn-warning btn-xs">Editar</a>
                        <a href="./index.php?action=delcerveceria&id=<?php echo $cerveceria["id"]; ?>" class="btn btn-danger btn-xs">Eliminar</a>
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