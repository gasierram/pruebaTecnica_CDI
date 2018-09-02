<?php
//Llamada al modelo
require_once("model/Radicado.php");

require_once("db/db.php");

$radicado= new Radicado();

$response = $radicado->gettemasRad();


$s_to_json=json_encode((array)$response);
echo $s_to_json;
?>
