<?php
// print_r($_SESSION);
if(count($_POST)>0){
	$a = new SQLMan();
$a->tablename = "usuario";
// $a->in_test = true;
$a-> nombre = $a-> is_string($_POST["nombre_usuario"]);
$a->email = $a->is_string($_POST["email"]);
$a->password = $a->is_string($_POST["password"]);
$a->add();
Core::redir("./index.php?view=usuarios");
}

?>