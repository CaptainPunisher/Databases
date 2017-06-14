 <?php
require_once ('dbindex.php'); echo '<br><br><br>';
//$invNo = 30;
$invNo = trim(strtoupper($_POST["invNo"]));
$GLOBALS['lsub1'] = null;
$GLOBALS['psub1'] = null;
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
			Invoice #: ".$invNo."<br>
			Date: ";
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
		echo "</div>";

		
echo "
	<div class="."cust-info".">
	Customer Info: <br>";
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
		}
	} while ($stmt->more_results() && $stmt->next_result());
	
   //echo "Equipment Description<br>";
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
	</section>";
	
echo "<section id="."items".">
        <table>	
			<tr>
				<th>Item</th> 
				<th>Description</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Subtotal</th>
			</tr>";
				
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
        echo "<tr>
				<td>$initials</td><td>$description</td><td>$price</td><td>$qty</td><td>$lsub</td>
			</tr>";
    }
} while ($stmt->more_results() && $stmt->next_result()); 

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
        echo "<tr>
					<td>$stock</td><td>$description</td><td>$price</td><td>$qty</td><td>$psub</td>
				</tr>";
    }
} while ($stmt->more_results() && $stmt->next_result());

echo 		"</table>";
echo	"</section>
		<section id="."sums".">
			<table>";
			
$hasLabor=0;
if (!($stmt = $db->prepare("CALL laborSubot($invNo)"))) { //failed no parts
	$hasLabor=0;
	//////////////////////////////////////
    //echo "Prepare failed: (" . $db->errno . ") " . $db->error; // displays on page
	// use for debug
	//////////////////////////////////////
}else {//success has parts
	$hasLabor=1;
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
		$GLOBALS['lsub1'] = $lsub;
		
	}
		if ($lsub == null)
			$GLOBALS['lsub1'] = 0.00;
		else
			$GLOBALS['lsub1'] = $lsub;
        echo "	<tr>
					<td>LABOR TOTAL</td><td>$";
					printf("%.2f", $GLOBALS['lsub1']);
		echo		"</td>
				</tr>";
	
} while ($stmt->more_results() && $stmt->next_result());
//////////
}// close else to success has parts
	//////////
/* if(!$hasLabor) {
	$GLOBALS['lsub1'] = 0;
	echo "	<tr>
					<td>LABOR TOTAL</td><td>$";
					printf("%.2f", $GLOBALS['lsub1']);
	echo			"</td>
				</tr>";
} */
			
/* if (!($stmt = $db->prepare("CALL laborSubot($invNo)"))) {
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
	

		
		$stmt->fetch();
		if ($lsub == null)
			$GLOBALS['lsub1'] = 0.00;
		else
			$GLOBALS['lsub1'] = $lsub;
        echo "	<tr>
					<td>LABOR TOTAL</td><td>$".$GLOBALS['lsub1'];
					if ($GLOBALS['lsub1'] == 0)
						echo ".00";
		echo		"</td>
				</tr>";		

	
} while ($stmt->more_results() && $stmt->next_result()); */


$hasParts=0;
if (!($stmt = $db->prepare("CALL partsSubtot($invNo)"))) { //failed no parts
	$hasParts=0;
	//////////////////////////////////////
    //echo "Prepare failed: (" . $db->errno . ") " . $db->error; // displays on page
	// use for debug
	//////////////////////////////////////
}else {//success has parts
	$hasParts=1;
	if (!$stmt->execute()) {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	}



do {

    $psub = null;
	$id = null;
	
    if (!$stmt->bind_result($id,$psub)) {
        echo "Bind failed: (" . $stmt->errno . ") " . $stmt->error;
    }

    while ($stmt->fetch()) {
		$GLOBALS['psub1'] = $psub;
		
	}
		if ($psub == null)
			$GLOBALS['psub1'] = 0.00;
		else
			$GLOBALS['psub1'] = $psub;
        echo "	<tr>
					<td>PARTS TOTAL</td><td>$".$GLOBALS['psub1']."</td>
				</tr>";
	
} while ($stmt->more_results() && $stmt->next_result());
//////////
}// close else to success has parts
	//////////
if(!$hasParts) {
	$GLOBALS['psub1'] = 0;
	echo "	<tr>
					<td>PARTS TOTAL</td><td>$";
					printf("%.2f", $GLOBALS['psub1']);
	echo			"</td>
				</tr>";
}
//////////////////////////////////
/* 	 if($psub1 == null){
		$GLOBALS['psub1'] = 0.00;
		echo "	<tr>
					<td>PARTS TOTAL</td><td>$".$GLOBALS['psub1'];
					if ($GLOBALS['psub1'] == 0)
						echo ".00";
		echo		"</td>
				</tr>";
	} */

$GLOBALS['tax'] = round($GLOBALS['psub1'] * .0725, 2);
$tax = round($GLOBALS['psub1'] * .0725, 2);
/* echo "<pre>";
//echo var_dump($GLOBALS);

echo "</pre>"; */
echo 	"		<tr>
					<td>TAX</td><td>$";
					printf("%.2f", $tax);
					/* if ( $tax == 0)
						echo ".00"; */
echo					"</td>
				</tr>";
				
$GLOBALS['total'] = $GLOBALS['psub1'] + $GLOBALS['lsub1'] + $tax;

echo 	"		<tr>
					<td>TOTAL</td><td>$";
					printf("%.2f", $total);
					//if ($total % 1 == 0)
						//echo ".00";
echo					"</td>
				</tr>
			</table>
		</section>";
		
//////////////////// add button to go home

?>