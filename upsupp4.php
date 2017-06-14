<?php 
require_once ('dbindex.php'); 
echo '<h1>Update Existing Supplier</h1>';

echo
	"Information will be changed to the following: <br><br><hr>",
	
	'<br>ID: ', ($ID = trim(strtoupper($_POST['ID']))), 
	'<br>Name: ', ($name = trim(strtoupper($_POST['name']))),
	'<br>Address: ', ($address = trim(strtoupper($_POST['address']))),
	'<br>CSZ: ', ($city = trim(strtoupper($_POST['city']))), ' ', ($state = trim(strtoupper($_POST['state']))), ' ', ($zip = trim(strtoupper($_POST['zip']))),
	'<br>Phone: ', ($phone = trim(strtoupper($_POST['phone']))), ' ----- Fax: ', ($phone2 = trim(strtoupper($_POST['phone2']))),
	'<br>Website: ', ($website = trim(strtoupper($_POST['website']))), ' ----- Email: ', ($email = trim(strtoupper($_POST['email'])));



function upsuppReturn($p){
	$ID = trim(strtoupper(htmlspecialchars($p['ID'])));
	$name = trim(strtoupper(htmlspecialchars($p['name'])));
	$address = trim(strtoupper(htmlspecialchars($p['address'])));
	$city = trim(strtoupper(htmlspecialchars($p['city'])));
	$state = trim(strtoupper(htmlspecialchars($p['state'])));
	$zip = trim(strtoupper(htmlspecialchars($p['zip'])));
	$phone = trim(strtoupper(htmlspecialchars($p['phone'])));
	$phone2 = trim(strtoupper(htmlspecialchars($p['phone2'])));
	$website = trim(strtoupper(htmlspecialchars($p['website'])));
	$email = trim(strtoupper(htmlspecialchars($p['email'])));
		
	global $db;
	
	$sql = $db->prepare("UPDATE `supplier` 
							
							SET `name`=?, `address`=?, `city`=?, `state`=?, `zip`=?, `phone`=?, `fax`=?, `website`=?, `email`=?
						
						WHERE `supplier`.`id`= ?"); // BACKTICKS!!! NOT SINGLE QUOTES.
	$sql->bind_param('ssssissssi', $name, $address, $city, $state, $zip, $phone, $phone2, $website, $email, $ID);
	
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
<input type='hidden' name='website' value='<?php echo $website;?>'>
<input type='hidden' name='email' value='<?php echo $email;?>'>

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
echo $_POST['website'];
echo $_POST['email'];

upsuppReturn($_POST);
}


?>

<!DOCTYPE HTML>
<html>
<body>

<form action='upsupp4.php' method='POST'>

 <br><hr><br>

<input type='hidden' name='ID' value='<?php echo $ID;?>'>
<input type='hidden' name='name' value='<?php echo $name;?>'>
<input type='hidden' name='address' value='<?php echo $address;?>'>
<input type='hidden' name='city' value='<?php echo $city;?>'> 
<input type='hidden' name='state' value='<?php echo $state;?>'> 
<input type='hidden' name='zip' value='<?php echo $zip;?>'>
<input type='hidden' name='phone' value='<?php echo $phone;?>'>
<input type='hidden' name='phone2' value='<?php echo $phone2;?>'>
<input type='hidden' name='website' value='<?php echo $website;?>'>
<input type='hidden' name='email' value='<?php echo $email;?>'>

Is this the correct supplier information to update?<br>

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