

<?php
//$POST 
$act=$_POST["ACTION"];
$tab=$_POST["TABLE"];

//switch all ACTIONs and TABLEs, then redirect to corresponding page
switch($act.$tab){
	case "ADDCUSTOMER":
	header('Location: http://localhost/addcust.php');
	exit();
	
	case "ADDPART":
	header('Location: http://localhost/addpart.php');
	exit();
	
	case "ADDSUPPLIER":
	header('Location: http://localhost/addsupp.php'); // NOT DONE
	exit();
	
	case "ADDEMPLOYEE":
	header('Location: http://localhost/addemp.php'); 
	exit();
	
	case "ADDEQUIPMENT":
	header('Location: http://localhost/addeq.php'); // NOT DONE
	exit();
	
	case "ADDINVOICE":
	header('Location: http://localhost/addinv.php'); // NOT DONE
	exit();
	
	case "UPDATECUSTOMER":
	header('Location: http://localhost/upcust.php'); // NOT DONE
	exit();
	
	case "UPDATEPART":
	header('Location: http://localhost/uppart.php'); // NOT DONE
	exit();
	
	case "UPDATESUPPLIER":
	header('Location: http://localhost/upsupp.php'); // NOT DONE
	exit();
	
	case "UPDATEEMPLOYEE":
	header('Location: http://localhost/upemp.php'); // NOT DONE
	exit();
	
	case "UPDATEEQUIPMENT":
	header('Location: http://localhost/upeq.php'); // NOT DONE
	exit();
	
	case "UPDATEINVOICE":
	header('Location: http://localhost/upinv.php'); // NOT DONE
	exit();
	
	case "DELETECUSTOMER":
	header('Location: http://localhost/delcust.php'); // NOT SHOWING 3RD PAGE CONFIRMATION
	exit();
	
	case "DELETEPART":
	header('Location: http://localhost/delpart.php'); // NOT DONE
	exit();
	
	case "DELETESUPPLIER":
	header('Location: http://localhost/delsupp.php'); // NOT DONE
	exit();
	
	case "DELETEEMPLOYEE":
	header('Location: http://localhost/delemp.php'); // NOT DONE
	exit();
	
	case "DELETEEQUIPMENT":
	header('Location: http://localhost/deleq.php'); // NOT DONE
	exit();
	
	case "DELETEINVOICE":
	header('Location: http://localhost/delinv.php'); // NOT DONE
	exit();
}

 
?>