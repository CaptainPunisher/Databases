<?php 

require_once ('dbindex.php');
echo '<h1>Delete Existing Part</h1>';

function delpartReturn($p){
	$ID = htmlspecialchars($p['ID']);
		
	global $db;
	$sql = $db->prepare("DELETE FROM `parts` WHERE `ID` = ?"); // BACKTICKS!!! NOT SINGLE QUOTES.
	$sql->bind_param('i', $ID);
	
	$sql->execute();
	
	if($sql){
		//success
		header('Location: http://localhost/databases.php');
		}
	else echo ":(";
		//unsuccessful
	
}

if(isset($_POST['yes'])){
	delpartReturn($_POST);
}

if(isset($_POST['ID'])){
	echo 'ID entered: ',($ID = trim(strtoupper($_POST['ID']))),'<br>';
	
	$part = $db->prepare("SELECT mfgr, part_no, description, price, sku FROM parts WHERE ID=$ID");
	@$part->bind_param("i", $ID);
	
	$part->execute();
	
	$part->bind_result($mfgr, $part_no, $description, $price, $sku);
	
	while($part->fetch()){
		echo '<br><br>MFGR: ', $mfgr, '<br>Part No: ', $part_no,
		'<br>Description: ', $description,
		'<br>Price: ', $price, '<br>SKU: ', $sku;
	}
}


?>

<!DOCTYPE HTML>
<html>
<body>

<br><br>Is this the correct part to delete?<br>
<form action='delpart3.php' method='POST'>
<input type='submit' value='Yes' name='yes'>
<input type='hidden' name='ID' value='<?php echo $ID;?>'>

<button onclick=history.go(-1)>No, go back</button>
<input type='button' value='Cancel' onclick="goHome()"/>

<script type="text/javascript" language="JavaScript">
	function goHome() {
		window.location = 'http://localhost/databases.php';
	}
</script>

</form>
</body>
</html>