<?php
// print_r($_SESSION);


 // Actualizamos a traves de la API

    $user = $_SESSION['nombre_usuario'];
    $pass = $_SESSION['password'];

    $post = [
        'nombre' => $_POST["nombre"]
        ];

    $url ='http://localhost/Catalogo-libros/cervecerias.php/?id_cerveceria='.$_POST["id"];
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_USERPWD, "$user:$pass");
    $response = curl_exec($ch);
    curl_close($ch);

Core::redir("./index.php?view=cervecerias");

?>
