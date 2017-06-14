<?php 

require_once ('dbindex.php'); 
echo '<h1>Add Invoice -- INPUT PART</h1><hr><hr>';

$invNo = $_POST["invNo"];

echo '<h3>Invoice: '.$invNo.'</h3><hr><hr><br>';


?>

<!DOCTYPE HTML>
<html>
<body>
<form action='inputpart2.php' method='POST'>
Enter Part (Number or Stock ID): <input type='text' name='labor'><input type='submit' value='Input Part' name='labor2'>
<input type='hidden' name='invNo' value='<?php echo $invNo;?>'> 
</form>
</body>
</html>