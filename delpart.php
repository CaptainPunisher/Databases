<?php
require_once ('dbindex.php'); 
echo '<h1>Delete Existing Part</h1>';

echo "<br><br><h3>Which part would you like to delete?</h3>";
echo "<font color='red'>Please enter a part number string to search<br>Leave blank to show all</font><br><br>";




?>

<!DOCTYPE HTML>
<html>  
<body>

<form action="delpart2.php" method="post">
<!--Manufacturer: 	<input type="text" name="mfgr"><br> -->
Part Number: 	<input type="text" name="part_no"><br>


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