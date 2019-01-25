<?php

// Insertamos a traves de la API

if(count($_POST)>0)
{

    $user = $_SESSION['nombre_usuario'];
    $pass = $_SESSION['password'];

    $post = [
        'nombre' => $_POST["nombre"],
        'nombre_sucursal' => $_POST["nombre_sucursal"],
        'direccion_sucursal' => $_POST["direccion_sucursal"]
    ];

    $ch = curl_init('http://api.catalogos.local/bares.php');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_USERPWD, "$user:$pass");

    $response = curl_exec($ch);
    curl_close($ch);

Core::redir("./index.php?view=bares");

}

?>
