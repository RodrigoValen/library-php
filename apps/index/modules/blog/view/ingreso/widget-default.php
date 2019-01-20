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
      
      $url2 = 'http://api.catalogos.local/productos.php/'; 
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$url2); 
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
      curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
      curl_setopt($ch, CURLOPT_USERPWD, "$login:$password"); 
      $result= curl_exec($ch); 
      $data2 = json_decode($result,true);
      $productos = $data2['cerveza'];
      curl_close($ch); 
      
      ?>


      <div class="page-content">

        <!-- Header Bar -->
<?php Action::load("header");?>
        <!-- End Header Bar -->
          <div class="row">
            <div class="col-lg-12">
            <h2>Nueva registro</h2>
              <div class="widget">
                <div class="widget-title">
                  <i class="fa fa-male"></i> Registro 
                </div>
                <div class="widget-body">

      <form class="form-horizontal" role="form" method="post" action="./index.php?action=addcerveceria">
      

      <?php if(count($cervcerias)==0):?>
      <p class="alert alert-danger">No hay Cervecerías resgistradas</p>
      <?php endif; ?>

      <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Línea</label>
      <div class="col-lg-10">
        <input type="text" name="linea" class="form-control" id="linea" placeholder="Línea">
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
      <input id="fecha_elaboracion" type="date">
      </div>
      </div>

      <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Fecha Vencimiento</label>
      <div class="col-lg-10">
      <input id="fecha_vencimiento" type="date">
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
      <input type="text" name="tipo_barril" class="form-control" id="tipo_barril" placeholder="Tipo de Barril">
      </div>
      </div>
      
      <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Etiqueta</label>
      <div class="col-lg-10">
      <input type="text" name="etiqueta" class="form-control" id="etiqueta" placeholder="Etiqueta">
      </div>
      </div>

      <div class="form-group">
      <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-default">Registrar</button>
      </div>
      </div>
      
                </div>
              </div>
            </div>

          </div>

        <!-- End Main Content -->

      </div><!-- End Page Content -->