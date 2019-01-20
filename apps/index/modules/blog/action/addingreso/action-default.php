<?php
//print_r($_SESSION);
//var_export($_POST); exit;
if(count($_POST)>0)
{

    // Insertamos a traves de la API

    $user = $_SESSION['nombre_usuario'];
    $pass = $_SESSION['password'];

    $post = [
        'bar' => $_POST["bar"],
        'nombre_sucursal' => $_POST["nombre_sucursal"],       
        'fecha' => $_POST["fecha"],        
        'factura' => $_POST["factura"],        
        'receptor' => $_POST["receptor"],        
        'linea' => $_POST["linea"],        
        'fecha_elaboración' => $_POST["fecha_elaboración"],        
        'fecha_vencimiento' => $_POST["fecha_vencimiento"],        
        'cerveceria' => $_POST["cerveceria"],        
        'tipo_barril' => $_POST["tipo_barril"],        
        'etiqueta' => $_POST["etiqueta"]        

    ];

    

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
