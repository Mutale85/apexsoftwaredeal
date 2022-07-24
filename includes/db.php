<?php
	session_start();
	session_name();
	$PASS = "Javeria##2019";
	$USER = "Osabox";
	$dbname = "apexdeals";
	$connect = new PDO("mysql:host=localhost;dbname=apexdeals;", "root", "");
	// $connect = new PDO("mysql:host=localhost;dbname=$dbname;", $USER, $PASS);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	include 'functions.php';
	ini_set("pcre.jit", "0");
?>