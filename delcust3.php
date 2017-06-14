<?php 

require_once ('dbindex.php'); 
echo '<h1>Delete Existing Cutomer</h1>';

function delcustReturn($p){
	$ID = htmlspecialchars($p['ID']);
		
	global $db;
	$sql = $db->prepare("DELETE FROM `customer` WHERE `id`= ?"); // BACKTICKS!!! NOT SINGLE QUOTES.
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
	delcustReturn($_POST);
}

if(isset($_POST['ID'])){
	echo 'ID entered: ',($ID = trim(strtoupper($_POST['ID']))),'<br>';
	
	$people = $db->prepare("SELECT name, address, city, state, zip, phone, phone2 FROM customer WHERE id=$ID"); //'%$name%'");
	@$people->bind_param("i", $ID);	
	
	$people->execute();
	
	$people->bind_result($name, $address, $city, $state, $zip, $phone, $work);
	while($people->fetch()){
		echo '<br><br>Name: ', $name, '<br>Address: ', $address,
		'<br>CSZ: ', $city, ',  ', $state, '  ', $zip,
		'<br>Phone: ', $phone, '    Work: ', $work;
	}
}


?>

<!DOCTYPE HTML>
<html>
<body>

<br><br>Is this the correct customer to delete?<br>
<form action='delcust3.php' method='POST'>

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