<?php
require_once ('dbindex.php'); echo '<br><br><br>';

function addcustReturn($db){
	$sql = "INSERT into customer(id, name, address, city, state, zip, phone, phone2)
		VALUES ( NULL, 'BIZ, NUNYA', '123 NOWERE PL', 'BAKERSFIELD', 'CA', '93399', '6665555444', '6662221111')";
		var_dump($sql);
		if(mysqli_query($db, $sql)){
			echo "success";
		}
else{echo ":(";}
}

addcustReturn($db);

?>