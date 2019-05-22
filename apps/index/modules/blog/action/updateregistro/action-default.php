<?php
// print_r($_SESSION);


 // Actualizamos a traves de la API

    $user = $_SESSION['nombre_usuario'];
    $pass = $_SESSION['password'];
    $fecha = date("Y-m-d H:i:s");

    $post = [
        'id_bar' => $_POST["bar"],
        'id_cerveceria' => $_POST["cerveceria"],
        'id_producto' => $_POST["producto"],
        'fecha_registro' => $fecha,
        'factura' => $_POST["factura"],
        'receptor' => $_POST["receptor"],
        'linea' => $_POST["linea"],
        'fecha_elaboracion' => $_POST["fecha_elaboracion"],
        'fecha_vencimiento' => $_POST["fecha_vencimiento"],
        'tipo_barril' => $_POST["tipo_barril"],
        'etiqueta' => $_POST["etiqueta"]
    ];


    $url ='http://localhost/Catalogo-libros/registros.php/?id_registro='.$_POST["id"];


    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_USERPWD, "$user:$pass");
    $response = curl_exec($ch);
    curl_close($ch);


Core::redir("./index.php?view=registro");

?>
