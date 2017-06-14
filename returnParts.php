<?php 

require_once ('dbindex.php'); 
echo '<h1>Invoice Preview</h1><hr><hr>';

//if(isset($_POST['invNo'])){
	($invNo = 32); //trim(strtoupper($_POST['invNo'])));

//if (!($stmt = $db->prepare("CALL saySaying()"))) {	///This line works
//if (!($stmt = $db->prepare("CALL returnCustInfo(33)"))) { //This line works for 33
if (!($stmt = $db->prepare("CALL returnPartsInfo($invNo)"))) { 
    echo "Prepare failed: (" . $db->errno . ") " . $db->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

do {

    $id_out = NULL;
	$cCity = null;
	$cState = null;
	$cZip = null;
	$cPhone = null;
	
    if (!$stmt->bind_result($name, $id_out, $cCity, $cState, $cPhone)) {
        echo "Bind failed: (" . $stmt->errno . ") " . $stmt->error;
    }
 
    while ($stmt->fetch()) {
        echo "Part No = $name <br>
			Desc = $id_out<br>
			price = $cCity<br>
			QTY: $cState<br>
			subtot: $cPhone    <br><br>";
    }
} while ($stmt->more_results() && $stmt->next_result());
?>