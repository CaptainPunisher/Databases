<?php
require_once ('dbindex.php'); echo '<br><br><br>';

function addpartReturn($p){
	echo "t<br>";
	$name = htmlspecialchars($p['mfgr']);
	$address =htmlspecialchars($p['part_no']);
	$city =htmlspecialchars($p['description']);	
	$state =htmlspecialchars($p['superceded_by']);	
	$zip =htmlspecialchars($p['price']);	
	$phone =htmlspecialchars($p['f']);	
	$phone2 =htmlspecialchars($p['sku']);	
	global $db;
	$sql = $link->prepare ("INSERT into parts(mfgr, part_no, description, superceded_by, price, f, sku)
		VALUES (?,?,?,?,?,?,?)");
	$sql->bindparam("ssssdis", $mfgr, $part_no, $description, $superceded_by, $price, $f, $sku); //REMOVED SINGLE QUOTES FROM AROUND EACH VARIABLE
	
	if(mysqli_query($db, $sql)){
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
echo $_POST['superceded_by'];
echo $_POST['price'];
echo $_POST['f'];
echo $_POST['sku'];
//echo "xxxxxx";
addpartReturn($_POST);
}
?>

<html>
<body>

Manufacturer: 		<?php echo $mfgr=strtoupper($_POST["mfgr"]); ?><br>
Part Number: 		<?php echo $part_no=strtoupper($_POST["part_no"]); ?><br>
Description:		<?php echo $description=strtoupper($_POST["description"]); ?><br>
Superceded By:		<?php echo $superceded_by=strtoupper($_POST["superceded_by"]); ?><br>
Price:				<?php echo $price=$_POST["price"]; ?><br>
F:					<?php echo $f=$_POST["f"]; ?><br>
SKU:				<?php echo $sku=$_POST["sku"]; ?><br>

<br><br>Is the above information correct?
<form action='addpart2.php' method='POST'>
<input type='submit' value='yes' name='yes'>
<input type='submit' value = 'no' name='no'>
<input type='hidden' name='mfgr' value='<?php echo $mfgr;?>'>
<input type='hidden' name='part_no' value='<?php echo $part_no;?>'>
<input type='hidden' name='description' value='<?php echo $description;?>'>
<input type='hidden' name='superceded_by' value='<?php echo $superceded_by;?>'>
<input type='hidden' name='price' value='<?php echo $price;?>'>
<input type='hidden' name='f' value='<?php echo $f;?>'>
<input type='hidden' name='sku' value='<?php echo $sku;?>'>


<button onclick=history.go(-1)>No, go back</button>
<button onclick=addcustReturn()>YesYesYes</button>
</form>
</body>
</html> 
