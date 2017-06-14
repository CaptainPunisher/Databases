<?php 

require_once ('dbindex.php'); 
echo '<h1>Update Existing Part</h1>';

if(isset($_POST['ID'])){
	echo 'ID entered: ',($ID = trim(strtoupper($_POST['ID']))),'<br>';
	
	$people = $db->prepare("SELECT ID, mfgr, part_no, description, price, superceded_by, sku FROM parts WHERE ID=$ID"); //'%$name%'");
	@$people->bind_param("i", $ID);
	
	$people->execute();
	
	$people->bind_result($ID, $mfgr, $part_no, $description, $price, $superceded_by, $sku);
	while($people->fetch()){
		echo '<br>ID: ', $ID, 
		'<br>MFGR Part #: ', $mfgr, ' ', $part_no, 
		'<br> Description: ', $description,
		'<br>Price: ', $price,
		'<br>Superceded by: ', $superceded_by,
		'<br>SKU: ', $sku, '<br>';
	}
}


?>

<!DOCTYPE HTML>
<html>
<body>


<form action='uppart4.php' method='POST'>

 <br><hr><hr><br>

<input type='hidden' name='ID' value='<?php echo $ID;?>'>
<input type='hidden' name='mfgr' value='<?php echo $mfgr;?>'>
<input type='hidden' name='part_no' value='<?php echo $part_no;?>'>
<input type='hidden' name='sku' value='<?php echo $sku;?>'>
Description: <input type='text' name='description' value='<?php echo $description;?>'><br>
Price: <input type='text' name='price' value='<?php echo $price;?>'><br>
Superceded by: <input type='text' name='superceded_by' value='<?php echo $superceded_by;?>'><br>

<br><hr><br>

Is this the correct part information to update?<br>

<input type='submit' value='Yes' name='eyes'>
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