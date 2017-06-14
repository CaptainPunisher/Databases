<?php
require_once ('dbindex.php'); 
echo '<h1>Add New Equipment</h1><br><hr><hr>';

function addeqReturn($p){
	echo "t<br>";
	$description = htmlspecialchars($p['description']);
	$fmfr =htmlspecialchars($p['fmfr']);
	$fmod =htmlspecialchars($p['fmod']);	
	$fser =htmlspecialchars($p['fser']);	
	$emfr =htmlspecialchars($p['emfr']);	
	$emod =htmlspecialchars($p['emod']);	
	$eser =htmlspecialchars($p['eser']);
	
	global $db;

	$sql = $db->prepare("INSERT into equipment(description, fmfr, fmod, fser, emfr, emod, eser)
		VALUES (?,?,?,?,?,?,?)");
	$sql->bind_param('sssssss', $description, $fmfr, $fmod, $fser, $emfr, $emod, $eser);
	
	$sql->execute();
	
	
	if($sql){ //(mysqli_query($db, $sql)){
		//success
		header('Location: http://localhost/databases.php'); 
		}
	else echo ":(";
		//unsuccessful
	
	
}

if(isset($_POST['yes'])) { 
echo $_POST['description'];
echo $_POST['fmfr'];
echo $_POST['fmod'];
echo $_POST['fser'];
echo $_POST['emfr'];
echo $_POST['emod'];
echo $_POST['eser'];
echo "xxxxxx";
addeqReturn($_POST);
}
?>

<html>
<body>

Description:<?php echo $description=strtoupper($_POST["description"]); ?><br>
Frame Mfgr:	<?php echo $fmfr=strtoupper($_POST["fmfr"]); ?><br>
Frame Mod:	<?php echo $fmod=strtoupper($_POST["fmod"]); ?><br>
Frame Ser: 	<?php echo $fser=strtoupper($_POST["fser"]); ?><br>
Engine Mfgr:<?php echo $emfr=$_POST["emfr"]; ?><br>
Engine Mod: <?php echo $emod=$_POST["emod"]; ?><br>
Engine Ser:	<?php echo $eser=$_POST["eser"]; ?><br>

<br><br>Is the above information correct?
<form action='addeq2.php' method='POST'>

<input type='hidden' name='description' value='<?php echo $description;?>'>
<input type='hidden' name='fmfr' value='<?php echo $fmfr;?>'>
<input type='hidden' name='fmod' value='<?php echo $fmod;?>'>
<input type='hidden' name='fser' value='<?php echo $fser;?>'>
<input type='hidden' name='emfr' value='<?php echo $emfr;?>'>
<input type='hidden' name='emod' value='<?php echo $emod;?>'>
<input type='hidden' name='eser' value='<?php echo $eser;?>'>

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
