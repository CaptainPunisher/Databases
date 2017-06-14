<?php
require_once ('dbindex.php'); 
echo '<h1>Delete Existing Equipment</h1>';

/*
if(isset($_POST['name'])){
	echo 'Name string entered: ',($name = trim(strtoupper($_POST['name']))),'<br>';
	
	
	$people = $db->prepare("SELECT id, name, address, city, state, zip, phone, fax, website, email FROM supplier WHERE name LIKE '%$name%'");

	@$people->bind_param("s", $name);
	
	
	$people->execute();
	
	$people->bind_result($id, $name, $address, $city, $state, $zip, $phone, $work, $website, $email);

	while($people->fetch()){
		echo '<br><br>ID: ', $id, '<br>Name: ', $name, '<br>Address: ', $address,
		'<br>CSZ: ', $city, '  ', $state, '  ', $zip,
		'<br>Phone: ', $phone, '    Fax: ', $work, 
		'<br>Website: ', $website, ' ----- Email: ', $email;
	}
	
	echo "<br><br><hr><hr><br>
			Enter the ID of the supplier you would like to delete<br>";
	
}
*/

if(!empty($_POST['fser']) and !empty($_POST['eser'])){
	echo 'Frame Serial string entered: ',($fser = trim(strtoupper($_POST['fser']))),'<br>';
	echo 'Engine Serial string entered: ',($eser = trim(strtoupper($_POST['eser']))),'<br>';

	
	$people = $db->prepare("SELECT id, description, fmfr, fmod, fser, emfr, emod, eser FROM equipment 
		WHERE fser LIKE '%$fser%' AND eser LIKE '%$eser%'"); 
	
	@$people->bind_param("s", $fser);
	
	$people->execute();
	
	$people->bind_result($ID, $description, $fmfr, $fmod, $fser, $emfr, $emod, $eser);
	echo '<br><hr><hr>';
	while($people->fetch()){
		echo '<br>ID: ', $ID,
			'<br>Description: ', $description,
			'<br>Frame Mfgr, Mod, Ser: ', $fmfr, ' -- ', $fmod, ' -- ', $fser,
			'<br>Engine Mfgr, Mod, Ser: ', $emfr, ' -- ', $emod, ' -- ', $eser, '<br>';
	}
	
	echo "<br><hr><br>
			Enter the ID of the equipment you would like to delete<br>";
	
} else if(!empty($_POST['fser'])){
	echo 'Frame Serial string entered: ',($fser = trim(strtoupper($_POST['fser']))),'<br>';

	
	$people = $db->prepare("SELECT id, description, fmfr, fmod, fser, emfr, emod, eser FROM equipment 
		WHERE fser LIKE '%$fser%'"); 
	
	@$people->bind_param("s", $fser);
	
	$people->execute();
	
	$people->bind_result($ID, $description, $fmfr, $fmod, $fser, $emfr, $emod, $eser);
	echo '<br><hr><hr>';
	while($people->fetch()){
		echo '<br>ID: ', $ID,
			'<br>Description: ', $description,
			'<br>Frame Mfgr, Mod, Ser: ', $fmfr, ' -- ', $fmod, ' -- ', $fser,
			'<br>Engine Mfgr, Mod, Ser: ', $emfr, ' -- ', $emod, ' -- ', $eser, '<br>';
	}
	
	echo "<br><hr><br>
			Enter the ID of the equipment you would like to delete<br>";
	
} else if(!empty($_POST['eser'])){
	echo 'Frame Serial string entered: ',($eser = trim(strtoupper($_POST['eser']))),'<br>';

	
	$people = $db->prepare("SELECT id, description, fmfr, fmod, fser, emfr, emod, eser FROM equipment 
		WHERE eser LIKE '%$eser%'"); 

	@$people->bind_param("s", $eser);
	
	$people->execute();
	
	$people->bind_result($ID, $description, $fmfr, $fmod, $fser, $emfr, $emod, $eser);
	echo '<br><hr><hr>';
	while($people->fetch()){
		echo '<br>ID: ', $ID,
			'<br>Description: ', $description,
			'<br>Frame Mfgr, Mod, Ser: ', $fmfr, ' -- ', $fmod, ' -- ', $fser,
			'<br>Engine Mfgr, Mod, Ser: ', $emfr, ' -- ', $emod, ' -- ', $eser, '<br>';
	}
	
	echo "<br><hr><br>
			Enter the ID of the equipment you would like to delete<br>";
	
} else{
	echo 'No Frame Serial string entered. Listing all. <br>';
	$people = $db->prepare("SELECT id, description, fmfr, fmod, fser, emfr, emod, eser FROM equipment"); 
	
	@$people->bind_param("s", $fser);
	
	$people->execute();
	
	$people->bind_result($ID, $description, $fmfr, $fmod, $fser, $emfr, $emod, $eser);
	echo '<br><hr><hr>';
	while($people->fetch()){
		echo '<br>ID: ', $ID,
			'<br>Description: ', $description,
			'<br>Frame Mfgr, Mod, Ser: ', $fmfr, ' -- ', $fmod, ' -- ', $fser,
			'<br>Engine Mfgr, Mod, Ser: ', $emfr, ' -- ', $emod, ' -- ', $eser, '<br>';
	}
	
	echo "<br><hr><br>
			Enter the ID of the equipment you would like to delete<br>";
	
}
?>



<!DOCTYPE HTML>
<html>
<body>
<form action="deleq3.php" method="post">
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

