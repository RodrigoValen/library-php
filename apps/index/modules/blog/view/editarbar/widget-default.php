<?php



// API Todos los autores :

$login = $_SESSION['nombre_usuario'];
$password = $_SESSION['password'];
$id = $_GET["id"];
$url = 'http://localhost/Catalogo-libros/bares.php/?id_bar='.$_GET["id"];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
$result = curl_exec($ch);
$data = json_decode($result,true);
curl_close($ch);
$bares = $data['bar'];
$bar=$bares[0];

?>


      <div class="page-content">

        <!-- Header Bar -->
<?php Action::load("header");?>
        <!-- End Header Bar -->

          <div class="row">
            <div class="col-lg-12">
            <h2>Actualizar Bar</h2>
              <div class="widget">
                <div class="widget-title">
                  <i class="fa fa-male"></i> Editar Bares
                </div>
                <div class="widget-body">
<form class="form-horizontal" role="form" method="post" action="./index.php?action=updatebar">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre</label>
    <div class="col-lg-10">
      <input type="text" name="nombre" value="<?php echo $bar["nombre"]; ?>" required class="form-control" id="inputEmail1" placeholder="Nombre">
    </div>
  </div>
 <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre Sucursal</label>
    <div class="col-lg-10">
      <input type="text" name="nombre_sucursal" value="<?php echo $bar["nombre_sucursal"]; ?>" required class="form-control" id="inputEmail1" placeholder="Nombre Sucursal">
    </div>
  </div>
<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Direccion Sucursal</label>
    <div class="col-lg-10">
      <input type="text" name="direccion_sucursal" value="<?php echo $bar["direccion_sucursal"]; ?>" required class="form-control" id="inputEmail1" placeholder="Direccion Sucursal">
    </div>
  </div>
  



  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <input type="hidden" name="id" value="<?php echo $bar["id"]; ?>" >
      <button type="submit" class="btn btn-default">Actualizar Autor</button>
    </div>
  </div>
</form>
                </div>
              </div>
            </div>

          </div>

        <!-- End Main Content -->

      </div><!-- End Page Content -->
