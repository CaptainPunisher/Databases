<?php
require_once ('dbindex.php'); 
echo '<h1>Update Existing Part</h1>';

if(isset($_POST['number'])){
	echo 'Part number entered: ',($number = trim(strtoupper($_POST['number']))),'<br>';

	
	$people = $db->prepare("SELECT ID, mfgr, part_no, description, price, superceded_by, sku FROM parts WHERE part_no LIKE '%$number%'"); 
	@$people->bind_param("s", $number);
	
	$people->execute();
	
	$people->bind_result($ID, $mfgr, $part_no, $description, $price, $superceded_by, $sku);
	while($people->fetch()){
		echo '<br>ID: ', $ID,
			'<br> Mfgr & Part No.: ', $mfgr, ' ', $part_no,
			'<br>Description: ', $description, 
			'<br>Price: $', $price, 
			'<br>Superceded by: ', $superceded_by,
			'<br>SKU: ', $sku, '<br>';
	}
	
	echo "<hr><hr><br>
			Enter the ID of the part you would like to update<br>";
	
}
?>

<!DOCTYPE HTML>
<html>
<body>
<form action="uppart3.php" method="post">
ID: <input type="text" name="ID"><br>


<input type="submit" value='SUBMIT'>
<button onclick=history.go(-1)>Go back</button>
<input type='button' value='Cancel' onclick="goHome()"/>

<script type="text/javascript" language="JavaScript">
	function goHome() {
		window.location = 'http://localhost/databases.php';
	}
</script>


</body>
</html>

