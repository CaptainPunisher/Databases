<?php 

require_once ('dbindex.php'); 
echo '<h1>Add Invoice -- Customer</h1>';

if(isset($_POST['ID'])){
	($ID = trim(strtoupper($_POST['ID'])));
	
	$people = $db->prepare("SELECT ID, name, address, city, state, zip, phone, phone2 FROM customer WHERE ID=$ID");
	@$people->bind_param("i", $ID);
	
	$people->execute();
	
	$people->bind_result($ID, $name, $address, $city, $state, $zip, $phone, $phone2);
	while($people->fetch()){
		echo $name, 
		'<br>', $address,
		'<br>', $city, ', ', $state, ' ', $zip,
		'<br>', $phone, ' ----- ', $phone2;
	}
}

echo '<br><hr><hr>',
	 '<h2>Which piece of equipment is this for?</h2>',
	 "<font color='red'>Please enter the equipment ID to invoice<br></font>";


$equip = $db->prepare("SELECT id, description, fmfr, fmod, fser, emfr, emod, eser FROM equipment 
	WHERE cust_id = $ID"); 

@$equip->bind_param("i", $ID);

$equip->execute();

$equip->bind_result($eqId, $description, $fmfr, $fmod, $fser, $emfr, $emod, $eser);
echo '<br><hr><hr>';
while($equip->fetch()){
	echo '<br>ID: ', $eqId,
		'<br>Description: ', $description,
		'<br>Frame Mfgr, Mod, Ser: ', $fmfr, ' -- ', $fmod, ' -- ', $fser,
		'<br>Engine Mfgr, Mod, Ser: ', $emfr, ' -- ', $emod, ' -- ', $eser, '<br>';
}
?>

<!DOCTYPE HTML>
<html>
<body>
<br><hr><hr>

<form action='addinv4.php' method='POST'>



<input type='hidden' name='custId' value='<?php echo $ID;?>'><br>
Equipment ID #: <input type='text' name='eqId'><br>

<br>Is this the correct customer and equipment to invoice?<br>

<input type='submit' value='Yes' name='eyes'>
<button onclick=history.go(-1)>No, go back</button>
<input type='button' value='Cancel' onclick="goHome()"/>

<script type="text/javascript" language="JavaScript">
	function goHome() {
		window.location = 'http://localhost/databases.php';
	}
</script>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</form>
</body>
</html>