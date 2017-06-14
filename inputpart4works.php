<?php 

require_once ('dbindex.php'); 
echo '<h1>Add Invoice -- INPUT LABOR</h1><hr><hr>';

$invNo = trim(strtoupper($_POST["invNo"]));
$labor = trim(strtoupper($_POST["labor"]));
$qty = (int)trim(strtoupper($_POST["qty"]));
$stock = trim(strtoupper( $_POST["stock"]));
$description = trim(strtoupper($_POST["description"]));

echo '<h2>'.$qty.'x '.$stock.' '.$description.' added to Invoice '.$invNo.'</h2><hr><hr><br>';
/*
if(isset($_POST['emp'])){
	$empl = $db->prepare("SELECT id FROM `employee` WHERE `initials` = ?");
	
	@$empl->bind_param("s", $emp);
	
	$empl->execute();
	
	$empl->bind_result($emp_id);

	while ($empl->fetch())
		$emp_id;
}
*/
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
<!--<button onclick=history.go(-1)>No, go back</button>
<input type='button' value='Cancel' onclick="goHome()"/> -->

<script type="text/javascript" language="JavaScript">
	function goHome() {
		window.location = 'http://localhost/databases.php';
	}
</script>

</form>
<form action='inputpart.php' method='POST'>
<input type='hidden' name='invNo' value='<?php echo $invNo;?>'> 


<input type='submit' value='Add PART'>
<!--<button onclick=history.go(-1)>No, go back</button>
<input type='button' value='Cancel' onclick="goHome()"/> -->

<script type="text/javascript" language="JavaScript">
	function goHome() {
		window.location = 'http://localhost/databases.php';
	}
</script>
<form action='databases.php' method='POST'>
<!--<input type='hidden' name='invNo' value='<?php //echo $invNo;?>'> 


<input type='submit' value='Add LABOR'>-->
<!--<button onclick=history.go(-1)>No, go back</button> -->
<input type='button' value='Finish Invoice' onclick="goHome()"/>

<script type="text/javascript" language="JavaScript">
	function goHome() {
		window.location = 'http://localhost/databases.php';
	}
</script>

</form>

</form>
</body>
</html>