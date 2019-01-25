<?php
//print_r($_SESSION);
//var_export($_POST); exit;
if(count($_POST)>0)
{

    // Insertamos a traves de la API

    $user = $_SESSION['nombre_usuario'];
    $pass = $_SESSION['password'];

    $post = [
        'nombre' => $_POST["nombre"]
    ];

    //echo json_encode($post); exit;

    $ch = curl_init('http://localhost/catalogo-libros/productos.php/');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_USERPWD, "$user:$pass");

    $response = curl_exec($ch);

    curl_close($ch);

    Core::redir("./index.php?view=producto");
}

?>
