<?php



// API Todos los autores :

$login = $_SESSION['nombre_usuario'];
$password = $_SESSION['password'];
$url = 'http://api.catalogos.local/cervecerias.php/?id_cerveceria='.$_GET["id"];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
$result = curl_exec($ch);
$data = json_decode($result,true);
curl_close($ch);
$cervecerias = $data['cerveceria'];
$cerveceria=$cervecerias[0];

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
<form class="form-horizontal" role="form" method="post" action="./index.php?action=updatecerveceria">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre</label>
    <div class="col-lg-10">
      <input type="text" name="nombre" value="<?php echo $cerveceria["nombre"]; ?>" required class="form-control" id="inputEmail1" placeholder="Nombre">
    </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <input type="hidden" name="id" value="<?php echo $cerveceria["id"]; ?>" >
      <button type="submit" class="btn btn-default">Actualizar Cervecería</button>
    </div>
  </div>
</form>
                </div>
              </div>
            </div>

          </div>

        <!-- End Main Content -->

      </div><!-- End Page Content -->
