<?php
require_once ('dbindex.php'); 
echo '<h1>Delete Existing Part</h1>';

if(isset($_POST['part_no'])){
	//echo 'Manufacturer entered: ',($mfgr = trim(strtoupper($_POST['mfgr']))),'<br>';
	echo 'Part number string entered: ',($part_no = trim(strtoupper($_POST['part_no']))),'<br><br><hr>';

	
	$part = $db->prepare("SELECT ID, mfgr, part_no, description, price, sku FROM parts WHERE part_no LIKE '%$part_no%'"); 
	@$part->bind_param("s", $part_no);
		
	$part->execute();
	
	$part->bind_result($ID, $mfgr, $part_no, $description, $price, $sku);
	
	while($part->fetch()){
		echo '<br>ID: ', $ID, 
			'<br>Manufacturer: ', $mfgr, 
			'<br>Part Number: ', $part_no, 
			'<br>Description: ', $description,
			'<br>Price: ', $price,
			'<br>SKU: ', $sku, '<br>';
	}
	
	echo "<hr><hr><br>
			Enter the ID of the part you would like to delete<br>";
	
}
?>

<!DOCTYPE HTML>
<html>
<body>
<form action="delpart3.php" method="post">
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

