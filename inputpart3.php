<?php 

require_once ('dbindex.php'); 
echo '<h1>Add Invoice -- INPUT PART</h1><hr><hr>';

$invNo = $_POST["invNo"];

echo '<h3>Invoice: '.$invNo.'</h3><hr><hr><br>';

if(isset($_POST['labor'])){
	echo 'Part ID# entered: ', ($labor = trim(strtoupper($_POST["labor"]))), '<br><hr>';

	$rep = $db->prepare("SELECT ID, stock, description, price, superceded_by 
							FROM parts 
							WHERE ID = $labor"); 
	@$rep->bind_param("s", $labor);
	
	$rep->execute();
	
	$rep->bind_result($ID, $stock, $description, $price, $superceded_by);
	while($rep->fetch()){
		echo '<br>ID Number: ', $ID,
			'<br>Stock #: ', $stock,
			'<br>Description: ', $description, 
			'<br>Price: $', $price, 
			'<br>Superceded By: ', $superceded_by, '<br><br>',
			
			'<h2>Please enter a quantity</h2>',
			'<form action="inputpart4.php" method="POST">
			<input type="text" name="qty" value="1">';
			
			
	}
	
	echo "<hr><hr><br>Is this the right part to add to invoice ", $invNo, "?<br>";
	
}
?>

<!DOCTYPE HTML>
<html>
<body>
<!--<form action='inputlabor4.php' method='POST'>-->
<!--Labor ID#: <input type='text' name='labor'><input type='submit' value='Input Labor' name='labor'>-->
<input type='hidden' name='invNo' value='<?php echo $invNo;?>'> 
<input type='hidden' name='labor' value='<?php echo $labor;?>'> 
<input type='hidden' name='stock' value='<?php echo $stock;?>'> 
<input type='hidden' name='description' value='<?php echo $description;?>'> 

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