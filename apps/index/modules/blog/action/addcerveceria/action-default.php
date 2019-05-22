<?php
// Insertamos a traves de la API

	if(count($_POST)>0)
	{

		$user = $_SESSION['nombre_usuario'];
		$pass = $_SESSION['password'];

		$post = [
			'nombre' => $_POST["nombre"]
		];

		$ch = curl_init('http://localhost/Catalogo-libros/cervecerias.php');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_USERPWD, "$user:$pass");

		$response = curl_exec($ch);
		curl_close($ch);



	Core::redir("./index.php?view=cervecerias");

}

?>