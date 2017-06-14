<?php
require_once ('dbindex.php'); 
echo '<h1>Delete Existing Customer</h1>';

if(isset($_POST['name'])){
	echo 'Name string entered: ',($name = trim(strtoupper($_POST['name']))),'<br>';
	
	
	$people = $db->prepare("SELECT id, name, address, city, state, zip, phone, phone2 FROM customer WHERE name LIKE '%$name%'");

	@$people->bind_param("s", $name);
	
	
	$people->execute();
	
	$people->bind_result($id, $name, $address, $city, $state, $zip, $phone, $work);

	while($people->fetch()){
		echo '<br><br>ID: ', $id, '<br>Name: ', $name, '<br>Address: ', $address,
		'<br>CSZ: ', $city, '  ', $state, '  ', $zip,
		'<br>Phone: ', $phone, '    Work: ', $work;
	}
	
	echo "<br><br><hr><hr><br>
			Enter the ID of the customer you would like to delete<br>";
	
}
?>

<!DOCTYPE HTML>
<html>
<body>
<form action="delcust3.php" method="post">
ID: <input type="text" name="ID"><br>

<input type="submit" value='SUBMIT'>
<button onclick=history.go(-1)>Go back</button>
<input type='button' value='Cancel' onclick="goHome()"/>

<script type="text/javascript" language="JavaScript">
	function goHome() {
		window.location = 'http://localhost/databases.php';
	}
</script>

</body>
</html>

