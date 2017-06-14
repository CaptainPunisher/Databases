<?php
require_once ('dbindex.php'); 
echo '<h1>Delete Existing Employee</h1>';

if(isset($_POST['name'])){
	echo 'Name string entered: ',($name = trim(strtoupper($_POST['name']))),'<br>';

	
	$people = $db->prepare("SELECT id, name, dob, address, phone, cell, initials FROM employee WHERE name LIKE '%$name%'"); 
	@$people->bind_param("s", $name);	
	
	$people->execute();
	
	$people->bind_result($id, $name, $dob, $address, $phone, $cell, $initials);
	echo '<hr>';
	while($people->fetch()){
		echo '<br>ID: ', $id, 
			'<br>Name: ', $name, 
			'<br>DOB: ', $dob, 
			'<br>Address: ', $address,
			'<br>Phone: ', $phone,
			'<br>Cell: ', $cell,
			'<br>Initials: ', $initials, '<br>';
	}
	
	echo "<br><hr><hr><br>
			Enter the ID of the employee you would like to delete<br>";
	
}
?>

<!DOCTYPE HTML>
<html>
<body>
<form action="delemp3.php" method="post">
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

