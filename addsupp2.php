<?php
require_once ('dbindex.php'); 
echo '<h1>Add New Supplier</h1><br><hr><hr>';

function addsuppReturn($p){
	echo "t<br>";
	$name = htmlspecialchars($p['name']);
	$address =htmlspecialchars($p['address']);
	$city =htmlspecialchars($p['city']);	
	$state =htmlspecialchars($p['state']);	
	$zip =htmlspecialchars($p['zip']);	
	$phone =htmlspecialchars($p['phone']);	
	$phone2 =htmlspecialchars($p['fax']);	
	$website =htmlspecialchars($p['website']);	
	$email =htmlspecialchars($p['email']);	
	
	global $db;

	$sql = $db->prepare("INSERT into supplier(name, address, city, state, zip, phone, fax, website, email)
		VALUES (?,?,?,?,?,?,?,?,?)");
	$sql->bind_param('ssssissss', $name, $address, $city, $state, $zip, $phone, $phone2, $website, $email);
	
	$sql->execute();
	
	
	if($sql){ //(mysqli_query($db, $sql)){
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
echo $_POST['fax'];
echo $_POST['website'];
echo $_POST['email'];
echo "xxxxxx";
addsuppReturn($_POST);
}
?>

<html>
<body>

Name: 		<?php echo $name=strtoupper($_POST["name"]); ?><br>
Address: 	<?php echo $address=strtoupper($_POST["address"]); ?><br>
City:		<?php echo $city=strtoupper($_POST["city"]); ?><br>
State:		<?php echo $state=strtoupper($_POST["state"]); ?><br>
ZIP:		<?php echo $zip=$_POST["zip"]; ?><br>
Phone:		<?php echo $ph=$_POST["phone"]; ?><br>
Work PH:	<?php echo $wk=$_POST["fax"]; ?><br>
Website:	<?php echo $website=$_POST["website"]; ?><br>
Email:		<?php echo $email=$_POST["email"]; ?><br>

<br><br>Is the above information correct?
<form action='addsupp2.php' method='POST'>

<input type='hidden' name='name' value='<?php echo $name;?>'>
<input type='hidden' name='address' value='<?php echo $address;?>'>
<input type='hidden' name='city' value='<?php echo $city;?>'>
<input type='hidden' name='state' value='<?php echo $state;?>'>
<input type='hidden' name='zip' value='<?php echo $zip;?>'>
<input type='hidden' name='phone' value='<?php echo $ph;?>'>
<input type='hidden' name='fax' value='<?php echo $wk;?>'>
<input type='hidden' name='website' value='<?php echo $website;?>'>
<input type='hidden' name='email' value='<?php echo $email;?>'>

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
