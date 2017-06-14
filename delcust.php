<?php
require_once ('dbindex.php'); 

echo '<h1>Delete Existing Customer</h1>';

echo "<br><br><h3>Which customer would you like to delete?</h3>";
echo "<font color='red'>Please enter name string to search<br>Leave blank to show all</font><br><br>";




?>

<!DOCTYPE HTML>
<html>  
<body>

<form action="delcust2.php" method="post">
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