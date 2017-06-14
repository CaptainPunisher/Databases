<?php
require_once ('dbindex.php'); 

echo '<h1>Add Invoice -- Customer</h1>';

echo "<h3>Which customer would you like to invoice?</h3>";

if(isset($_POST['name'])){
	echo 'Name string entered: ',($name = trim(strtoupper($_POST['name']))),'<br>';

	
	$people = $db->prepare("SELECT ID, name, address, city, state, zip, phone, phone2 FROM customer WHERE name LIKE '%$name%'"); 
	
	@$people->bind_param("s", $name);
	
	$people->execute();
	
	$people->bind_result($ID, $name, $address, $city, $state, $zip, $phone, $phone2);
	echo '<br><hr><hr>';
	while($people->fetch()){
		echo '<br>ID: ', $ID,
			'<br>Name: ', $name,
			'<br>Address: ', $address, 
			'<br>CSZ: ', $city, ', ', $state, ' ', $zip, 
			'<br>Phone: ', $phone, ' ----- Alternate PH: ', $phone2, '<br>';
	}
	
	echo "<br><hr><br>
			Enter the ID of the customer to invoice<br>";
	
}

?>

<!DOCTYPE HTML>
<html>
<body>
<form action="addinv3.php" method="post">
ID: <input type="text" name="ID"><br>


<input type="submit" value='SUBMIT'><button onclick=history.go(-1)>Go back</button>
<input type='button' value='Cancel' onclick="goHome()"/>

<script type="text/javascript" language="JavaScript">
	function goHome() {
		window.location = 'http://localhost/databases.php';
	}
</script>

</body>
</html>