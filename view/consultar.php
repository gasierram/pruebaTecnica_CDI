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
    <title>Consultar Radicado</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <script src="js/jquery-1.12.3.min.js" charset="utf-8"></script>
    <script src="bootstrap/js/bootstrap.min.js" charset="utf-8"></script>

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.min.js"></script>

<!-- Latest compiled and minified Locales -->
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/locale/bootstrap-table-zh-CN.min.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>Consultar Radicados</h1>
            <p>Type something in the input field to search the table for first names, last names or emails:</p>  
              <input class="form-control" id="rad" type="text" placeholder="Buscar Radicado.."><br>
          <table id="table">
            <thead>
                <tr>
                    <th data-field="IdRad">No. Radicado</th>
                    <th data-field="fechaRad">Fecha</th>
                    <th data-field="tituloRad">Titulo</th>
                    <th data-field="temasRad">Temas</th>
                    <th data-field="Eliminar">Eliminar</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>       
      </div>
    </div>
  </body>
</html>

<script type="text/javascript">

  $(document).ready(function() {





    var $table = $('#table');

    $.ajax({
      url:"http://localhost:8080/pruebacdi/controller/registros.php",
      dataType: "json",
      method:"GET",
      data:{},
      cache:"false",
      success:function(response) {
        if(response == null){
          $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Error!</strong> No hay Registros</div>");
        }
        console.log(response)
        var mydata = response;

        for(var i = 0; i< mydata.length; i++){
          mydata[i]["Eliminar"] = '<button type="button" id="'+mydata[i].IdRad+'" class="delete btn btn-primary" >Eliminar</button>'
        }

        console.log(mydata)

        $(function () {
          $('#table').bootstrapTable({
              data: mydata
          });
        });
      }
    });


    $("#rad").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#table tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });


  });



    $(document).on("click",".delete",function(){
    {
      if (confirm("¿Está Seguro?"))
      {
        var idRad = $(this).attr('id');
        console.log(idRad)
        var parent = $(this).parent().parent();

        $.ajax(
        {
             type: "POST",
             url: "http://localhost:8080/pruebacdi/controller/eliminar.php",
             data: {idRad: idRad},
             cache: "false",
             
             success: function(response)
             {
              console.log(response)
              parent.fadeOut('slow', function() {$(this).remove();});
             }
         });        
      }
    }
    });


</script>