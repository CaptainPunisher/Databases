<?php

echo "<h1>Add New Part</h1>";

?>

<!DOCTYPE HTML>
<html>  
<body>

<form action="addpart2.php" method="post">
Manufacturer: <input type="text" name="mfgr"><br>
Part Number: <input type="text" name="part_no"><br>
Description: <input type="text" name="description"><br>
Superceded By: <input type="text" name="superceded_by"><br>
Price: <input type="text" name="price"><br>
F: <input type="text" name="f"><br>
SKU: <input type="text" name="sku"><br>

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