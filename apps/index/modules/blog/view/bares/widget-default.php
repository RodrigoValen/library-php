<?php

/*$a = new SQLMan();
$a->tablename = "autor";
$autores= $a->select("one","");*/

// print_r($autores);

$login = $_SESSION['nombre_usuario'];
$password = $_SESSION['password'];
$url = "http://api.catalogos.local/bares.php"; 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
curl_setopt($ch, CURLOPT_USERPWD, "$login:$password"); 
$result= curl_exec($ch); 
$data = json_decode($result,true);
$bares = $data['bar'];

curl_close($ch); 


?>
      <div class="page-content">

        <!-- Header Bar -->
<?php Action::load("header");?>
        <!-- End Header Bar -->

          <div class="row">
            <div class="col-lg-12">
                  <a href="./index.php?view=nuevobar" class="btn btn-default pull-right">Nuevo Bar</a>
            <h1>Bares</h1>
<?php if(count($bares)==0):?>
  <p class="alert alert-danger">No hay bares resgistrados</p>
<?php endif; ?>
              <div class="widget">
                <div class="widget-title">
                  <i class="fa fa-male"></i> Bares Dirección
                </div>
                <div class="widget-body no-padding">

                  <div class="table-responsive">
<?php if(count($bares)>0):?>
                    <table class="table">
                      <tbody>
                      <?php foreach($bares as $bar):?>
                        <tr>
                        <td><?php echo $bar["nombre"];
                        echo "      ";
                          echo $bar["direccion_sucursal"]; 

                        ?></td>

                        <td>
                        <a href="./index.php?view=editarbar&id=<?php echo $bar["id"]; ?>" class="btn btn-warning btn-xs">Editar</a>
                        <a href="./index.php?action=delbar&id=<?php echo $bar["id"]; ?>" class="btn btn-danger btn-xs">Eliminar</a>
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