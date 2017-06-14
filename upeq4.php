<?php 
require_once ('dbindex.php'); 
echo '<h1>Update Existing Equipment</h1>';

echo
	"Information will be changed to the following: <br><br><hr>",
	
	'<br>ID: ', ($ID = trim(strtoupper($_POST['ID']))), 
	'<br>Description: ', ($description = trim(strtoupper($_POST['description']))),
	'<br>Frame Mfgr/Mod/Ser: ', ($fmfr = trim(strtoupper($_POST['fmfr']))), ' ----- ', ($fmod = trim(strtoupper($_POST['fmod']))), ' ----- ', ($fser = trim(strtoupper($_POST['fser']))),
	'<br>Engine Mfgr/Mod/Ser: ', ($emfr = trim(strtoupper($_POST['emfr']))), ' ----- ', ($emod = trim(strtoupper($_POST['emod']))), ' ----- ', ($eser = trim(strtoupper($_POST['eser'])));
	

function upeqReturn($p){
	$ID = trim(strtoupper(htmlspecialchars($p['ID'])));
	$description = trim(strtoupper(htmlspecialchars($p['description'])));
	$fmfr = trim(strtoupper(htmlspecialchars($p['fmfr'])));
	$fmod = trim(strtoupper(htmlspecialchars($p['fmod'])));
	$fser = trim(strtoupper(htmlspecialchars($p['fser'])));
	$emfr = trim(strtoupper(htmlspecialchars($p['emfr'])));
	$emod = trim(strtoupper(htmlspecialchars($p['emod'])));
	$eser = trim(strtoupper(htmlspecialchars($p['eser'])));
		
	global $db;
	
	$sql = $db->prepare("UPDATE `equipment` 
							
							SET `description`=?, `fmfr`=?, `fmod`=?, `fser`=?, `emfr`=?, `emod`=?, `eser`=?
						
						WHERE `equipment`.`id`= ?"); // BACKTICKS!!! NOT SINGLE QUOTES.
	$sql->bind_param('sssssssi', $description, $fmfr, $fmod, $fser, $emfr, $emod, $eser, $ID);
	
	$sql->execute();
	
	echo "
<form action='databases.php' method='GET'>


<input type='hidden' name='change' value='xxx'>
<input type='hidden' name='ID' value='<?php echo $ID;?>'>
<input type='hidden' name='description' value='<?php echo $description;?>'>
<input type='hidden' name='fmfr' value='<?php echo $fmfr;?>'>
<input type='hidden' name='fmod' value='<?php echo $fmod;?>'> 
<input type='hidden' name='fser' value='<?php echo $fser;?>'> 
<input type='hidden' name='emfr' value='<?php echo $emfr;?>'>
<input type='hidden' name='emod' value='<?php echo $emod;?>'>
<input type='hidden' name='eser' value='<?php echo $eser;?>'>

</form>
";
	
	if($sql){
		//success
		header('Location: http://localhost/databases.php');
		}
	else echo ":(";
		//unsuccessful
	
}

if(isset($_POST['yes'])) { 

echo $_POST['ID'];
echo $_POST['description'];
echo $_POST['fmfr']; 
echo $_POST['fmod'];
echo $_POST['fser'];
echo $_POST['emfr'];
echo $_POST['emod'];
echo $_POST['eser'];
upeqReturn($_POST);
}


?>

<!DOCTYPE HTML>
<html>
<body>

<form action='upeq4.php' method='POST'>

 <br><hr><br>

<input type='hidden' name='ID' value='<?php echo $ID;?>'>
<input type='hidden' name='description' value='<?php echo $description;?>'>
<input type='hidden' name='fmfr' value='<?php echo $fmfr;?>'>
<input type='hidden' name='fmod' value='<?php echo $fmod;?>'> 
<input type='hidden' name='fser' value='<?php echo $fser;?>'> 
<input type='hidden' name='emfr' value='<?php echo $emfr;?>'>
<input type='hidden' name='emod' value='<?php echo $emod;?>'>
<input type='hidden' name='eser' value='<?php echo $eser;?>'>

Is this the correct equipment information to update?<br>

<input type='submit' value='Yes' name='yes'>
<button onclick=history.go(-1)>No, go back</button>
<input type='button' value='Cancel' onclick="goHome()"/>

<script type="text/javascript" language="JavaScript">
	function goHome() {
		window.location = 'http://localhost/databases.php';
	}
</script>

</body>
</html>