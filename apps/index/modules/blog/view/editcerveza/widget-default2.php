<?php
/*$a = new SQLMan();
$a->tablename = "libros";
//$a->in_test=true;
$autor= $a->select("one","",$where="id=".$_GET["id"]);
$libro = $autor[0];
//print_r($autor);*/

/*$a = new SQLMan();
$a->tablename = "autor";
$autores = $a->select();

$e = new SQLMan();
$e->tablename = "editorial";
$editoriales = $e->select();

$c = new SQLMan();
$c->tablename = "categoria";
$categorias = $c->select();*/

//echo time(); exit;

// API Todos los autores :

$login = $_SESSION['nombre_usuario'];
$password = $_SESSION['password'];

$url = 'http://localhost/catalogo-libros/autores/';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
$result = curl_exec($ch);
$autores = json_decode($result,true);
$autores = $autores['autores'];
curl_close($ch);

// API Todos los autores :

$url = 'http://localhost/catalogo-libros/libros/'.$_GET["id"];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
$result = curl_exec($ch);
$libro = json_decode($result,true);
$libro = $libro['libro'][0];
curl_close($ch);

$autores_libro = [];
foreach ($libro['autores'] as $autor_libro) {
	$autores_libro[] = $autor_libro['id']; 
}
?>
      <div class="page-content">

        <!-- Header Bar -->
<?php Action::load("header");?>
        <!-- End Header Bar -->


          <div class="row">
            <div class="col-lg-12">
            <h2>Actualizar libro</h2>

              <div class="widget">
                <div class="widget-title">
                  <i class="fa fa-book"></i> Libros
                </div>
                <div class="widget-body">
<form class="form-horizontal" role="form" method="post" action="./index.php?action=updatelibro">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Titulo</label>
    <div class="col-lg-10">
      <input type="text" name="nombre" value="<?php echo $libro["nombre"]; ?>"  required class="form-control" id="inputEmail1" placeholder="Nombre">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Genero</label>
    <div class="col-lg-10">
      <input type="text" name="genero" value="<?php echo $libro["genero"]; ?>" class="form-control" id="inputEmail1" required placeholder="Genero">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Precio</label>
    <div class="col-lg-10">
      <input type="text" name="precio" value="<?php echo $libro["precio"]; ?>" class="form-control" id="inputEmail1" required placeholder="Precio">
    </div>
  </div>

    <?php if(count($autores)>0):?>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Autor</label>
    <div class="col-lg-10">
      <select name="autores[]" multiple class="form-control" required>
        <?php foreach($autores as $autor):?>
          <option value="<?php echo $autor["id"]; ?>" <?php if(in_array($autor["id"], $autores_libro)){ echo "selected"; } ?>><?php echo $autor["nombre"];?> </option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>
    <?php endif; ?>



  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
          <input type="hidden" name="id" value="<?php echo $libro["id"]; ?>" >
      <button type="submit" class="btn btn-default">Actualizar Libro</button>
    </div>
  </div>
</form>
                </div>
              </div>
            </div>

          </div>

        <!-- End Main Content -->

      </div><!-- End Page Content -->
