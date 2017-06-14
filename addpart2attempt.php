<?php
/*
require_once ('dbindex.php'); echo '<br><br><br>';

if(isset($_POST['lname'])){
	$lname = trim($_POST['lname']);
	
	$people = $db->prepare("SELECT $fname, lname FROM people WHERE lname = ?");
	$people->bind_param('s', $lname);
	$people->execute();
	
	$people->bind_result($fname, $lname);
}

*/
///////////////////////////


//<?php
$mysqli = new mysqli('127.0.0.1', 'root', '', 'mowershop');

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
else echo "Connected<br><br>";

$stmt = $mysqli->prepare("INSERT INTO parts VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param('ssssdis', $mfgr, $part_no, $description, $superceded_by, $price, $f, $sku);

echo "stmt created<br><br>";

$mfgr ='HON';
$part_no ='23452-ZE2-002';
$description ='AIR FILTER';
$superceded_by = null;
$price =5.45;
$f =1;
$sku ='1233-1233-312';

echo 'vars created<br><br>';

/* execute prepared statement */
$stmt->execute();

printf("%d Row inserted.\n", $stmt->affected_rows);

/* close statement and connection */
$stmt->close();

/* Clean up table CountryLanguage */
//$mysqli->query("DELETE FROM CountryLanguage WHERE Language='Bavarian'");
//printf("%d Row deleted.\n", $mysqli->affected_rows);

/* close connection */
$mysqli->close();
//?>



?>