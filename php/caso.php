<?php
include "info.php";

$opcion = $_POST ["tipo"];
$obj = new Usuario ();
$carro = new Usuario ();
$conncet = $obj->conectar ();

/*Cambiar esto*/
if ($conncet){
    exit ();
}
    

switch ($opcion) {
    case 1 :
	echo json_encode($obj->validarUsuarios ( $user = $_POST ["user"], $pass = $_POST ["pass"] ));
        break;
    case 2 :
        echo json_encode ( $carro->carroCompras ( $_POST ) );
        break;

    case error :
        print ("Error In Conncection Whit Data Base") ;
        break;
}

?>