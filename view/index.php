<?php

session_start();
if(!isset($_SESSION["user"])){
  header("location:http://localhost:8080/pruebacdi/index.php");
}
	

echo '<h1 >Bienvenido usuario:'.$_SESSION["user"].'</h1>';
echo '<p ><a href="http://localhost:8080/pruebacdi/view/logout.php">Logout</a></p>';

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <script src="js/jquery-1.12.3.min.js" charset="utf-8"></script>
    <script src="bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-6 text-center">
        	<button id="btnCrear" class="btn btn-primary" >Crear Radicado</button>	  
        	<br>
        </div>        
        <div class="col-lg-12 col-md-6 text-center">
        	  <button id="btnConsultar" class="btn btn-primary">Consultar Radicado</button>
        </div>        
      </div>
    </div>
  </body>
</html>

<script type="text/javascript">
  $(document).ready(function() {
    $("#btnCrear").click(function(){
      $(location).attr('href','http://localhost:8080/pruebacdi/view/crear.php');
    }); 
  });
  $(document).ready(function() {
    $("#btnConsultar").click(function(){
      $(location).attr('href','http://localhost:8080/pruebacdi/view/consultar.php');
    }); 
  });
</script>