<?php 
class Radicado{

    public $consulta;
	public $idRad;
	public $fechaRad;
	public $tituloRad;
	public $temasRad;

	public function __construct(){
		
		$this->consulta=Conectar::conexion();


	}

	public function setIdRad($idRad){
		$this->idRad= $idRad;
	}
	
	public function setfechaRad($fechaRad){
		$this->fechaRad= $fechaRad;
	}
	
	public function settituloRad($tituloRad){
		$this->tituloRad= $tituloRad;
	}
	
	public function settemasRad($temasRad){
		$this->temasRad= $temasRad;
	}



	public function getAll(){
    	
        $conectar = new Conectar();
        $connect=$conectar->conexion();
	
        $consulta=$connect->query("select * from radicado");
        while($filas=$consulta->fetch_assoc()){
            $rad[] = $filas; 
        }
        return $rad;
	}

	public function getRadicado($idRad){

        $conectar = new Conectar();
        $connect=$conectar->conexion();
	
        $consulta=$connect->query("select * from radicado where idRad = '$idRad';");
        while($filas=$consulta->fetch_assoc()){
            $rad[0] = $filas["IdRad"]; 
        }
        return $rad;
	}
	public function gettemasRad(){

		$conectar = new Conectar();
        $connect=$conectar->conexion();
	
        $consulta=$connect->query("select * from temas ");
        while($filas=$consulta->fetch_assoc()){
            $rad[] = $filas["tema"]; 
        }
        return $rad;
	}

	public function setRadicado($radicado){

        $conectar = new Conectar();
        $connect=$conectar->conexion();


	    $rad = mysqli_real_escape_string($connect, $radicado->idRad);
	    $sql = "SELECT idRad FROM radicado WHERE idRad='$rad'";
	    $result = mysqli_query($connect, $sql);
	    $num_row = mysqli_num_rows($result);
	    if ($num_row == "1") {
    		return "repetido";
	    }

	    $temas = implode(",", $radicado->temasRad);
		$consulta=$connect->query("insert into radicado (idRad, fechaRad, tituloRad, temasRad) 
			values ('$radicado->idRad', '$radicado->fechaRad', '$radicado->tituloRad', '$temas');");
       	if($consulta == true) return "creado";
       	else return "error";
	}


	public function deleteRadicado($radicado){


        $conectar = new Conectar();
        $connect=$conectar->conexion();


		$consulta=$connect->query("delete from radicado where IdRad = '$radicado->idRad';");
       	if($consulta == true) return "eliminado";
       	else return "no eliminado";
	}
	
}
?>