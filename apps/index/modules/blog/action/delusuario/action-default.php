<?php
// print_r($_SESSION);
if(count($_GET)>0){
	$a = new SQLMan();
$a->tablename = "usuario";
$a->del("id_usuario=".$_GET["id_usuario"]);



Core::redir("./index.php?view=usuarios");
}

?>