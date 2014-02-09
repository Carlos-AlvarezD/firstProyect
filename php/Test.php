<?php

$conexion = mysql_connect("localhost","root","root") or die ("error en la conexion");
$db = mysql_select_db("compras",$conexion) or die("Error en la base de datos");

$usuario = "carlos";
$password = "123";

function validarUsuario($usuario,$password){
    try{
        $sql = "SELECT UserUUID,FirstName FROM cmuser WHERE UserName = '" . $usuario . "' and Password= '" . $password . "'";
        $res = mysql_query($sql);

        /* La funcion mysql_fetch_array no 
         * funciona dos veces con la misma variable, es decir 
         * se debe crear otra variable que almacene la consulta 
         * para poder utilizar la funcion en el mismo scop el programa
         */

        $row = mysql_fetch_array ($res );
        if (mysql_num_rows($res)!= 1){
            throw new Exception("No es un usuario");
        } 

        $dato = array("firstname" => $row ["FirstName"],"error" => FALSE); 
        var_dump($dato);

        /* La siguiente estructura se utiliza si el 
         * resultado en la consulta es mas de una fila a imprimir 
         * en caso contrario, se podera utilizar solo mysql_fetch_array
         * if (mysql_num_rows ($resPost) > 0) {
         *     while( $row = mysql_fetch_assoc ( $resPost)) {
         *      //Imprime mas de una fila obtenidas en la consulta  
         *    }
         * }
         */
        return $dato;
    }catch(Exception $e){

        $dato = array("msg" => $e->getMessage(),"error" => TRUE);
        var_dump($dato);
        return $dato;
    }
}
$dato = validarUsuario($usuario,$password);    
print($dato["firstname"]);
/*class Construc {
	public function construc() {
		$this->host = "localhost";
		$this->user = "root";
		$this->pass = "rootq";
		$this->dataBase = "usuarios";
		$this->name = "Error: EmptyName";
		$this->msg = true;
	}
	public function conectar() {
		try {
			
			if (! mysql_connect ( $this->host, $this->user, $this->pass )) {
				throw new Exception ( "Erro To try set connection" );
			}
			if (! mysql_select_db ( $this->dataBase )) {
				throw new Exception ( "Error To Try Connect" );
			}
			
			return $this->msg = false; // Por el momento queda asi hasta saber como formar una estructara con los mensajes
		} catch ( Exception $e ) {
			$this->msg = "Connection Error:" . " " . $e;
			return $this->msg;
		}
	}
	public function showInfo() {
		echo "<p>";
		echo $this->host;
		echo "</p>";
		echo "<p>";
		echo $this->user;
		echo "</p>";
		echo "<p>";
		echo $this->pass;
		echo "</p>";
		echo "<p>";
		echo $this->dataBase;
		echo "</p>";
		echo "<p>";
		echo $this->name;
	}
}

$objContruc = new Construc ();

$msg = $objContruc->conectar ();

// print($msg);

if ($msg) {
	Print ("Connection Faild") ;
} else {
	Print ("Connection Succesfull") ;
}*/

?>
