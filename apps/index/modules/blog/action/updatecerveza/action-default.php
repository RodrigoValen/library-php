<?php

//print_r($_SESSION);

if (count($_POST) > 0)
{

    // Actualizamos a traves de la API

    $user = $_SESSION['nombre_usuario'];
    $pass = $_SESSION['password'];

    $post = [
        'nombre' => $_POST["nombre"]
    ];
    $url ='http://api.catalogos.local/productos.php/?id_producto='.$_POST["id"];
    print_r($url);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_USERPWD, "$user:$pass");

    $response = curl_exec($ch);

    curl_close($ch);

    Core::redir("./index.php?view=producto");

}

?>
