<?php 

require_once ('dbindex.php'); 
echo '<h1>Add Invoice -- INPUT PART</h1><hr><hr>';

$invNo = $_POST["invNo"];

echo '<h3>Invoice: '.$invNo.'</h3><hr><hr><br>';

if(isset($_POST['labor'])){
	echo 'Part string entered: ', ($labor = trim(strtoupper($_POST["labor"]))), '<br><hr>';

	$rep = $db->prepare("SELECT ID, stock, description, price, superceded_by 
						FROM parts 
						WHERE (stock LIKE '%$labor%')");
						//WHERE (part_no LIKE '%$labor%' OR stock LIKE '%$labor%')"); 
	@$rep->bind_param("s", $labor);
	
	$rep->execute();
	
	$rep->bind_result($ID, $stock, $description, $price, $superceded_by);
	while($rep->fetch()){
		echo '<br>ID Number: ', $ID,
			'<br>Stock #: ', $stock,
			'<br>Description: ', $description, 
			'<br>Price: $', $price, 
			'<br>Superceded By: ', $superceded_by,'<br>';
	}
	
	echo "<hr><hr><br>
			Enter the ID number of the part you would like to add.<br>";
	
}
?>

<!DOCTYPE HTML>
<html>
<body>
<form action='inputpart3.php' method='POST'>
Part ID#: <input type='text' name='labor'><input type='submit' value='Input Part' name='labor2'>
<input type='hidden' name='invNo' value='<?php echo $invNo;?>'> 
<button onclick=history.go(-1)>Go back</button>
<input type='button' value='Cancel' onclick="goHome()"/>

<script type="text/javascript" language="JavaScript">
	function goHome() {
		window.location = 'http://localhost/databases.php';
	}
</script>
</form>
</body>
</html>