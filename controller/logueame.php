<?php


//Llamada al modelo
require_once("model/Usuario.php");

require_once("db/db.php");
//$per=new Usuario();
//$datos=$per->get_usuarios();
 




$usuario= new Usuario();
if(isset($_POST["email"]) && isset($_POST["pass"])){
  $usuario->set_email($_POST["email"]); 
  //$usuario->set_email(isset($POST["email"]));
  $usuario->set_pass($_POST["pass"]);

}



$response = $usuario->login($usuario);
echo $response;
//Llamada a la vista
//require_once("view/login.php");
//require_once("view/index.php");
//require_once("index.php");
?>
