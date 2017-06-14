<!DOCTYPE html>
<html>

</style>
<?php
require_once ('dbindex.php'); echo '<br><br><br>';
//inserted here, comment out next $invNo declaration
$invNo = trim(strtoupper($_POST["invNo"]));
//$invNo = 30;

echo "
<body>
<link rel=".'stylesheet'." href=".'invoice.css'.">
<div id="."container.".">
	<section id ="."memo".">
	<div class="."company-name".">
		<span>Dave's MowerShop</span>
	<div class="."right-arrow"."></div>
	</div>
	<div class="."shop-info".">
	Stuff about the company
    </div>
	<div class="."Invoice".">
	Invoice ID#:";
	echo $invNo; 
	echo "<br>
	Date:";
	if (!($stmt = $db->prepare("CALL returnDate($invNo)"))) {
    echo "Prepare failed: (" . $db->errno . ") " . $db->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

do {

    $date = null;
	$id = null;
    if (!$stmt->bind_result($date,$id)) {
        echo "Bind failed: (" . $stmt->errno . ") " . $stmt->error;
    }
 
    while ($stmt->fetch()) {
        echo "$date <br>";
    }
} while ($stmt->more_results() && $stmt->next_result());
	echo "
	</div>
	<br><br>
	";
	
	echo "
	<div class="."cust-info".">
	Customer Info <br>
   ";
   if (!($stmt = $db->prepare("CALL returnCustInfo($invNo)"))) {
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
	$cPhone2 = null;
	
    if (!$stmt->bind_result($name, $id_out, $cCity, $cState, $cZip, $cPhone, $cPhone2)) {
        echo "Bind failed: (" . $stmt->errno . ") " . $stmt->error;
    }
 
    while ($stmt->fetch()) {
        echo "name = $name <br>
			address = $id_out<br>
			CSZ = $cCity,  $cState $cZip<br>
			Phone: $cPhone    Work: $cPhone2<br>";
    }
} while ($stmt->more_results() && $stmt->next_result());
   echo "<br>Equipment Description<br>";
	if (!($stmt = $db->prepare("CALL ret_eq_desc($invNo)"))) {
    echo "Prepare failed: (" . $db->errno . ") " . $db->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

do {

    $description = null;
	
    if (!$stmt->bind_result($description)) {
        echo "Bind failed: (" . $stmt->errno . ") " . $stmt->error;
    }
 
    while ($stmt->fetch()) {
        echo " $description <br>";
    }
} while ($stmt->more_results() && $stmt->next_result());

	echo "
	</div>
	</section>
	<section id="."items".">
        
        <table>
        
          <tr>
            <th>Item #</th> 
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
          </tr>
          <tr data-iterate="."item".">
            <td>";
			if (!($stmt = $db->prepare("CALL returnRepInfo($invNo)"))) {
    echo "Prepare failed: (" . $db->errno . ") " . $db->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

do {

    $description = null;
	$price = null;
	$initials = null;
	$qty = null;
	$lsub = null;
	
    if (!$stmt->bind_result($description,$price,$initials,$qty,$lsub)) {
        echo "Bind failed: (" . $stmt->errno . ") " . $stmt->error;
    }
 
    while ($stmt->fetch()) {
        echo "$initials <br>
		";
    }
} while ($stmt->more_results() && $stmt->next_result());
			echo "</td>
            <td>";
			if (!($stmt = $db->prepare("CALL returnRepInfo($invNo)"))) {
    echo "Prepare failed: (" . $db->errno . ") " . $db->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

do {

    $description = null;
	$price = null;
	$initials = null;
	$qty = null;
	$lsub = null;
	
    if (!$stmt->bind_result($description,$price,$initials,$qty,$lsub)) {
        echo "Bind failed: (" . $stmt->errno . ") " . $stmt->error;
    }
 
    while ($stmt->fetch()) {
        echo "$description<br>";
    }
} while ($stmt->more_results() && $stmt->next_result());
			echo "</td>
            <td>";
			if (!($stmt = $db->prepare("CALL returnRepInfo($invNo)"))) {
    echo "Prepare failed: (" . $db->errno . ") " . $db->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

do {

    $description = null;
	$price = null;
	$initials = null;
	$qty = null;
	$lsub = null;
	
    if (!$stmt->bind_result($description,$price,$initials,$qty,$lsub)) {
        echo "Bind failed: (" . $stmt->errno . ") " . $stmt->error;
    }
 
    while ($stmt->fetch()) {
        echo "$ $price <br>";
    }
} while ($stmt->more_results() && $stmt->next_result());
			echo "</td>
            <td>";
			if (!($stmt = $db->prepare("CALL returnRepInfo($invNo)"))) {
    echo "Prepare failed: (" . $db->errno . ") " . $db->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

do {

    $description = null;
	$price = null;
	$initials = null;
	$qty = null;
	$lsub = null;
	
    if (!$stmt->bind_result($description,$price,$initials,$qty,$lsub)) {
        echo "Bind failed: (" . $stmt->errno . ") " . $stmt->error;
    }
 
    while ($stmt->fetch()) {
        echo "$qty <br>";
    }
} while ($stmt->more_results() && $stmt->next_result());
			echo "</td>
			<td>";
			if (!($stmt = $db->prepare("CALL returnRepInfo($invNo)"))) {
    echo "Prepare failed: (" . $db->errno . ") " . $db->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

do {

    $description = null;
	$price = null;
	$initials = null;
	$qty = null;
	$lsub = null;
	
    if (!$stmt->bind_result($description,$price,$initials,$qty,$lsub)) {
        echo "Bind failed: (" . $stmt->errno . ") " . $stmt->error;
    }
 
    while ($stmt->fetch()) {
        echo "$lsub";
    }
} while ($stmt->more_results() && $stmt->next_result());
			echo "
          </tr>
        
          <tr>
            <td>";
			if (!($stmt = $db->prepare("CALL returnPartsInfo($invNo)"))) {
    echo "Prepare failed: (" . $db->errno . ") " . $db->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

do {

    $stock = null;
	$description = null;
	$price = null;
	$qty = null;
	$psub = null;
	
    if (!$stmt->bind_result($stock,$description,$price,$qty,$psub)) {
        echo "Bind failed: (" . $stmt->errno . ") " . $stmt->error;
    }
 
    while ($stmt->fetch()) {
        echo "$stock<br>
		<br>";
    }
} while ($stmt->more_results() && $stmt->next_result());
			echo "</td> 
            <td>";
			if (!($stmt = $db->prepare("CALL returnPartsInfo($invNo)"))) {
    echo "Prepare failed: (" . $db->errno . ") " . $db->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

do {

    $stock = null;
	$description = null;
	$price = null;
	$qty = null;
	$psub = null;
	
    if (!$stmt->bind_result($stock,$description,$price,$qty,$psub)) {
        echo "Bind failed: (" . $stmt->errno . ") " . $stmt->error;
    }
 
    while ($stmt->fetch()) {
        echo "$description <br>
		<br>";
    }
} while ($stmt->more_results() && $stmt->next_result());
			echo "</td>
            <td>";
			if (!($stmt = $db->prepare("CALL returnPartsInfo($invNo)"))) {
    echo "Prepare failed: (" . $db->errno . ") " . $db->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

do {

    $stock = null;
	$description = null;
	$price = null;
	$qty = null;
	$psub = null;
	
    if (!$stmt->bind_result($stock,$description,$price,$qty,$psub)) {
        echo "Bind failed: (" . $stmt->errno . ") " . $stmt->error;
    }
 
    while ($stmt->fetch()) {
        echo "$price <br>
		<br>";
    }
} while ($stmt->more_results() && $stmt->next_result());
			echo "</td>
            <td>";
			if (!($stmt = $db->prepare("CALL returnPartsInfo($invNo)"))) {
    echo "Prepare failed: (" . $db->errno . ") " . $db->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

do {

    $stock = null;
	$description = null;
	$price = null;
	$qty = null;
	$psub = null;
	
    if (!$stmt->bind_result($stock,$description,$price,$qty,$psub)) {
        echo "Bind failed: (" . $stmt->errno . ") " . $stmt->error;
    }
 
    while ($stmt->fetch()) {
        echo "$qty <br>
		<br>";
    }
} while ($stmt->more_results() && $stmt->next_result());
			echo "</td>
            <td>";
			if (!($stmt = $db->prepare("CALL returnPartsInfo($invNo)"))) {
    echo "Prepare failed: (" . $db->errno . ") " . $db->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

do {

    $stock = null;
	$description = null;
	$price = null;
	$qty = null;
	$psub = null;
	
    if (!$stmt->bind_result($stock,$description,$price,$qty,$psub)) {
        echo "Bind failed: (" . $stmt->errno . ") " . $stmt->error;
    }
 
    while ($stmt->fetch()) {
        echo "$psub <br><br>";
    }
} while ($stmt->more_results() && $stmt->next_result());
			echo "</td>
          </tr>
		</table>
      </section>
	  <section id="."sums".">
      
        <table>
          <tr>
            <th>Labor Subtotal</th>
			<td>";
			if (!($stmt = $db->prepare("CALL returnTotals($invNo)"))) {
    echo "Prepare failed: (" . $db->errno . ") " . $db->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

do {

    $lsubTot = null;
	$psubTot = null;
	$taxTot = null;
	$total = null;
	$id = null;
    if (!$stmt->bind_result($id,$lsubTot,$psubTot,$taxTot,$total)) {
        echo "Bind failed: (" . $stmt->errno . ") " . $stmt->error;
    }
 
    while ($stmt->fetch()) {
        echo "$ $lsubTot <br>
		";
    }
} while ($stmt->more_results() && $stmt->next_result());
			echo "
            </td>
          </tr>
          <tr>
			<th>Parts Subtotal</th>
			<td>";
			if (!($stmt = $db->prepare("CALL returnTotals($invNo)"))) {
    echo "Prepare failed: (" . $db->errno . ") " . $db->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

do {

    $lsubTot = null;
	$psubTot = null;
	$taxTot = null;
	$total = null;
	$id = null;
    if (!$stmt->bind_result($id,$lsubTot,$psubTot,$taxTot,$total)) {
        echo "Bind failed: (" . $stmt->errno . ") " . $stmt->error;
    }
 
    while ($stmt->fetch()) {
echo "$ $psubTot";
    }
}while ($stmt->more_results() && $stmt->next_result());
			echo "</td>
          <tr data-iterate="."tax".">
            <th>tax</th>
            <td>";
			if (!($stmt = $db->prepare("CALL returnTotals($invNo)"))) {
    echo "Prepare failed: (" . $db->errno . ") " . $db->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

do {

    $lsubTot = null;
	$psubTot = null;
	$taxTot = null;
	$total = null;
	$id = null;
    if (!$stmt->bind_result($id,$lsubTot,$psubTot,$taxTot,$total)) {
        echo "Bind failed: (" . $stmt->errno . ") " . $stmt->error;
    }
 
    while ($stmt->fetch()) {
echo "$ $taxTot";
    }
}while ($stmt->more_results() && $stmt->next_result());
			echo "</td>
          </tr>
          
          <tr class="."amount-total".">
            <th>Total</th>
            <td>";
			if (!($stmt = $db->prepare("CALL returnTotals($invNo)"))) {
    echo "Prepare failed: (" . $db->errno . ") " . $db->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

do {

    $lsubTot = null;
	$psubTot = null;
	$taxTot = null;
	$total = null;
	$id = null;
    if (!$stmt->bind_result($id,$lsubTot,$psubTot,$taxTot,$total)) {
        echo "Bind failed: (" . $stmt->errno . ") " . $stmt->error;
    }
 
    while ($stmt->fetch()) {
        echo "$ $total <br>
		";
    }
} while ($stmt->more_results() && $stmt->next_result());
			echo "</td>
          </tr>
        </table>
"; 
?>
      </section>
</div>
</body>
</html>