<?php 

require_once ('dbindex.php'); 
echo '<h1>Delete Existing Equipment</h1>';

function deleqReturn($p){
	$ID = htmlspecialchars($p['ID']);
		
	global $db;
	$sql = $db->prepare("DELETE FROM `equipment` WHERE `id`= ?"); // BACKTICKS!!! NOT SINGLE QUOTES.
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
	deleqReturn($_POST);
}

if(isset($_POST['ID'])){
	echo 'ID entered: ',($ID = trim(strtoupper($_POST['ID']))),'<br><br><hr><hr>';
	
	$people = $db->prepare("SELECT description, fmfr, fmod, fser, emfr, emod, eser FROM equipment WHERE id=$ID"); //'%$name%'");
	@$people->bind_param("i", $ID);	
	
	$people->execute();
	
	$people->bind_result($description, $fmfr, $fmod, $fser, $emfr, $emod, $eser);
	while($people->fetch()){
		echo '<br>Description: ', $description, 
			'<br>Frame Mfgr/Mod/Ser: ', $fmfr, ' ----- ', $fmod, ' ----- ', $fser,
			'<br>Engine Mfgr/Mod/Ser: ', $emfr, ' ----- ', $emod, ' ----- ', $eser;
	}
}


?>

<!DOCTYPE HTML>
<html>
<body>

<hr><br>Is this the correct equipment to delete?<br>
<form action='deleq3.php' method='POST'>

<input type='hidden' name='ID' value='<?php echo $ID;?>'>

<input type='submit' value='Yes' name='yes'>
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