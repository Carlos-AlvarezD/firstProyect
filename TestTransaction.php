<?php
$connecton = mysql_connect("localhost","root","root")or die("Connection Error");
$dataBase  = mysql_select_db("tester")or die("dataBase connection");



$sqlA = "SELECT * FROM a where id = 2";
$sqlB = "SELECT * FROM b where id = 2";

$resA = mysql_query($sqlA);
$resB = mysql_query($sqlB);

	
//mysql_query("SET AUTOCOMMIT=0");
//mysql_query("START TRANSACTION");

mysql_autocommit($connecton,false);
try{
	for($x=1;$x <=4;$x++){

		/* Insert Data */
		$insertA	= "INSERT INTO a(A,B,C,D,FK)VALUES($x,$x,$x, $x,$x)";
		$resul1 	= mysql_query($insertA);

	}
	mysql_query("commit");

	$response = true;
    print("ok");
}catch(any $e){
		$response = false;
		print($e->message);	  
		//mysql_query("transactionrollback");
}


if($response == true){
	print("Transaction Succesful");
	mysql_query("commit");
}else{
	print("Transaction Rollback");
	mysql_query("rollback");
}



while ($rowA = mysql_fetch_assoc ( $resA ) ) {
       $datoA = $rowA ['A'];
       print("</br>");
       print($datoA);	

}
while ($row = mysql_fetch_assoc ( $resB ) ) {
       $datoB = $row ['A'];
       print("</br>");
       print($datoB);	

}




	
?>
