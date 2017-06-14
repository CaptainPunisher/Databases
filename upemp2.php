<?php
require_once ('dbindex.php'); 
echo '<h1>Update Existing Employee</h1>';

if(isset($_POST['name'])){
	echo 'Employee entered: ',($name = trim(strtoupper($_POST['name']))),'<br><hr>';

	$people = $db->prepare("SELECT id, ssn, name, dob, address, city, state, zip, phone, cell, hire_date, term_date, initials FROM employee WHERE name LIKE '%$name%'"); 
	@$people->bind_param("s", $name);
	
	$people->execute();
	
	$people->bind_result($id, $ssn, $name, $dob, $address, $city, $state, $zip, $phone, $cell, $hire_date, $term_date, $initials);
	while($people->fetch()){
		echo '<br>ID: ', $id,
			'<br>SSN: ', $ssn,
			'<br>Name: ', $name, 
			'<br>DOB: ', $dob, 
			'<br>Address: ', $address,
			'<br>CSZ: ', $city, ', ', $state, ' ', $zip,
			'<br>Phone: ', $phone,
			'<br>Cell: ', $cell,
			'<br>Hire date: ', $hire_date,
			'<br>Terminated: ', $term_date,
			'<br>Initials: ', $initials, '<br>';
	}
	
	echo "<hr><hr><br>
			Enter the ID of the employee you would like to update<br>";
	
}
?>

<!DOCTYPE HTML>
<html>
<body>
<form action="upemp3.php" method="post">
ID: <input type="text" name="ID"><br>


<input type="submit" value='SUBMIT'>
<input type='button' value='Cancel' onclick="goHome()"/>

<script type="text/javascript" language="JavaScript">
	function goHome() {
		window.location = 'http://localhost/databases.php';
	}
</script>
</body>
</html>

