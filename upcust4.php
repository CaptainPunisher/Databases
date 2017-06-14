<?php 
require_once ('dbindex.php'); 
echo '<h1>Update Existing Customer</h1>';

echo
	"Information will be changed to the following: <br><br><hr>",
	
	'<br>ID: ', ($ID = trim(strtoupper($_POST['ID']))), 
	'<br>Name: ', ($name = trim(strtoupper($_POST['name']))),
	'<br>Address: ', ($address = trim(strtoupper($_POST['address']))),
	'<br>CSZ: ', ($city = trim(strtoupper($_POST['city']))), ' ', ($state = trim(strtoupper($_POST['state']))), ' ', ($zip = trim(strtoupper($_POST['zip']))),
	'<br>Phone: ', ($phone = trim(strtoupper($_POST['phone']))), ' ----- Alternate PH: ', ($phone2 = trim(strtoupper($_POST['phone2']))),
	'<br>Active: ', ($active = trim(strtoupper($_POST['active'])));
	


function upcustReturn($p){
	$ID = trim(strtoupper(htmlspecialchars($p['ID'])));
	$name = trim(strtoupper(htmlspecialchars($p['name'])));
	$address = trim(strtoupper(htmlspecialchars($p['address'])));
	$city = trim(strtoupper(htmlspecialchars($p['city'])));
	$state = trim(strtoupper(htmlspecialchars($p['state'])));
	$zip = trim(strtoupper(htmlspecialchars($p['zip'])));
	$phone = trim(strtoupper(htmlspecialchars($p['phone'])));
	$phone2 = trim(strtoupper(htmlspecialchars($p['phone2'])));
	$active = trim(strtoupper(htmlspecialchars($p['active'])));
		
	global $db;
	
	$sql = $db->prepare("UPDATE `customer` 
							
							SET `name`=?, `address`=?, `city`=?, `state`=?, `zip`=?, `phone`=?, `phone2`=?, `active`=?
						
						WHERE `customer`.`id`= ?"); // BACKTICKS!!! NOT SINGLE QUOTES.
	$sql->bind_param('ssssisssi', $name, $address, $city, $state, $zip, $phone, $phone2, $active, $ID);
	
	$sql->execute();
	
	echo "
<form action='databases.php' method='GET'>


<input type='hidden' name='change' value='xxx'>
<input type='hidden' name='ID' value='<?php echo $ID;?>'>
<input type='hidden' name='name' value='<?php echo $name;?>'>
<input type='hidden' name='address' value='<?php echo $address;?>'>
<input type='hidden' name='city' value='<?php echo $city;?>'> 
<input type='hidden' name='state' value='<?php echo $state;?>'> 
<input type='hidden' name='zip' value='<?php echo $zip;?>'>
<input type='hidden' name='phone' value='<?php echo $phone;?>'>
<input type='hidden' name='phone2' value='<?php echo $phone2;?>'>
<input type='hidden' name='active' value='<?php echo $active;?>'>

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
echo $_POST['name'];
echo $_POST['address']; 
echo $_POST['city'];
echo $_POST['state'];
echo $_POST['zip'];
echo $_POST['phone'];
echo $_POST['phone2'];
echo $_POST['active'];

upcustReturn($_POST);
}


?>

<!DOCTYPE HTML>
<html>
<body>

<form action='upcust4.php' method='POST'>

 <br><hr><br>

<input type='hidden' name='ID' value='<?php echo $ID;?>'>
<input type='hidden' name='name' value='<?php echo $name;?>'>
<input type='hidden' name='address' value='<?php echo $address;?>'>
<input type='hidden' name='city' value='<?php echo $city;?>'> 
<input type='hidden' name='state' value='<?php echo $state;?>'> 
<input type='hidden' name='zip' value='<?php echo $zip;?>'>
<input type='hidden' name='phone' value='<?php echo $phone;?>'>
<input type='hidden' name='phone2' value='<?php echo $phone2;?>'>
<input type='hidden' name='active' value='<?php echo $active;?>'>

Is this the correct customer information to update?<br>

<input type='submit' value='Yes' name='yes'>
<button onclick=history.go(-1)>No, go back</button>
<input type='button' value='Cancel' onclick="goHome()"/>

<script type="text/javascript" language="JavaScript">
	function goHome() {
		window.location = 'http://localhost/databases.php';
	}
</script>

<!--
</form>

<form action='databases.php' method='POST'>


<input type='hidden' name='change' value='xxx'>
<input type='hidden' name='ID' value='<?php //echo $ID;?>'>
<input type='hidden' name='name' value='<?php //echo $name;?>'>
<input type='hidden' name='address' value='<?php //echo $address;?>'>
<input type='hidden' name='city' value='<?php //echo $city;?>'> 
<input type='hidden' name='state' value='<?php //echo $state;?>'> 
<input type='hidden' name='zip' value='<?php //echo $zip;?>'>
<input type='hidden' name='phone' value='<?php //echo $phone;?>'>
<input type='hidden' name='phone2' value='<?php //echo $phone2;?>'>
<input type='hidden' name='active' value='<?php //echo $active;?>'>

</form>

-->
</body>
</html>