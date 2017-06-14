<?php 

require_once ('dbindex.php'); 
echo '<h1>Add Invoice -- INPUT LABOR</h1><hr><hr>';

$invNo = $_POST["invNo"];

echo '<h3>Invoice: '.$invNo.'</h3><hr><hr><br>';


?>

<!DOCTYPE HTML>
<html>
<body>
<form action='inputlabor2.php' method='POST'>
Enter Labor: <input type='text' name='labor'><input type='submit' value='Input Labor' name='labor2'>
<input type='hidden' name='invNo' value='<?php echo $invNo;?>'> 
</form>
</body>
</html>