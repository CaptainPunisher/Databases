<?php
require_once ('dbindex.php'); echo '<br><br><br>';

function addcustReturn($p){
	echo "t<br>";
	$name = htmlspecialchars($p['name']);
	$address =htmlspecialchars($p['address']);
	$city =htmlspecialchars($p['city']);	
	$state =htmlspecialchars($p['state']);	
	$zip =htmlspecialchars($p['ZIP']);	
	$phone =htmlspecialchars($p['phone']);	
	$phone2 =htmlspecialchars($p['work']);	
	global $db;
	$sql = "INSERT into customer(name, address, city, state, zip, phone, phone2)
		VALUES ('".$name."', '".$address."', '".$city."', '".$state."', ".$zip.", '".$phone."', '".$phone2."')"; //REMOVED SINGLE QUOTES FROM AROUND EACH VARIABLE
	if(mysqli_query($db, $sql)){
		//success
		header('Location: http://localhost/databases.php');
		}
	else echo ":(";
		//unsuccessful
	
}

if(isset($_POST['yes'])) { 
echo $_POST['name'];
echo $_POST['address'];
echo $_POST['city'];
echo $_POST['state'];
echo $_POST['zip'];
echo $_POST['phone'];
echo $_POST['work'];
//echo "xxxxxx";
addcustReturn($_POST);
}
?>

<html>
<body>

Name: 		<?php echo $name=strtoupper($_POST["name"]); ?><br>
Address: 	<?php echo $address=strtoupper($_POST["address"]); ?><br>
City:		<?php echo $city=strtoupper($_POST["city"]); ?><br>
State:		<?php echo $state=strtoupper($_POST["state"]); ?><br>
ZIP:		<?php echo $zip=$_POST["ZIP"]; ?><br>
Phone:		<?php echo $ph=$_POST["phone"]; ?><br>
Work PH:	<?php echo $wk=$_POST["work"]; ?><br>

<br><br>Is the above information correct?
<form action='addcust2.php' method='POST'>
<input type='submit' value='yes' name='yes'>
<input type='submit' value = 'no' name='no'>
<input type='hidden' name='name' value='<?php echo $name;?>'>
<input type='hidden' name='address' value='<?php echo $address;?>'>
<input type='hidden' name='city' value='<?php echo $city;?>'>
<input type='hidden' name='state' value='<?php echo $state;?>'>
<input type='hidden' name='ZIP' value='<?php echo $zip;?>'>
<input type='hidden' name='phone' value='<?php echo $ph;?>'>
<input type='hidden' name='work' value='<?php echo $wk;?>'>


<button onclick=history.go(-1)>No, go back</button>
<button onclick=addcustReturn()>YesYesYes</button>
</form>
</body>
</html> 
