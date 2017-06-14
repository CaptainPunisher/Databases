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
	$sql = $db->prepare("SELECT * FROM customer WHERE name LIKE ?");
//		VALUES (?)");
		
//	$sql = $db->prepare("SELECT * FROM customer WHERE name LIKE ? AND address LIKE ? AND city LIKE ? AND state LIKE ? AND ZIP LIKE ? AND phone LIKE ? AND work LIKE ?");
//		VALUES (?,?,?,?,?,?,?)");
		
	$sql->bind_param('s', $name);
//	$sql->bind_param('ssssiss', $name, $address, $city, $state, $ZIP, $phone, $work); //REMOVED SINGLE QUOTES FROM AROUND EACH VARIABLE
	
	$sql->execute();
	//$sql->bind_result($mfgr, $part_no, $description, $superceded_by, $price, $f, $sku);
	
	if($sql){//(mysqli_query($db, $sql)){
		//success
		header('Location: http://localhost/delcust3.php');
		//header('Location: http://localhost/databases.php');
		}
	else echo ":(";
		//unsuccessful
	

}



if(isset($_POST['yes'])) { 
echo $_POST['name'];
echo $_POST['address'];
echo $_POST['city'];
echo $_POST['state'];
echo $_POST['ZIP'];
echo $_POST['phone'];
echo $_POST['work'];
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