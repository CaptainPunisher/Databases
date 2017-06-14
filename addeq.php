<?php

echo "<h1>Add New Equipment</h1>";

?>

<!DOCTYPE HTML>
<html>  
<body>

<form action="addeq2.php" method="post">
Description: <input type="text" name="description"><br>
Frame Mfgr: <input type="text" name="fmfr"><br>
Frame Mod: <input type="text" name="fmod"><br>
Frame Ser: <input type="text" name="fser"><br>
Engine Mfgr: <input type="text" name="emfr"><br>
Engine Mod: <input type="text" name="emod"><br>
Engine Ser: <input type="text" name="eser"><br>

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