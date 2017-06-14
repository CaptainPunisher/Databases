<?php 

require_once ('dbindex.php'); 
echo '<h1>Add Invoice -- INPUT LABOR</h1><hr><hr>';

$invNo = trim(strtoupper($_POST["invNo"]));
$labor = trim(strtoupper($_POST["labor"]));
$qty = (int)trim(strtoupper($_POST["qty"]));
$stock = trim(strtoupper( $_POST["stock"]));
$description = trim(strtoupper($_POST["description"]));

echo '<h2>'.$qty.'x '.$stock.' '.$description.' added to Invoice '.$invNo.'</h2><hr><hr><br>';

if(isset($_POST['labor'])){

	$rep = $db->prepare("INSERT into inv_part(inv_id, part_id, qty) 
						VALUES (?,?,?)"); 
	@$rep->bind_param("iii", $invNo, $labor, $qty);
	
	$rep->execute();

	
	echo "<hr><hr><h1>What would you like to do?</h1>";

}


?>

<!DOCTYPE HTML>
<html>
<body>
<form action='inputlabor.php' method='POST'>
<input type='hidden' name='invNo' value='<?php echo $invNo;?>'> 


<input type='submit' value='Add LABOR'>

<script type="text/javascript" language="JavaScript">
	function goHome() {
		window.location = 'http://localhost/invoice.php'; //databases.php';
	}
</script>

</form>
<form action='inputpart.php' method='POST'>
<input type='hidden' name='invNo' value='<?php echo $invNo;?>'> 


<input type='submit' value='Add PART'>

<script type="text/javascript" language="JavaScript">
	function goHome() {
		window.location = 'http://localhost/databases.php';
	}
	
	function showInv() {
		window.location = 'http://localhost/invoice.php'; //addinv5.php';
	}
</script>
<form action='invoice.php' method='POST'> <!-- changed databases.php to invoice.php -->
<input type='hidden' name='invNo' value='<?php echo $invNo;?>'> <!-- added this line -->
<input type='button' value='Finish Invoice' onclick="showInv()"/>

<script type="text/javascript" language="JavaScript">
	function goHome() {
		window.location = 'http://localhost/databases.php';
	}
	
	function showInv() {
		window.location = 'http://localhost/invoice.php';	//addinv5.php';
	}
</script>

</form>

</form>
</body>
</html>