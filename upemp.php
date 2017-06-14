<?php
require_once ('dbindex.php'); echo '<h1>Update Existing Employee</h1>';

echo "<h3>Which employee would you like to update?</h3>";
echo "<font color='red'>Please enter name to search<br>Leave blank to list all</font><br><br>";




?>

<!DOCTYPE HTML>
<html>  
<body>

<form action="upemp2.php" method="post">
Name: 		<input type="text" name="name"><br>


<input type="submit" value='SUBMIT'>
<input type='button' value='Cancel' onclick="goHome()"/>

<script type="text/javascript" language="JavaScript">
	function goHome() {
		window.location = 'http://localhost/databases.php';
	}
</script>

</body>
</html>