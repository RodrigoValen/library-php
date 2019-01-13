<?php

// API Todos los autores :

$login = $_SESSION['nombre_usuario'];
$password = $_SESSION['password'];

$url = 'http://localhost/catalogo-libros/productos/';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
$result = curl_exec($ch);
$autores = json_decode($result,true);
$autores = $autores['autores'];
curl_close($ch);


?>
      <div class="page-content">

        <!-- Header Bar -->
<?php Action::load("header");?>
        <!-- End Header Bar -->


          <div class="row">
            <div class="col-lg-12">
            <h2>Nueva Cerveza</h2>
<?php if(count($autores)==0):?>
  <p class="alert alert-danger">No hay Cervezas</p>
<?php endif; ?>



              <div class="widget">
                <div class="widget-title">
                  <i class="fa fa-male"></i> Cervezas
                </div>
                <div class="widget-body">
<form class="form-horizontal" role="form" method="post" action="./index.php?action=addcerveza">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre de la cerveza</label>
    <div class="col-lg-10">
      <input type="text" name="nombre"  required class="form-control" id="inputEmail1" placeholder="Nombre de la cerveza">
    </div>
  </div>

 <!-- <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Genero</label>
    <div class="col-lg-10">
      <input type="text" name="genero" class="form-control" id="inputEmail1"  placeholder="Genero">
    </div>
  </div>
  
    <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Precio</label>
    <div class="col-lg-4">
      <input type="text" name="precio" class="form-control" id="inputEmail1" required placeholder="Precio">
    </div>
</div> 
   
    <?php if(count($autores)>0):?>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Autores</label>
    <div class="col-lg-4">
      <select name="autores[]" class="form-control" multiple required>
        <?php foreach($autores as $autor):?>
          <option value="<?php echo $autor["id"]; ?>"><?php echo $autor["nombre"];?> </option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>
    <?php endif; ?> -->



  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-default">Agregar Cerveza</button>
    </div>
  </div>
</form>
                </div>
              </div>
            </div>

          </div>

        <!-- End Main Content -->

      </div><!-- End Page Content -->
