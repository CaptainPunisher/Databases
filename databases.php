<html>
<head>
	<link rel='stylesheet' type='text/css' href='dropdown.css'>
	
<?php
	require_once ('dbindex.php');
?>
	<title>Mower Shop</title>
</head>


<body>

	
<h1>Welcome to the Lawnmower Shop Database</h1>
<h4>What would you like to to?<h4>

<form action='choice.php' method='POST'>
<select name="ACTION">
	<option value="ADD">ADD</option>
	<option value="UPDATE">UPDATE</option>
	<option value="DELETE">DELETE</option>
<!--	<option value="SHOW">SHOW ALL</option>	-->
</select>
	

<select name="TABLE">
	<option value="CUSTOMER">CUSTOMER</option>
	<option value="EMPLOYEE">EMPLOYEE</option>
	<option value="EQUIPMENT">EQUIPMENT</option>
	<option value="PART">PART</option>
	<option value="SUPPLIER">SUPPLIER</option>

	<option value="INVOICE">INVOICE</option>
</select>
	
<input type='submit' value='Submit'>
	</form>

<br>
	
<?php

?>




</body>
</html>