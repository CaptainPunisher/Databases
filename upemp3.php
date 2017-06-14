<?php 
require_once ('dbindex.php'); 
echo '<h1>Update Existing Employee</h1>';

if(isset($_POST['ID'])){
	echo 'ID entered: ',($ID = trim(strtoupper($_POST['ID']))),'<br>';
	
	$people = $db->prepare("SELECT id, ssn, name, dob, address, city, state, zip, phone, cell, hire_date, term_date, initials FROM employee WHERE id=$ID"); //'%$name%'");
	@$people->bind_param("i", $ID);
	
	$people->execute();
	
	$people->bind_result($ID, $ssn, $name, $dob, $address, $city, $state, $zip, $phone, $cell, $hire_date, $term_date, $initials); //$id goes to $ID
	while($people->fetch()){
		echo '<br>ID: ', $ID, //$id goes to $ID
		'<br>Name: ', $name, 
		'<br>SSN: ', $ssn, '   ----    DOB: ', $dob,
		'<br>Address: ', $address,
		'<br>CSZ: ', $city, ',  ', $state, '  ', $zip,
		'<br>Phone: ', $phone, '    Cell: ', $cell,
		'<br>Hire Date: ', $hire_date, '  ----  Terminated: ',$term_date, '<br>';
	}
}


?>

<!DOCTYPE HTML>
<html>
<body>


<form action='upemp4.php' method='POST'>

 <br><hr><hr><br>

<input type='hidden' name='ID' value='<?php echo $ID;?>'>
<input type='hidden' name='ID' value='<?php echo $ID;?>'>
SSN: <input type='text' name='ssn' value='<?php echo $ssn;?>'><br>
Name: <input type='text' name='name' value='<?php echo $name;?>'><br>
DOB (FORMAT - YYYY-MM-DD): <input type='text' name='dob' value='<?php echo $dob;?>'><br>
Address: <input type='text' name='address' value='<?php echo $address;?>'><br>
CSZ: <input type='text' name='city' value='<?php echo $city;?>'>
 <input type='text' name='state' value='<?php echo $state;?>'>
 <input type='text' name='zip' value='<?php echo $zip;?>'><br>
Phone: <input type='text' name='phone' value='<?php echo $phone;?>'>
Cell: <input type='text' name='cell' value='<?php echo $cell;?>'><br>
Hire Date: <input type='text' name='hire_date' value='<?php echo $hire_date;?>'><br>
Terminated: <input type='text' name='term_date' value='<?php echo $term_date;?>'><br>
<br><hr><br>

<br><br>Is this the correct employee information to update?<br>

<input type='submit' value='Yes' name='eyes'> <!-- Change EYES back to YES -->
<button onclick=history.go(-1)>No, go back</button>
<!--<button onclick=<?php //upempReturn($_POST);?> >YesYesYes</button> -->
<input type='button' value='Cancel' onclick="goHome()"/>

<script type="text/javascript" language="JavaScript">
	function goHome() {
		window.location = 'http://localhost/databases.php';
	}
</script>

</form>
</body>
</html>