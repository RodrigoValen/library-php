<?php
// print_r($_SESSION);
if(count($_GET)>0){
	$a = new SQLMan();
$a->tablename = "editorial";
$a->del("id=".$_GET["id"]);



Core::redir("./index.php?view=editoriales");
}

?>