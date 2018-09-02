<?php
//Llamada al modelo
require_once("model/Radicado.php");

require_once("db/db.php");

$radicado= new Radicado();
if(isset($_POST["idRad"])){

  $radicado->setIdRad($_POST["idRad"]); 
  
}
$response = $radicado->deleteRadicado($radicado);

echo $response;
?>
