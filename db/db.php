<?php
class Conectar{
    public static function conexion(){
        //$conexion= mysqli_connect("localhost", "root", "", "radicados");
        //$conexion->query("SET NAMES 'utf8'");
        //return $conexion;

		$conexion=new mysqli("localhost", "root", "", "radicados");
        $conexion->query("SET NAMES 'utf8'");
        return $conexion;
    }
}
?>