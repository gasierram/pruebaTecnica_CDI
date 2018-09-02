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
    <title>Crear Radicado</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <script src="js/jquery-1.12.3.min.js" charset="utf-8"></script>
    <script src="bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/jquery.numeric.js"></script>


  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <form method="post">
                        <br>
            <span id="result"></span>
            <br>
            <h1><p class="text-center">Crear Radicado</p></h1>
            <br><br>
            <div class="form-group">
              <label for="idRad">Numero de Radicado</label>
              <input type="text" name="idRad" id="idRad" class="form-control" >
            </div>
            <div class="form-group">
              <label for="fechaRad">Seleccione la fecha</label>

              <input type="text" name="fechaRad" id="fechaRad" class="form-control" >
            </div>
            <div class="form-group">
              <label for="tituloRad">Titulo</label>
              <input type="tituloRad" name="tituloRad" id="tituloRad" class="form-control">
            </div>
            <div class="form-group">
              <label for="temasRad">Temas</label>
              <select multiple="multiple" class="form-control" id="temasRad">
                <option  value="">Seleccionar</option>
              </select>
            </div>
            <br><br>
            <div class="form-group">
              <input type="button" name="crear" id="crear" value="crear" class="btn btn-success">
            </div>

          </form>
        </div>
      </div>
    </div>
  </body>
</html>

<script type="text/javascript">
  $('#idRad').numeric();
  

  $(function(){
      $("#fechaRad").datepicker({
        dateFormat: "yy-mm-dd",
        minDate: "2007-01-01",
        maxDate: "2013-12-31"
      });
  });


  $(function(){
        //e.preventDefault();
          $.ajax({type: "GET",
              url: "http://localhost:8080/pruebacdi/controller/temas.php" ,
              dataType: "json",
              success:function(result){
                console.log(result)
                var optionsList = "";
                $.each(result,function(key, value) 
                {
                 optionsList += '<option value=' + value + '>' + value + '</option>';
                    
                });
                $("#temasRad").append(optionsList);
              },
             error:function(result)
              {
              alert('error');
             }
         });
    });



  $(document).ready(function() {
    $('#crear').click(function(){
      var idRad = $('#idRad').val();
      var fechaRad = $('#fechaRad').val();
      var tituloRad = $('#tituloRad').val();
      var temasRad = $('#temasRad').val();
      console.log(idRad, fechaRad, tituloRad, temasRad)
      if($.trim(idRad).length > 0 && $.trim(fechaRad).length > 0 && $.trim(tituloRad).length > 0 && $.trim(temasRad).length > 0){
        $.ajax({
          url:"http://localhost:8080/pruebacdi/controller/crearRadicado.php",
          method:"POST",
          data:{idRad:idRad, fechaRad:fechaRad, tituloRad:tituloRad, temasRad:temasRad},
          cache:"false",
          beforeSend:function() {
            $('#crear').val("Conectando...");
          },
          success:function(response) {
            $('#crear').val("crear");
            console.log(response);
            if (response=="creado") {
              console.log(response);
              //$(location).attr('href','http://localhost:8080/pruebacdi/view/index.php');
            } else if(response == "repetido") {
              $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Error! </strong>El Numero de radicado ya existe.</div>");
            } else {
              $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Error! </strong>no se puede crear el radicado.</div>");
            }
          }
        });
      }
      else{
        $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Error! </strong>Todos los campos son Requeridos.</div>");
      };
    });
  });

</script>