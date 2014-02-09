<?php

// $guid = com_create_guid();
// echo $guid;
// If you are not a on windows based platform you can roll this code for making GUIDs in PHP
function getGUID() {
	if (function_exists ( 'com_create_guid' )) {
		return com_create_guid ();
	} else {
		mt_srand ( ( double ) microtime () * 10000 ); // optional for php 4.2.0 and up.
		$charid = strtoupper ( md5 ( uniqid ( rand (), true ) ) );
		$hyphen = chr ( 45 ); // "-"
		$uuid = chr ( 123 ) . 		// "{"
		substr ( $charid, 0, 8 ) . $hyphen . substr ( $charid, 8, 4 ) . $hyphen . substr ( $charid, 12, 4 ) . $hyphen . substr ( $charid, 16, 4 ) . $hyphen . substr ( $charid, 20, 12 ) . chr ( 125 ); // "}"
		return $uuid;
	}
}

$GUID = getGUID ();
echo $GUID;
/*======================================================================================*/

/*
$username = "carlos";
$password = "123";

//session_start();

$_SESSION['algo'] = $username;

?>

<html>
<title>Test</title>
<head>
</head>
<body>
  <div>
  	<?php print($_SESSION['algo']); ?>

  </div>

</body>
</html>*/