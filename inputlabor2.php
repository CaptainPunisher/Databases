<?php 

require_once ('dbindex.php'); 
echo '<h1>Add Invoice -- INPUT LABOR</h1><hr><hr>';

$invNo = $_POST["invNo"];

echo '<h3>Invoice: '.$invNo.'</h3><hr><hr><br>';

if(isset($_POST['labor'])){
	echo 'Labor string entered: ', ($labor = trim(strtoupper($_POST["labor"]))), '<br><hr>';

	$rep = $db->prepare("SELECT repId, id, description, price FROM repair WHERE (id LIKE '%$labor%' OR description LIKE '%$labor%')"); 
	@$rep->bind_param("s", $labor);
	
	$rep->execute();
	
	$rep->bind_result($repId, $id, $description, $price);
	while($rep->fetch()){
		echo '<br>ID Number: ', $repId,
			'<br>ID Name: ', $id,
			'<br>Description: ', $description, 
			'<br>Price: $', $price, '<br>';
	}
	
	echo "<hr><hr><br>
			Enter the ID number of the labor you would like to add.<br>";
	
}
?>

<!DOCTYPE HTML>
<html>
<body>
<form action='inputlabor3.php' method='POST'>
Labor ID#: <input type='text' name='labor'><input type='submit' value='Input Labor' name='labor2'>
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