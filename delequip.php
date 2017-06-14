<?php
require_once ('dbindex.php'); echo '<br><br><br>';

echo "<br><br><h3>Which equipment would you like to delete?</h3>";
echo "<font color='red'>Please enter string to search</font><br><br>";




?>

<!DOCTYPE HTML>
<html>  
<body>

<form action="delequip2.php" method="post">
Name: 		<input type="text" name="equip"><br>


<input type="submit" value='SUBMIT'>
</form>

</body>
</html>