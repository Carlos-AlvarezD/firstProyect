<?php

/*
    Autor:  Carlos Andres Alvarez
    Fecha:  22-Feb-2014
    Descri: Entregar informacion de usuarios y producto de la base de datos. 
            Establece la conexion con la base de datos.
*/ 

class Usuario {
    public function Usuario() {
        $this->host = "localhost";
        $this->user = "root";
        $this->pass = "root";
        $this->dataBase = "compras";
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
            $this->msg = "Connection Error:" . " " . $e->getMessage();
            return $this->msg;
        }
    }
    public function validarUsuarios($usuario, $password) {
            // recibe los datos de la variable data de jquery y los compara en la sentencia sql
        try{
            session_start();
            $sql = "SELECT UserUUID,FirstName FROM cmuser WHERE UserName = '" . $usuario . "' and Password= '" . $password . "'";
            $res = mysql_query($sql);

            /* La funcion mysql_fetch_array no 
             * funciona dos veces con la misma variable, es decir 
             * se debe crear otra variable que almacene la consulta 
             * para poder utilizar la funcion en el mismo scope el programa
             */

            $row = mysql_fetch_array ($res );
            if (mysql_num_rows($res)!= 1){
                throw new Exception("Error en el usuario o la contraseña!");
            } 
            
            /* Se deben utilizar [] segun la ultima version de php
             * ademas para que javascript interprete de manera correcta el resultado
             */
            $dato[] = array("firstname" => $row ["FirstName"],"error" => FALSE); 
            $_SESSION["userUUID"]= $row ["UserUUID"]; 
            
            /* La siguiente estructura se utiliza si el 
             * resultado en la consulta es mas de una fila a imprimir 
             * en caso contrario, se podra utilizar solo mysql_fetch_array
             * if (mysql_num_rows ($resPost) > 0) {
             *     while( $row = mysql_fetch_assoc ( $resPost)) {
             *      //Imprime mas de una fila obtenidas en la consulta  
             *    }
             * }
             */
             return $dato;
        }catch(Exception $e){

            $dato[] = array("msg" => $e->getMessage(),"error" => TRUE);
            return $dato;
        }
    }
    public function carroCompras($respuesta) {
        $query = "SELECT ProductoUUID,ProductoCode,ProductoDesc,ProductoVal,ProductoImgPath FROM Producto";
        $res = mysql_query($query);
        /* Way for print the array un one Line
         *$row = mysql_fetch_assoc($res);
        *$id_art = $row ['ProductImgSrc'];
        *printf($id_art);
        *exit;
         */

        while ( $row = mysql_fetch_assoc ( $res ) ) {
            $dato [] = array(
                            "ProductoUUID"   => $row ['ProductoUUID'],
                            "ProductoName"   => $row ['ProductoDesc'],
                            "ProductoVal"    => $row ['ProductoVal'],
                            "ProductoImgPath" => $row ['ProductoImgPath'],
                            );
            //var_dump($dato);
            //exit();
            //echo json_encode($dato);
        }
        return $dato;
    }
    public function actializarVenta() {
        $sql = "UPDATE";
    }
}
?>
