<?php

echo "<h1>Add New Employee</h1>";

?>

<!DOCTYPE HTML>
<html>  
<body>

<form action="addemp2.php" method="post">
SSN (FORMAT -- "xxx-xx-xxxx"): <input type="text" name="ssn"><br>
Name: <input type="text" name="name"><br>
DOB (FORMAT -- "YYYY-MM-DD") : <input type="text" name="dob"><br>
Address: <input type="text" name="address"><br>
City: <input type="text" name="city" value="BAKERSFIELD"><br>
State: <input type="text" name="state" value="CA"><br>
ZIP: <input type="text" name="zip"><br>
Phone (FORMAT -- "xxx-xxx-xxxx"): <input type="text" name="phone"><br>
Cell (FORMAT -- "xxx-xxx-xxxx"): <input type="text" name="cell"><br>
Initials: <input type="text" name="initials"><br>

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