<?php 

require_once ('dbindex.php'); echo '<h1>Update Existing Supplier</h1>';

if(isset($_POST['ID'])){
	echo 'ID entered: ',($ID = trim(strtoupper($_POST['ID']))),'<br>';
	
	$people = $db->prepare("SELECT ID, name, address, city, state, zip, phone, fax, website, email FROM supplier WHERE ID=$ID");
	@$people->bind_param("i", $ID);
	
	$people->execute();
	
	$people->bind_result($ID, $name, $address, $city, $state, $zip, $phone, $phone2, $website, $email);
	while($people->fetch()){
		echo '<br><br>ID: ', $ID, 
		'<br>Name: ', $name, 
		'<br>Address: ', $address,
		'<br>CSZ: ', $city, ', ', $state, ' ', $zip,
		'<br>Phone: ', $phone, ' ----- Fax: ', $phone2,
		'<br>Website: ', $website, ' ----- Email: ', $email;
	}
}


?>

<!DOCTYPE HTML>
<html>
<body>


<form action='upsupp4.php' method='POST'>

 <br><hr><hr><br>

<input type='hidden' name='ID' value='<?php echo $ID;?>'><br>
Name: <input type='text' name='name' value='<?php echo $name;?>'><br>
Address: <input type='text' name='address' value='<?php echo $address;?>'><br>
CSZ: <input type='text' name='city' value='<?php echo $city;?>'> <input type='text' name='state' value='<?php echo $state;?>'> <input type='text' name='zip' value='<?php echo $zip;?>'><br>
Phone: <input type='text' name='phone' value='<?php echo $phone;?>'><br>
Fax: <input type='text' name='phone2' value='<?php echo $phone2;?>'><br>
Website: <input type='text' name='website' value='<?php echo $website;?>'><br>
Email: <input type='text' name='email' value='<?php echo $email;?>'><br>

<br><br>

<br><br>Is this the correct supplier information to update?<br>

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