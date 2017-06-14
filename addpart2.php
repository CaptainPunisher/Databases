<?php
require_once ('dbindex.php'); 
echo '<h1>Add New Part</h1><br><hr><hr>';

function addpartReturn($p){
	echo "t<br>";
	$mfgr = htmlspecialchars($p['mfgr']);
	$part_no =htmlspecialchars($p['part_no']);
	$description =htmlspecialchars($p['description']);	
	$superceded_by =htmlspecialchars($p['superceded_by']);	
	$price =htmlspecialchars($p['price']);	
	$f =htmlspecialchars($p['f']);	
	$sku =htmlspecialchars($p['sku']);	
	global $db;
	$sql = $db->prepare("INSERT into parts(mfgr, part_no, description, superceded_by, price, f, sku)
		VALUES (?,?,?,?,?,?,?)");
	$sql->bind_param('ssssdis', $mfgr, $part_no, $description, $superceded_by, $price, $f, $sku); //REMOVED SINGLE QUOTES FROM AROUND EACH VARIABLE
	
	$sql->execute();
	//$sql->bind_result($mfgr, $part_no, $description, $superceded_by, $price, $f, $sku);
	
	if($sql){//(mysqli_query($db, $sql)){
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
SKU:				<?php echo $sku=$_POST["sku"]; ?><br><hr>

<br><br>Is the above information correct?
<form action='addpart2.php' method='POST'>
<input type='submit' value='Yes' name='yes'>
<input type='hidden' name='mfgr' value='<?php echo $mfgr;?>'>
<input type='hidden' name='part_no' value='<?php echo $part_no;?>'>
<input type='hidden' name='description' value='<?php echo $description;?>'>
<input type='hidden' name='superceded_by' value='<?php echo $superceded_by;?>'>
<input type='hidden' name='price' value='<?php echo $price;?>'>
<input type='hidden' name='f' value='<?php echo $f;?>'>
<input type='hidden' name='sku' value='<?php echo $sku;?>'>


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
