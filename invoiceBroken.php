<!DOCTYPE html>
<html>

</style>
<?php
require_once ('dbindex.php'); echo '<br><br><br>';
//$invNo = 30;
$invNo = trim(strtoupper($_POST["invNo"]));
$psub1=null;
$tax1=null;
$lsub1=null;
echo 'Invoice Number: '.$invNo.'<br><br>';
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
        echo "$name <br>
			$id_out<br>
			$cCity,  $cState $cZip<br>
			Ph: $cPhone    Wk: $cPhone2<br>";
		
		/*"name = $name <br>
			address = $id_out<br>
			CSZ = $cCity,  $cState $cZip<br>
			Phone: $cPhone    Work: $cPhone2<br>";
			*/
    }
} while ($stmt->more_results() && $stmt->next_result());
   echo "<br>Equipment Description<br>";
	if (!($stmt = $db->prepare("CALL returnEqDesc($invNo)"))) {
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
        echo "$initials</td><td>$description</td><td>$price</td><td>$qty</td><td>$lsub</td><br>";
    }
} while ($stmt->more_results() && $stmt->next_result());
/*			echo "</td>
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
*/
echo "</tr><tr><td>";

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
			

			if (!($stmt = $db->prepare("CALL laborSubtot($invNo)"))) {
    echo "Prepare failed: (" . $db->errno . ") " . $db->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

do {

    $lsub = null;
	$id = null;

	
    if (!$stmt->bind_result($id,$lsub)) {
        echo "Bind failed: (" . $stmt->errno . ") " . $stmt->error;
    }
 
    while ($stmt->fetch()) {
        echo "
		$lsub <br>";
		$lsub1 = $lsub;
    }
} while ($stmt->more_results() && $stmt->next_result());
			echo "
            </td>
          </tr>
          <tr>
			<th>Parts Subtotal</th>
			<td>";
			if (!($stmt = $db->prepare("CALL partsSubtot($invNo)"))) {
    echo "Prepare failed: (" . $db->errno . ") " . $db->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}
do {

    $psub = null;
	$tax = null;
	$id = null;

	
    if (!$stmt->bind_result($id,$psub,$tax)) {
        echo "Bind failed: (" . $stmt->errno . ") " . $stmt->error;
    }
 
    while ($stmt->fetch()) {
        echo "
		$psub <br>";
		$psub1 = $psub;
    }
} while ($stmt->more_results() && $stmt->next_result());
			echo "</td>
          <tr data-iterate="."tax".">
            <th>tax</th>
            <td>";
			if (!($stmt = $db->prepare("CALL partsSubtot($invNo)"))) {
    echo "Prepare failed: (" . $db->errno . ") " . $db->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

do {

    $psub = null;
	$tax = null;
	$id = null;

	
    if (!$stmt->bind_result($id,$psub,$tax)) {
        echo "Bind failed: (" . $stmt->errno . ") " . $stmt->error;
    }
 
    while ($stmt->fetch()) {
        echo "
		$tax <br>";
		$tax1 = $tax;
    }
} while ($stmt->more_results() && $stmt->next_result());
			echo "</td>
          </tr>
          
          <tr class="."amount-total".">
            <th>Total</th>
            <td>";
			$total = $psub1 + $lsub1 + $tax1;
			//echo $psub;
			echo $total;
			echo "</td>
          </tr>
        </table>
"; 
?>
      </section>
</div>
</body>
</html>
