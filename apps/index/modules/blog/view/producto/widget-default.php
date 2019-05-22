<?php

//$a = new SQLMan();
//$a->tablename = "libros";
//$autores= $a->select();
// print_r($autores);
$login = $_SESSION['nombre_usuario'];
$password = $_SESSION['password'];
$url = 'http://localhost/Catalogo-libros/productos.php/';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
$result= curl_exec($ch);
$libros = json_decode($result,true);
$autores = $libros['cerveza'];
//print_r($autores);
curl_close($ch);


?>
      <div class="page-content">

        <!-- Header Bar -->
<?php Action::load("header");?>
        <!-- End Header Bar -->

          <div class="row">
            <div class="col-lg-12">
                  <a href="./index.php?view=nuevacerveza" class="btn btn-default pull-right"> Nueva Cerveza</a>
            <h1>Cervezas</h1>
              <div class="widget">
                <div class="widget-title">
                  <i class="fa fa-beer"></i>Cervezas
                </div>
                <div class="widget-body no-padding">

                  <div class="table-responsive">
<?php if(count($autores)>0):?>
                    <table class="table">
                      <thead class= "thead">
                      <tr>
                          <td>Nombre</td>
                          <td>Familia</td>
                          <td>Acciones</td>
                          </tr>
                      </thead>
                      <tbody>
                      <?php foreach($autores as $autor):?>
                        <tr>
                        <td><?php echo $autor["nombre"]; ?></td>
                        <td><?php echo $autor["familia"];?></td>
                        <td><a href="./index.php?view=editcerveza&id=<?php echo $autor["id"]; ?>" class="btn btn-warning btn-xs">Editar</a>
                        <a href="./index.php?action=delcerveza&id=<?php echo $autor["id"]; ?>" class="btn btn-danger btn-xs">Eliminar</a></td>
                        
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
