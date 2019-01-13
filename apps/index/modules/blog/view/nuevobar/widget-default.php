      <div class="page-content">

        <!-- Header Bar -->
<?php Action::load("header");?>
        <!-- End Header Bar -->


          <div class="row">
            <div class="col-lg-12">
            <h2>Nuevo Bar</h2>
              <div class="widget">
                <div class="widget-title">
                  <i class="fa fa-male"></i> Bares
                </div>
                <div class="widget-body">
<form class="form-horizontal" role="form" method="post" action="./index.php?action=addbar">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre Bar</label>
    <div class="col-lg-10">
      <input type="text" name="nombre"  required class="form-control" id="inputEmail1" placeholder="Nombre Bar">
    </div>
  </div>

 
 <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre Sucursal</label>
    <div class="col-lg-10">
      <input type="text" name="nombre_sucursal" class="form-control" id="inputEmail1" required placeholder="Sucursal">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Dirección Sucursal</label>
    <div class="col-lg-10">
      <input type="text" name="direccion_sucursal" class="form-control" id="inputEmail1" required placeholder="Dirección Sucursal">
    </div>
  </div>


  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-default">Agregar Bar</button>
    </div>
  </div>
</form>
                </div>
              </div>
            </div>

          </div>

        <!-- End Main Content -->

      </div><!-- End Page Content -->