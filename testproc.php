<html>
<head>
<title>Invoice</title>
</head>

<body>



<?php 

require_once ('dbindex.php'); 
echo '<h1>Invoice Preview</h1><hr><hr>';

//if(isset($_POST['invNo'])){
	($invNo = 33); //trim(strtoupper($_POST['invNo'])));

//if (!($stmt = $db->prepare("CALL saySaying()"))) {	///This line works
//if (!($stmt = $db->prepare("CALL returnCustInfo(33)"))) { //This line works for 33


// PRINT CUST INFO
if (!($stmt = $db->prepare("CALL returnCustInfo($invNo)"))) { 
    echo "Prepare failed: (" . $db->errno . ") " . $db->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

do {	
	
    if (!$stmt->bind_result($name, $cAdd, $cCity, $cState, $cZip, $cPhone, $cPhone2)) {
        echo "Bind failed: (" . $stmt->errno . ") " . $stmt->error;
    }
 
    while ($stmt->fetch()) {
        echo "<div class='custEqInfo'>
			name = $name <br>
			address = $cAdd<br>
			CSZ = $cCity,  $cState $cZip<br>
			Phone: $cPhone    Work: $cPhone2<br>";
    }
} while ($stmt->more_results() && $stmt->next_result());


// PRINT EQUIPMENT DESCRIPTION
if (!($stmt = $db->prepare("CALL returnEqDesc($invNo)"))) { 
    echo "Prepare failed: (" . $db->errno . ") " . $db->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

do {	
	
    if (!$stmt->bind_result($eqDesc)) {
        echo "Bind failed: (" . $stmt->errno . ") " . $stmt->error;
    }
 
    while ($stmt->fetch()) {
        echo "Eq Desc = $eqDesc 
		</div>";
    }
} while ($stmt->more_results() && $stmt->next_result());



// PRINT invoice INFO // date and invNo
if (!($stmt = $db->prepare("CALL returnDate($invNo)"))) { 
    echo "Prepare failed: (" . $db->errno . ") " . $db->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

do {	
	
    if (!$stmt->bind_result($date, $invoiceNumber)) {
        echo "Bind failed: (" . $stmt->errno . ") " . $stmt->error;
    }
 
    while ($stmt->fetch()) {
        echo "<div class='dateAndInvNo'>
			Date = $date <br>
			invNo = $invNo <br>
			invoiceNumber = $invoiceNumber
			</div>";
    }
} while ($stmt->more_results() && $stmt->next_result());



// PRINT REPAIR INFO
if (!($stmt = $db->prepare("CALL returnRepInfo($invNo)"))) { 
    echo "Prepare failed: (" . $db->errno . ") " . $db->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

do {	
	
    if (!$stmt->bind_result($rDesc, $rPrice, $rInit, $rQty, $rSubLine)) {
        echo "Bind failed: (" . $stmt->errno . ") " . $stmt->error;
    }
 
    while ($stmt->fetch()) {
        echo "<div class='laborParts'>
			Repair = $rDesc		rInit = $rInit 		rPrice = $rPrice		rQty = $rQty		rSubLine = $rSubLine<br>";
    }
} while ($stmt->more_results() && $stmt->next_result());


// PRINT parts INFO
if (!($stmt = $db->prepare("CALL returnPartsInfo($invNo)"))) { 
    echo "Prepare failed: (" . $db->errno . ") " . $db->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

do {	
	
    if (!$stmt->bind_result($pStock, $pDesc, $pPrice, $pQty, $pSubLine)) {
        echo "Bind failed: (" . $stmt->errno . ") " . $stmt->error;
    }
 
    while ($stmt->fetch()) {
        echo "Part No = $pStock pDesc = $pDesc pPrice = $pPrice pQty = $pQty pSubLine = $pSubLine<br>
		</div>";
    }
} while ($stmt->more_results() && $stmt->next_result());



// PRINT totals INFO
if (!($stmt = $db->prepare("CALL returnTotals($invNo)"))) { 
    echo "Prepare failed: (" . $db->errno . ") " . $db->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

do {	
	
    if (!$stmt->bind_result($lSubTot, $pSubTot, $tax, $total)) {
        echo "Bind failed: (" . $stmt->errno . ") " . $stmt->error;
    }
 
    while ($stmt->fetch()) {
        echo "Parts Subtotal = $pSubTot <br>
			Labor Subtotal = $lSubTot<br>
			Tax = $tax<br>
			Total = $total<br>";
    }
} while ($stmt->more_results() && $stmt->next_result());

echo "<br><br>woolooloo<br> $invNo"
?>

</body>

</html>