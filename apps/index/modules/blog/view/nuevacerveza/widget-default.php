      <div class="page-content">

        <!-- Header Bar -->
<?php Action::load("header");?>
        <!-- End Header Bar -->


          <div class="row">
            <div class="col-lg-12">
            <h2>Nueva Cerveza</h2>
              <div class="widget">
                <div class="widget-title">
                  <i class="fa fa-male"></i> Cerveza
                </div>
                <div class="widget-body">
<form class="form-horizontal" role="form" method="post" action="./index.php?action=addcerveza">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre Cerveza</label>
    <div class="col-lg-10">
      <input type="text" name="nombre"  required class="form-control" id="inputEmail1" placeholder="Nombre Cerveza">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label"> Familia Cerveza</label>
    <div class="col-lg-10">
      <input type="text" name="familia"  required class="form-control" id="inputEmail1" placeholder="Familia Cerveza">
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-default">Agregar Cerveza</button>
    </div>
  </div>

 <!-- <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Email</label>
    <div class="col-lg-10">
      <input type="text" name="email" class="form-control" id="inputEmail1" placeholder="Email">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Password</label>
    <div class="col-lg-10">
      <input type="text" name="password" class="form-control" id="inputEmail1" placeholder="Password">
    </div>
  </div>



  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-default">Agregar Usuario</button>
    </div>
  </div>
</form>.  -->
                </div>
              </div>
            </div>

          </div>

        <!-- End Main Content -->

      </div><!-- End Page Content -->