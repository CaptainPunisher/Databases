<?php

echo "<h1>Add New Customer</h1>";

?>

<!DOCTYPE HTML>
<html>  
<body>

<form action="addcust2.php" method="post">
Name: <input type="text" name="name"><br>
Address: <input type="text" name="address"><br>
City: <input type="text" name="city" value="BAKERSFIELD"><br>
State: <input type="text" name="state" value="CA"><br>
ZIP: <input type="text" name="zip"><br>
Phone (FORMAT -- "xxx-xxx-xxxx"): <input type="text" name="phone"><br>
Work PH (FORMAT -- "xxx-xxx-xxxx"): <input type="text" name="work"><br>

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