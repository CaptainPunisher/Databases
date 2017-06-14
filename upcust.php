<?php
require_once ('dbindex.php'); 

echo '<h1>Update Existing Customer Info</h1>';

echo "<br><br><h3>Which customer would you like to update?</h3>";
echo "<font color='red'>Please enter customer name string to search<br>Leave blank to list all</font><br><br>";




?>

<!DOCTYPE HTML>
<html>  
<body>

<form action="upcust2.php" method="post">
Name: 		<input type="text" name="name"><br>


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