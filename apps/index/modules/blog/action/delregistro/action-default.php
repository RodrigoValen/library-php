<?php

//print_r($_SESSION);

if (count($_GET) > 0)
{

    // Actualizamos a traves de la API

    $user = $_SESSION['nombre_usuario'];
    $pass = $_SESSION['password'];
    $ch = curl_init('http://api.catalogos.local/registros.php?id_registro='.$_GET["id"]);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_USERPWD, "$user:$pass");

    $response = curl_exec($ch);

    curl_close($ch);

    Core::redir("./index.php?view=registro");

}

