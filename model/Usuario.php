<?php
class Usuario{
    private $db;
    public $user;
    private $usuarios;
    private $id;
    public $pass;
    private $email; 
 

    public function __construct(){
        
        $this->usuarios=array();
        $this->db=Conectar::conexion();
    }

    public function set_user($user){
        $this->user= $user;

    }

    public function set_id($id){
        $this->id= $id;

    }
    public function set_pass($pass){
        $this->pass= $pass;

    }

    public function set_email($email){
        $this->email= $email;

    }


    public function get_usuarios(){
        $consulta=$connect->query("select * from usuario;");
        while($filas=$consulta->fetch_assoc()){
            $this->usuarios[]=$filas;
        }
        return $this->usuarios;
    }

    public function get_user($connect){
        $consulta=$connect->query("select * from usuario where user='$user' ");
        while($filas=$consulta->fetch_assoc()){
            $this->user=$filas["user"]; 
        }
    }

    public function get_email(){
        $consulta=$connect->query("select * from usuario where email='$email' ");
        while($filas=$consulta->fetch_assoc()){
            $this->user=$filas["email"]; 
        }
    }

    public function login($usuario){


        session_start();
        $conectar = new Conectar();
        $connect=$conectar->conexion();
        if(true){
          $email = mysqli_real_escape_string($connect, $usuario->email);
          $pass = mysqli_real_escape_string($connect, $usuario->pass);
          $sql = "SELECT user FROM usuario WHERE email='$email' AND pass='$pass'";
          $result = mysqli_query($connect, $sql);
          //printf($result);
          //$result = $this->db->query($sql);
          $num_row = mysqli_num_rows($result);
          //printf($num_row);
          if ($num_row == "1") {
            $data = mysqli_fetch_array($result);
            $_SESSION["user"] = $data["user"];
            return "1";
          } else {
            return "error";
          }
        } else {
          return "error";
        }
    }
}
?>