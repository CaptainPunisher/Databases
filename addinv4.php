<?php 

require_once ('dbindex.php'); 
echo '<h1>Add Invoice -- Customer</h1><hr><hr>';

if(isset($_POST['custId']) and isset($_POST['eqId'])){
	($custId = trim(strtoupper($_POST['custId'])));
	($eqId = trim(strtoupper($_POST['eqId'])));
	
	$inv = $db->prepare("INSERT INTO invoice (cust_id, eq_id) VALUES (?, ?)");
	@$inv->bind_param("ii", $custId, $eqId);
	
	$inv->execute();
	
	
	
	$invId = $db->prepare("SELECT id FROM invoice WHERE cust_id=$custId AND eq_id=$eqId AND date >= now()-60");
	@$invId->bind_param("ii", $custId, $eqId);
	
	$invId->execute();
	$invId->bind_result($invNo);
	
	$lastInv = null;
	while($invId->fetch()){
		//echo "<h1>Invoice ID = ".$invNo."</h1>";
		$lastInv = $invNo;
	}
	
	echo "<h1>Invoice number: ".$lastInv."</h1>";
	
		//$people = $db->prepare("SELECT ID, name, address, city, state, zip, phone, phone2 FROM customer WHERE ID = $custId");
	$people = $db->prepare("SELECT ID, name, address, city, state, zip, phone, phone2 FROM customer WHERE ID=$custId");
	@$people->bind_param("i", $custId);
	
	$people->execute();
	
	$people->bind_result($IDcust, $name, $address, $city, $state, $zip, $phone, $phone2);
	while($people->fetch()){
		echo $name, 
		'<br>', $address,
		'<br>', $city, ', ', $state, ' ', $zip,
		'<br>', $phone, ' ----- ', $phone2;
	}
	$equip = $db->prepare("SELECT id, description, fmfr, fmod, fser, emfr, emod, eser FROM equipment 
		WHERE id = $eqId"); 

	@$equip->bind_param("i", $eqId);

	$equip->execute();
	
	$equip->bind_result($IDeq, $description, $fmfr, $fmod, $fser, $emfr, $emod, $eser);
	echo '<br><hr><hr>';
	while($equip->fetch()){
		echo '<br>Description: ', $description,
			'<br>Frame Mfgr, Mod, Ser: ', $fmfr, ' -- ', $fmod, ' -- ', $fser,
			'<br>Engine Mfgr, Mod, Ser: ', $emfr, ' -- ', $emod, ' -- ', $eser, '<br>';
	}
	
}

echo '<br><hr><hr>',
	 '<h2>What would you like to add?</h2>';
	 //"<font color='red'>Please enter the equipment ID to invoice<br></font>";



?>

<!DOCTYPE HTML>
<html>
<body>

<form action='inputlabor.php' method='POST'>
<input type='submit' value='INPUT LABOR' name='labor'>
<input type='hidden' name='invNo' value='<?php echo $lastInv;?>'>
</form>

<form action='inputpart.php' method='POST'>
<input type='submit' value='INPUT PART' name='part'>
<input type='hidden' name='invNo' value='<?php echo $lastInv;?>'>

<!--<input type='submit' value='Yes' name='eyes'>-->
<button onclick=history.go(-1)>Make a change</button>
<input type='button' value='Cancel' onclick="goHome()"/>

<script type="text/javascript" language="JavaScript">
	function goHome() {
		window.location = 'http://localhost/databases.php';
	}
</script>
</form>

<!--<form action='addinv5.php' method='POST'>
 Labor   : <input type='text' name='labor'><input type='submit' value='Input Labor' name='labor'> <br>
Part No: <input type='text' name='part'> <input type='submit' value='Input Part No.' name='part'><br>
-->
<br><hr><hr>


<!--


<input type='hidden' name='invId' value='<?php //echo $lastInv;?>'>
<input type='hidden' name='custId' value='<?php //echo $custId;?>'>
<input type='hidden' name='eqId' value='<?php //echo $eqId;?>'>
<!-- Equipment ID #: <input type='text' name='eqId'> <br>

<br>Is this the correct customer and equipment to invoice?  <br>-->

<!-- <input type='submit' value='Yes' name='eyes'> -->
<button onclick=history.go(-1)>Go back</button>
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