<?php 
require_once ('dbindex.php'); 
echo '<h1>Update Existing Part</h1>';

echo
	"Information will be changed to the following: <br><br><hr>",
	
	'<br><br>ID: ', ($ID = trim(strtoupper($_POST['ID']))), 
	'<br>MFGR Part No.: ', ($mfgr = trim(strtoupper($_POST['mfgr']))), ' ', ($part_no = trim(strtoupper($_POST['part_no']))),
	'<br>Description: ', ($description = trim(strtoupper($_POST['description']))),
	'<br>Price: ', ($price = trim(strtoupper($_POST['price']))),
	'<br>Superceded by: ', ($superceded_by = trim(strtoupper($_POST['superceded_by']))),
	'<br>SKU: ', ($sku = trim(strtoupper($_POST['sku'])));
	


function uppartReturn($p){
	echo "t<br>";
	$ID = htmlspecialchars($p['ID']);
	$description = htmlspecialchars($p['description']);
	$price = htmlspecialchars($p['price']);
	$superceded_by = htmlspecialchars($p['superceded_by']);
		
	global $db;
	
	$sql = $db->prepare("UPDATE `parts` 
							
							SET `description`=?, `price`=?, `superceded_by`=?
						
						WHERE `parts`.`ID`= ?"); // BACKTICKS!!! NOT SINGLE QUOTES.
	$sql->bind_param('sdsi', $description, $price, $superceded_by, $ID);
	
	$sql->execute();
	
	if($sql){
		//success
		header('Location: http://localhost/databases.php');
		}
	else echo ":(";
		//unsuccessful
	
}

if(isset($_POST['yes'])) { 
echo $_POST['mfgr'];
echo $_POST['part_no']; 
echo $_POST['description'];
echo $_POST['price'];
echo $_POST['ID'];
echo $_POST['superceded_by'];
echo $_POST['sku'];
uppartReturn($_POST);
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


<form action='uppart4.php' method='POST'>

 <br><hr><hr><br>

 <!--COMMENTING OUT ALL PHP
<input type='hidden' name='ID' value='<?php //echo $ID;?>'><br>
MFGR Part No.: <input type='text' name='mfgr' value='<?php// echo $mfgr;?>'><input type='text' name='part_no' value='<?php// echo $part_no;?>'><br>
Description: <input type='text' name='description' value='<?php// echo $description;?>'><br>
Price: <input type='text' name='price' value='<?php// echo $price;?>'><br>
Superceded by: <input type='text' name='superceded_by' value='<?php// echo $superceded_by;?>'><br>
SKU: <input type='text' name='sku' value='<?php// echo $sku;?>'>
<br><br>
-->

<input type='hidden' name='ID' value='<?php echo $ID;?>'>
<input type='hidden' name='mfgr' value='<?php echo $mfgr;?>'>
<input type='hidden' name='part_no' value='<?php echo $part_no;?>'>
<input type='hidden' name='sku' value='<?php echo $sku;?>'>
<input type='hidden' name='description' value='<?php echo $description;?>'>
<input type='hidden' name='price' value='<?php echo $price;?>'>
<input type='hidden' name='superceded_by' value='<?php echo $superceded_by;?>'><br>


<br><br>Is this the correct part information to update?<br>

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