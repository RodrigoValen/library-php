     <!-- Cargar productos y cervecerias -->
     <?php
      $login = $_SESSION['nombre_usuario'];
      $password = $_SESSION['password'];
      $url = 'http://api.catalogos.local/Cervecerias.php';
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
      curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
      curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
      $result= curl_exec($ch);
      $data = json_decode($result,true);
      $cervcerias = $data['cerveceria'];
      curl_close($ch);

      $url = 'http://api.catalogos.local/productos.php/';
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
      curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
      curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
      $result= curl_exec($ch);
      $data = json_decode($result,true);
      $productos = $data['cerveza'];
      curl_close($ch);

      $url = 'http://api.catalogos.local/bares.php/';
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
      curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
      curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
      $result= curl_exec($ch);
      $data = json_decode($result,true);
      $bares = $data['bar'];
      curl_close($ch);

      $login = $_SESSION['nombre_usuario'];
      $password = $_SESSION['password'];
      $url = 'http://api.catalogos.local/registros.php?id_registro='.$_GET["id"];
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
      curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
      $result = curl_exec($ch);
      $data = json_decode($result, true);
      $registros = $data['registro'];
      curl_close($ch);

      ?>


      <div class="page-content">

        <!-- Header Bar -->
<?php Action::load("header");?>
        <!-- End Header Bar -->
          <div class="row">
            <div class="col-lg-12">
            <h2>Editar registro</h2>
              <div class="widget">
                <div class="widget-title">
                  <i class="fa fa-male"></i> Editar Registro
                </div>
                <div class="widget-body">

      <form class="form-horizontal" role="form" method="post" action="./index.php?action=updateregistro">
      <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Bares</label>
      <div class="col-lg-10">
      <?php if(count($bares)>0):?>
          <select name="bar" value="<?php echo $registros[0]["id_bar"]; ?>"style="width: 120px">
            <?php foreach($bares as $bar):?>
              <option value="<?php echo $bar["id"]; ?>"><?php echo $bar["nombre"];?> </option>
            <?php endforeach; ?>
      </select>
      <?php endif; ?>
      </div>
      </div>

      <?php if(count($cervcerias)==0):?>
      <p class="alert alert-danger">No hay Cervecerías resgistradas</p>
      <?php endif; ?>

      <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Factura</label>
      <div class="col-lg-10">
        <input type="text" name="factura" value="<?php echo $registros[0]["factura"]; ?>" class="form-control" id="factura" placeholder="Factura">
      </div>
      </div>

      <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Receptor</label>
      <div class="col-lg-10">
        <input type="text" name="receptor" value="<?php echo $registros[0]["receptor"]; ?>" class="form-control" id="linea" placeholder="Receptor">
      </div>
      </div>

      <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Línea</label>
      <div class="col-lg-10">
        <input type="text" name="linea" value="<?php echo $registros[0]["linea"]; ?>"class="form-control" id="linea" placeholder="Línea">
      </div>
      </div>

      <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Producto</label>
      <div class="col-lg-10">
      <?php if(count($productos)>0):?>
        <select name="producto" style="width: 120px">
          <?php foreach($productos as $producto):?>
            <option value="<?php echo $producto["id"]; ?>"><?php echo $producto["nombre"];?> </option>
          <?php endforeach; ?>
        </select>
        <?php endif; ?>
      </div>
      </div>

      <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Fecha Elaboración</label>
      <div class="col-lg-10">
      <input name="fecha_elaboracion" value="<?php echo $registros[0]["fecha_elaboracion"]; ?>" type="date">
      </div>
      </div>

      <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Fecha Vencimiento</label>
      <div class="col-lg-10">
      <input name="fecha_vencimiento" value="<?php echo $registros[0]["fecha_vencimiento"]; ?>" type="date">
      </div>
      </div>

      <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Cervecerías</label>
      <div class="col-lg-10">
      <?php if(count($cervcerias)>0):?>
        <select name="cerveceria" style="width: 120px">
          <?php foreach($cervcerias as $cervceria):?>
            <option value="<?php echo $cervceria["id"]; ?>"><?php echo $cervceria["nombre"];?> </option>
          <?php endforeach; ?>
        </select>
        <?php endif; ?>
      </div>
      </div>


      <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Tipo de Barril</label>
      <div class="col-lg-10">
      <input type="text" name="tipo_barril" value="<?php echo $registros[0]["tipo_barril"]; ?>"class="form-control" id="tipo_barril" placeholder="Tipo de Barril">
      </div>
      </div>

      <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Etiqueta</label>
      <div class="col-lg-10">
      <input type="text" name="etiqueta" value="<?php echo $registros[0]["etiqueta"]; ?>" class="form-control" id="etiqueta" placeholder="Etiqueta">
      </div>
      </div>

      <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <input type="hidden" name="id" value="<?php echo $registros[0]["id_registro"]; ?>" >
      <button type="submit" class="btn btn-default">Actualizar Cerveza</button>
    </div>
  </div>
</form>
                </div>
              </div>
            </div>

          </div>

        <!-- End Main Content -->

      </div><!-- End Page Content -->