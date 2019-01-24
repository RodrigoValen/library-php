<?php

$login = $_SESSION['nombre_usuario'];
$password = $_SESSION['password'];
$url = 'http://api.catalogos.local/registros.php';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
$result= curl_exec($ch);
$data = json_decode($result,true);
$registros = $data['registro'];
//var_dump($registros);exit;
curl_close($ch);


function getbar($id_bar){

  $login = $_SESSION['nombre_usuario'];
  $password = $_SESSION['password'];
  $url = 'http://api.catalogos.local/bares.php/?id_bar='.$id_bar;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL,$url); 
  curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
  curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
  curl_setopt($ch, CURLOPT_USERPWD, "$login:$password"); 
  $result= curl_exec($ch); 
  $data = json_decode($result,true);
  $bares = $data['bar'];
  return $bares[0]["nombre"];

}
function getproducto(){

  $login = $_SESSION['nombre_usuario'];
  $password = $_SESSION['password'];
  $url = 'http://api.catalogos.local/productos.php/'; 
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL,$url); 
  curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
  curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
  curl_setopt($ch, CURLOPT_USERPWD, "$login:$password"); 
  $result= curl_exec($ch); 
  $data = json_decode($result,true);
  $productos = $data['cerveza'];
  return $productos[0]["nombre"];
}


?>
      <div class="page-content">

        <!-- Header Bar -->
<?php Action::load("header");?>
        <!-- End Header Bar -->

          <div class="row">
            <div class="col-lg-12">
                  <a href="./index.php?view=nuevoregistro" class="btn btn-default pull-right">Nuevo Registro</a>
            <h1>Registro</h1>
<?php if(count($registros)==0):?>
  <p class="alert alert-danger">No hay registros</p>
<?php endif; ?>
              <div class="widget">
                <div class="widget-title">
                  <i class="fa fa-male"></i> Registros
                </div>
                <div class="widget-body no-padding">

                  <div class="table-responsive">
<?php if(count($registros)>0):?>
                    <table class="table" >
                      <tbody>
                      <?php foreach($registros as $registro):?>
                        <tr>
                        <td><?php
                            $bar = getbar($registro["id_cerveceria"]);
                            $producto = getbar($registro["id_producto"]);
                            echo $registro["receptor"];
                            echo'  ';echo $registro["fecha_registro"];
                            echo'  ';echo $producto;
                            echo'  ';echo $bar;
                        ?></td>
                        <td>
                        <a href="./index.php?view=editcerveceria&id=<?php echo $registro["id_registro"]; ?>" class="btn btn-warning btn-xs">Editar</a>
                        <a href="./index.php?action=delcerveceria&id=<?php echo $registro["id_registro"]; ?>" class="btn btn-danger btn-xs">Eliminar</a>
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
    