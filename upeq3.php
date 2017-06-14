<?php 

require_once ('dbindex.php'); echo '<h1>Update Existing Equipment</h1>';

if(isset($_POST['ID'])){
	echo 'ID entered: ',($ID = trim(strtoupper($_POST['ID']))),'<br>';
	
	$people = $db->prepare("SELECT id, description, fmfr, fmod, fser, emfr, emod, eser FROM equipment WHERE id=$ID");
	@$people->bind_param("i", $ID);
	
	$people->execute();
	
	$people->bind_result($ID, $description, $fmfr, $fmod, $fser, $emfr, $emod, $eser);
	while($people->fetch()){
		echo '<br><br>ID: ', $ID, 
		'<br>Description: ', $description, 
		'<br>Frame Mfgr/Mod/Ser: ', $fmfr, ' ----- ', $fmod, ' ----- ', $fser,
		'<br>Engine Mfgr/Mod/Ser: ', $emfr, ' ----- ', $emod, ' ----- ', $eser;
	}
}


?>

<!DOCTYPE HTML>
<html>
<body>


<form action='upeq4.php' method='POST'>

 <br><hr><hr><br>

<input type='hidden' name='ID' value='<?php echo $ID;?>'><br>
Description: <input type='text' name='description' value='<?php echo $description;?>'><br>
Frame Mfgr/Mod/Ser: <input type='text' name='fmfr' value='<?php echo $fmfr;?>'> <input type='text' name='fmod' value='<?php echo $fmod;?>'> <input type='text' name='fser' value='<?php echo $fser;?>'><br>
Frame Mfgr/Mod/Ser: <input type='text' name='emfr' value='<?php echo $emfr;?>'> <input type='text' name='emod' value='<?php echo $emod;?>'> <input type='text' name='eser' value='<?php echo $eser;?>'><br>

<br><br>

<br><br>Is this the correct equipment information to update?<br>

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