<?php 

require_once ('dbindex.php'); 
echo '<h1>Add Invoice -- INPUT LABOR</h1><hr><hr>';

$invNo = trim(strtoupper($_POST["invNo"]));
$labor = trim(strtoupper($_POST["labor"]));
$qty = (int)trim(strtoupper($_POST["qty"]));
$emp = trim(strtoupper( $_POST["emp"]));
$description = trim(strtoupper($_POST["description"]));

echo '<h2>'.$qty.'x '.$description.' by '.$emp.' added to Invoice '.$invNo.'</h2><hr><hr><br>';

if(isset($_POST['emp'])){
	$empl = $db->prepare("SELECT id FROM `employee` WHERE `initials` = ?");
	
	@$empl->bind_param("s", $emp);
	
	$empl->execute();
	
	$empl->bind_result($emp_id);

	while ($empl->fetch())
		$emp_id;
}
if(isset($_POST['labor'])){

	$rep = $db->prepare("INSERT into inv_rep(inv_id, rep_id, qty, emp_id) 
						VALUES (?,?,?,?)"); 
	@$rep->bind_param("iiii", $invNo, $labor, $qty, $emp_id);
	
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
		window.location = 'http://localhost/databases.php';
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
		window.location = 'http://localhost/invoice.php'; //'http://localhost/addinv5.php';
	}
</script>
<form action='invoice.php' method='POST'> <!--  changed databases.php to invoice.php  -->
<input type='hidden' name='invNo' value='<?php echo $invNo;?>'> <!-- added this line -->
<input type='button' value='Finish Invoice' onclick="showInv()"/>

<script type="text/javascript" language="JavaScript">
	function goHome() {
		window.location = 'http://localhost/databases.php';
	}
	
	function showInv() {
		window.location = 'http://localhost/invoice.php'; //'http://localhost/addinv5.php';
	}
</script>

</form>

</form>
</body>
</html>