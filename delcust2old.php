<?php
require_once ('dbindex.php'); echo '<br><br><br>';

function showCust($p){
	echo "t<br>";
	$name = htmlspecialchars($p['name']);
	$address =htmlspecialchars($p['address']);
	$city =htmlspecialchars($p['city']);	
	$state =htmlspecialchars($p['state']);	
	$ZIP =htmlspecialchars($p['ZIP']);	
	$phone =htmlspecialchars($p['phone']);	
	$work =htmlspecialchars($p['work']);	
	global $db;
	$sql = "SELECT * FROM customer WHERE";
//		VALUES (?)");
		
//	$sql = 

	if(mysqli_query($db, $sql)){
		//success
		header('Location: http://localhost/delcust3.php');
		//header('Location: http://localhost/databases.php');
		}
	else echo ":(";
		//unsuccessful
	

}



{
	
if(isset($_POST['name'])) $sql.=" name LIKE $name";
if(isset($_POST['address'])){
	if(isset($_POST['name'])) $sql .= " AND";
	$sql .= " address LIKE $address";
}
if(isset($_POST['city'])){
	if(isset($_POST['name']) or isset($_POST['address'])) $sql .= " AND";
	$sql .= " address LIKE $address";
}
if(isset($_POST['state'])){
	if(isset($_POST['name']) or isset($_POST['address']) or isset($_POST['city'])) $sql .= " AND";
	$sql .= " address LIKE $address";
}
if(isset($_POST['ZIP'])){
	if(isset($_POST['name']) or isset($_POST['address']) or isset($_POST['city']) or isset($_POST['state'])) $sql .= " AND";
	$sql .= " address LIKE $address";
}
if(isset($_POST['phone'])){
	if(isset($_POST['name']) or isset($_POST['address']) or isset($_POST['city']) or isset($_POST['state']) or isset($_POST['ZIP'])) $sql .= " AND";
	$sql .= " address LIKE $address";
}
if(isset($_POST['work'])){
	if(isset($_POST['name']) or isset($_POST['address']) or isset($_POST['city']) or isset($_POST['state']) or isset($_POST['ZIP']) or isset($_POST['phone'])) $sql .= " AND";
	$sql .= " address LIKE $address";
}
//echo "xxxxxx";
showCust($_POST);
}
?>

<html>
<body>

Manufacturer: 		<?php echo $name=strtoupper($_POST["name"]); ?><br>
Part Number: 		<?php echo $address=strtoupper($_POST["address"]); ?><br>
Description:		<?php echo $city=strtoupper($_POST["city"]); ?><br>
Superceded By:		<?php echo $state=strtoupper($_POST["state"]); ?><br>
Price:				<?php echo $ZIP=$_POST["ZIP"]; ?><br>
F:					<?php echo $phone=$_POST["phone"]; ?><br>
SKU:				<?php echo $work=$_POST["work"]; ?><br>

<br><br>Is the above information correct?
<form action='delcust2.php' method='POST'>
<input type='submit' value='yes' name='yes'>
<input type='submit' value = 'no' name='no'>
<input type='hidden' name='name' value='<?php echo $name;?>'>
<input type='hidden' name='address' value='<?php echo $address;?>'>
<input type='hidden' name='city' value='<?php echo $city;?>'>
<input type='hidden' name='state' value='<?php echo $state;?>'>
<input type='hidden' name='ZIP' value='<?php echo $ZIP;?>'>
<input type='hidden' name='phone' value='<?php echo $phone;?>'>
<input type='hidden' name='work' value='<?php echo $work;?>'>


<button onclick=history.go(-1)>No, go back</button>
<button onclick=addcustReturn()>YesYesYes</button>
</form>
</body>
</html> 