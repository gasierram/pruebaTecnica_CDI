<?php

session_start();
if (isset($_SESSION["user"])) {
  header("location:http://localhost:8080/pruebacdi/view/index.php");
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <script src="js/jquery-1.12.3.min.js" charset="utf-8"></script>
    <script src="bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <form method="post">
            <br><br>
            <h1><p class="text-center">Login</p></h1>
            <br><br>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
              <label for="pass">Password</label>
              <input type="password" name="pass" id="pass" class="form-control">
            </div>
            <br><br>
            <div class="form-group">
              <input type="button" name="login" id="login" value="Login" class="btn btn-success">
            </div>
            <br>
            <span id="result"></span>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>

<script>

  function validateEmail($email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test( $email );
  }
  $(document).ready(function() {
    $('#login').click(function(){
      var email = $('#email').val();
      var pass = $('#pass').val();

       if($("#email").val().indexOf('@', 0) == -1 || $("#email").val().indexOf('.', 0) == -1) {
            alert('El correo electrónico introducido no es correcto.');
            return false;
        }




      if($.trim(email).length > 0 && $.trim(pass).length > 0){
        $.ajax({
          url:"http://localhost:8080/pruebacdi/controller/logueame.php",
          method:"POST",
          data:{email:email, pass:pass},
          cache:"false",
          beforeSend:function() {
            $('#login').val("Conectando...");
          },
          success:function(response) {
            $('#login').val("Login");
            console.log(response);
            if (response=="1") {
              console.log(response);
              $(location).attr('href','http://localhost:8080/pruebacdi/view/index.php');
            } else {
              $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Error!</strong> las credenciales son incorrectas.</div>");
            }
          }
        });
      };
    });
  });
</script>
