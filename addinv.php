<?php

echo "<h1>Create Invoice</h1><br><hr><hr><br>";

?>

<!DOCTYPE HTML>
<html>  
<body>
<h3>Enter Customer Name String</h3><br>
<form action="addinv2.php" method="post">
Name: <input type="text" name="name"><br>

<input type="submit" value='SUBMIT'>
<input type='button' value='Cancel' onclick="goHome()"/>

<script type="text/javascript" language="JavaScript">
	function goHome() {
		window.location = 'http://localhost/databases.php';
	}
</script>
</form>

</body>
</html>