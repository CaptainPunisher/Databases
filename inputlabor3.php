<?php 

require_once ('dbindex.php'); 
echo '<h1>Add Invoice -- INPUT LABOR</h1><hr><hr>';

$invNo = $_POST["invNo"];

echo '<h3>Invoice: '.$invNo.'</h3><hr><hr><br>';

if(isset($_POST['labor'])){
	echo 'Labor ID# entered: ', ($labor = trim(strtoupper($_POST["labor"]))), '<br><hr>';

	$rep = $db->prepare("SELECT repId, id, description, price FROM repair WHERE repId = $labor"); 
	@$rep->bind_param("s", $labor);
	
	$rep->execute();
	
	$rep->bind_result($repId, $id, $description, $price);
	while($rep->fetch()){
		echo '<br>ID Number: ', $repId,
			'<br>ID Name: ', $id,
			'<br>Description: ', $description, 
			'<br>Price: $', $price, '<br><br>',
			
			'<h2>Please enter a quantity</h2>',
			'<form action="inputlabor4.php" method="POST">
			<input type="text" name="qty" value="1">
			<h2>Employee initials</h2>
			<input type="text" name="emp" value="SHOP">';
			//</form>';
			
			
	}
	
	echo "<hr><hr><br>Is this the right repair to add to invoice ", $invNo, "?<br>";
	
}
?>

<!DOCTYPE HTML>
<html>
<body>
<!--<form action='inputlabor4.php' method='POST'>-->
<!--Labor ID#: <input type='text' name='labor'><input type='submit' value='Input Labor' name='labor'>-->
<input type='hidden' name='invNo' value='<?php echo $invNo;?>'> 
<input type='hidden' name='labor' value='<?php echo $labor;?>'> 
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