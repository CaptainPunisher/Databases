<?php
require_once ('dbindex.php'); 

echo '<h1>Update Existing Equipment Info</h1>';

echo "<br><br><h3>Which equipment would you like to update?</h3>";
echo "<font color='red'>Please enter frame and/or engine serial string to search<br>Leave blank to list all</font><br><br>";




?>

<!DOCTYPE HTML>
<html>  
<body>

<form action="upeq2.php" method="post">
Frame Ser: 		<input type="text" name="fser"><br>
Engine Ser: 	<input type="text" name="eser"><br>


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