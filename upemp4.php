<?php 
require_once ('dbindex.php'); 
echo '<h1>Update Existing Employee</h1>';

echo
	"Information will be changed to the following: <br><br><hr>",
	
	'<br><br>ID: ', ($ID = trim(strtoupper($_POST['ID']))), 
	'<br>Name: ', ($name = trim(strtoupper($_POST['name']))),
	'<br>SSN: ', ($ssn = trim(strtoupper($_POST['ssn']))), '   ----    DOB: ', ($dob = trim(strtoupper($_POST['dob']))),
	'<br>Address: ', ($address = trim(strtoupper($_POST['address']))),
	'<br>CSZ: ', ($city = trim(strtoupper($_POST['city']))), "  ",	($state = trim(strtoupper($_POST['state']))), "  ",	($zip = trim(strtoupper($_POST['zip']))),
	'<br>Phone: ', ($phone = trim(strtoupper($_POST['phone']))), '    Cell: ', ($cell = trim(strtoupper($_POST['cell']))),
	'<br>Hire Date: ', ($hire_date = trim(strtoupper($_POST['hire_date']))), '  ----  Terminated: ', ($term_date = trim(strtoupper($_POST['term_date']))), '<br>';

function upempReturn($p){
	echo "t<br>";
	$ID = htmlspecialchars($p['ID']);
	$name = htmlspecialchars($p['name']);
	$ssn = htmlspecialchars($p['ssn']);
	$address = htmlspecialchars($p['address']);
	$dob = htmlspecialchars($p['dob']);
	$city = htmlspecialchars($p['city']);
	$state = htmlspecialchars($p['state']);
	$zip = htmlspecialchars($p['zip']);
	$phone = htmlspecialchars($p['phone']);
	$cell = htmlspecialchars($p['cell']);
	$hire_date = htmlspecialchars($p['hire_date']);
	$term_date = htmlspecialchars($p['term_date']);
		
	global $db;
	
	$sql = $db->prepare("UPDATE `employee` 
							
							SET `name`=?, `ssn`=?, `address`=?, `dob`=?, `city`=?, `state`=?, `zip`=?, 
							`phone`=?, `cell`=?, `hire_date`=?, `term_date`=?
						
						WHERE `employee`.`id`= ?"); // BACKTICKS!!! NOT SINGLE QUOTES.
	$sql->bind_param('ssssssissssi', $name, $ssn, $address, $dob, $city, $state, $zip, $phone, $cell, $hire_date, $term_date, $ID);
	
	$sql->execute();
	
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
echo $_POST['ssn']; 
echo $_POST['address'];
echo $_POST['dob'];
echo $_POST['city'];
echo $_POST['state'];
echo $_POST['zip'];
echo $_POST['phone'];
echo $_POST['cell'];
echo $_POST['hire_date'];
echo $_POST['term_date'];
echo "xxxxxx";
upempReturn($_POST);
}

/*
echo
	"Information will be changed to the following: <br><br><hr>",
	
	'<br><br>',
	
	'<br><br>ID: ', ($id = trim(strtoupper($_POST['ID']))), 
	'<br>Name: ', ($name = trim(strtoupper($_POST['name']))),
	'<br>SSN: ', ($ssn = trim(strtoupper($_POST['ssn']))), '   ----    DOB: ', ($dob = trim(strtoupper($_POST['dob']))),
	'<br>Address: ', ($address = trim(strtoupper($_POST['address']))),
	'<br>CSZ: ', ($city = trim(strtoupper($_POST['city']))), "  ",	($state = trim(strtoupper($_POST['state']))), "  ",	($zip = trim(strtoupper($_POST['zip']))),
	'<br>Phone: ', ($phone = trim(strtoupper($_POST['phone']))), '    Cell: ', ($cell = trim(strtoupper($_POST['cell']))),
	'<br>Hire Date: ', ($hire_date = trim(strtoupper($_POST['hire_date']))), '  ----  Terminated: ', ($term_date = trim(strtoupper($_POST['term_date'])));
	*/

?>

<!DOCTYPE HTML>
<html>
<body>


<form action='upemp4.php' method='POST'>

 <br><hr><hr>

 
<input type='hidden' name='ID' value='<?php echo $ID;?>'>
<input type='hidden' name='ssn' value='<?php echo $ssn;?>'>
<input type='hidden' name='name' value='<?php echo $name;?>'>
<input type='hidden' name='dob' value='<?php echo $dob;?>'>
<input type='hidden' name='address' value='<?php echo $address;?>'>
<input type='hidden' name='city' value='<?php echo $city;?>'>
<input type='hidden' name='state' value='<?php echo $state;?>'>
<input type='hidden' name='zip' value='<?php echo $zip;?>'><br>
<input type='hidden' name='phone' value='<?php echo $phone;?>'>
<input type='hidden' name='cell' value='<?php echo $cell;?>'>
<input type='hidden' name='hire_date' value='<?php echo $hire_date;?>'>
<input type='hidden' name='term_date' value='<?php echo $term_date;?>'>


Is this the correct employee information to update?<br>

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