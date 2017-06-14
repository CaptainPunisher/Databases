<?php
require_once ('dbindex.php'); 
echo '<h1>Add New Employee</h1>';

function addempReturn($p){
	echo "t<br>";
	$ssn =htmlspecialchars($p['ssn']);
	$name = htmlspecialchars($p['name']);
	$dob =htmlspecialchars($p['dob']);
	$address =htmlspecialchars($p['address']);
	$city =htmlspecialchars($p['city']);	
	$state =htmlspecialchars($p['state']);	
	$zip =htmlspecialchars($p['zip']);	
	$phone =htmlspecialchars($p['phone']);	
	$cell =htmlspecialchars($p['cell']);	
	$initials =htmlspecialchars($p['initials']);	
	
	global $db;

	$sql = $db->prepare("INSERT into employee(ssn, name, dob, address, city, state, zip, phone, cell, initials)
		VALUES (?,?,?,?,?,?,?,?,?,?)");
	$sql->bind_param('ssssssisss', $ssn, $name, $dob, $address, $city, $state, $zip, $phone, $cell, $initials);
	
	$sql->execute();
	
	
	if($sql){ //(mysqli_query($db, $sql)){
		//success
		header('Location: http://localhost/databases.php');
		}
	else echo ":(";
		//unsuccessful
	
}

if(isset($_POST['yes'])) { 
echo $_POST['ssn'];
echo $_POST['name'];
echo $_POST['dob'];
echo $_POST['address'];
echo $_POST['city'];
echo $_POST['state'];
echo $_POST['zip'];
echo $_POST['phone'];
echo $_POST['cell'];
echo $_POST['initials'];
addempReturn($_POST);
}
?>

<html>
<body>

SSN: 		<?php echo $ssn=strtoupper($_POST["ssn"]); ?><br>
Name: 		<?php echo $name=strtoupper($_POST["name"]); ?><br>
DOB: 		<?php echo $dob=trim($_POST["dob"]); ?><br>
Address: 	<?php echo $address=strtoupper($_POST["address"]); ?><br>
City:		<?php echo $city=strtoupper($_POST["city"]); ?><br>
State:		<?php echo $state=strtoupper($_POST["state"]); ?><br>
ZIP:		<?php echo $zip=$_POST["zip"]; ?><br>
Phone:		<?php echo $ph=$_POST["phone"]; ?><br>
Cell PH:	<?php echo $cell=$_POST["cell"]; ?><br>
Initials:	<?php echo $initials=strtoupper($_POST["initials"]); ?><br>

<br><br>Is the above information correct?
<form action='addemp2.php' method='POST'>
<input type='submit' value='yes' name='yes'>
<input type='hidden' name='ssn' value='<?php echo $ssn;?>'>
<input type='hidden' name='name' value='<?php echo $name;?>'>
<input type='hidden' name='dob' value='<?php echo $dob;?>'>
<input type='hidden' name='address' value='<?php echo $address;?>'>
<input type='hidden' name='city' value='<?php echo $city;?>'>
<input type='hidden' name='state' value='<?php echo $state;?>'>
<input type='hidden' name='zip' value='<?php echo $zip;?>'>
<input type='hidden' name='phone' value='<?php echo $ph;?>'>
<input type='hidden' name='cell' value='<?php echo $cell;?>'>
<input type='hidden' name='initials' value='<?php echo $initials;?>'>

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
