<?php

echo "<h1>Add New Supplier</h1>";

?>

<!DOCTYPE HTML>
<html>  
<body>

<form action="addsupp2.php" method="post">
Name: <input type="text" name="name"><br>
Address: <input type="text" name="address"><br>
CSZ: <input type="text" name="city"> <input type="text" name="state"> <input type="text" name="zip"><br>
Phone (FORMAT -- "xxx-xxx-xxxx"): <input type="text" name="phone"><br>
Fax (FORMAT -- "xxx-xxx-xxxx"): <input type="text" name="fax"><br>
Website: <input type="text" name="website"><br>
Email: <input type="text" name="email"><br>

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