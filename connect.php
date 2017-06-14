<?php
$db = new mysqli('127.0.0.1', 'root', '', 'mowershop');

if($db->connect_errno){
	die("Site down at the moment.");
	
}


?>