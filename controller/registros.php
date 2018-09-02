<?php 


require_once("model/Radicado.php");


require_once("db/db.php");
//$per=new Usuario();
//$datos=$per->get_usuarios();
 


$radicado= new Radicado();

$data = $radicado->getAll();




$s_to_json=json_encode((array)$data);
echo $s_to_json;

 
?>
