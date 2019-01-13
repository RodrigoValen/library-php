<?php

$a = new SQLMan();
$a->tablename = "usuario";
//$a->in_test=true;
$autor= $a->select("one","",$where="id_usuario=".$_GET["id_usuario"]);
$autor = $autor[0];
//print_r($autor);
?>
      <div class="page-content">

        <!-- Header Bar -->
<?php Action::load("header");?>
        <!-- End Header Bar -->


          <div class="row">
            <div class="col-lg-12">
            <h2>Actualizar usuario</h2>
              <div class="widget">
                <div class="widget-title">
                  <i class="fa fa-male"></i> Editar Usuario
                </div>
                <div class="widget-body">
<form class="form-horizontal" role="form" method="post" action="./index.php?action=updateusuario">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre</label>
    <div class="col-lg-10">
      <input type="text" name="nombre" value="<?php echo $autor->fields["nombre_usuario"]; ?>" required class="form-control" id="inputEmail1" placeholder="Nombre">
    </div>
  </div>




  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Email</label>
    <div class="col-lg-10">
      <input type="text" name="email" value="<?php echo $autor->fields["email"]; ?>" class="form-control" id="inputEmail1" required placeholder="Email">
      <input type="hidden" name="id" value="<?php echo $autor->fields["id_usuario"]; ?>" >
    </div>
  </div>

 


  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-default">Actualizar Usuario</button>
    </div>
  </div>
</form>
                </div>
              </div>
            </div>

          </div>

        <!-- End Main Content -->

      </div><!-- End Page Content -->