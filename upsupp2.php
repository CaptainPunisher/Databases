<?php
require_once ('dbindex.php'); echo '<br><br><br>';

if(isset($_POST['name'])){
	echo 'Name string entered: ',($name = trim(strtoupper($_POST['name']))),'<br>';

	
	$people = $db->prepare("SELECT ID, name, address, city, state, zip, phone, fax, website, email FROM supplier WHERE name LIKE '%$name%'"); 
	
	@$people->bind_param("s", $name);
	
	$people->execute();
	
	$people->bind_result($ID, $name, $address, $city, $state, $zip, $phone, $phone2, $website, $email);
	echo '<br><hr><hr>';
	while($people->fetch()){
		echo '<br>ID: ', $ID,
			'<br>Name: ', $name,
			'<br>Address: ', $address, 
			'<br>CSZ: ', $city, ', ', $state, ' ', $zip, 
			'<br>Phone: ', $phone, ' ----- Fax: ', $phone2,
			'<br>Website: ', $website, ' ----- Email: ', $email, '<br>';
	}
	
	echo "<br><hr><br>
			Enter the ID of the supplier you would like to update<br>";
	
}
?>

<!DOCTYPE HTML>
<html>
<body>
<form action="upsupp3.php" method="post">
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

