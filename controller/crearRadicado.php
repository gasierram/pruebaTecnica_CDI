<?php
//Llamada al modelo
require_once("model/Radicado.php");

require_once("db/db.php");

$radicado= new Radicado();
if(isset($_POST["idRad"]) && isset($_POST["fechaRad"]) && isset($_POST["tituloRad"]) && isset($_POST["temasRad"])){



  $radicado->setIdRad($_POST["idRad"]); 
  $radicado->setfechaRad($_POST["fechaRad"]);
  $radicado->settituloRad($_POST["tituloRad"]);
  $radicado->settemasRad($_POST["temasRad"]);
}
$response = $radicado->setRadicado($radicado);

echo $response;
?>
