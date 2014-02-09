
<?php
if (! mysql_connect ( "localhost", "root", "root" )) {
	print ("Erro To try set connection") ;
}

if (! mysql_select_db ( "usuarios" )) {
	print ("Error To Try Connet") ;
}

$sql = "SELECT UserUUID,UserName,UserPass FROM User WHERE UserID >= 1";

$valor = mysql_query ( $sql );

while ( $row = mysql_fetch_array ( $valor ) ) {
	
	print ("Campos" . "</br></br>") ;
	echo "<pre>";
	
	print ("<p>") ;
	print ("UUID: ") ;
	print ($row ["UserUUID"]) ;
	print ("</p>") ;
	
	print ("<p>") ;
	print ("User Name: ") ;
	print ($row ["UserName"]) ;
	print ("</p>") ;
	
	print ("<p>") ;
	print ("Password: ") ;
	print ($row ["UserPass"]) ;
	print ("</p>") ;
	echo "</pre>";
}

?>			    