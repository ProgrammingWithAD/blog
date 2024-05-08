<?php
	session_start();
	
	$mysqli = mysqli_connect('localhost','root','', 'taskmanager');

	if(!$mysqli){
		echo "database error".mysqli_connect_error();
	}

	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); /* COMMENT ON LIVE MODE */

	$sessionValue = 'trip_cart';
	$base = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?'https':'http').'://'.$_SERVER['SERVER_NAME'].'/trip-cart-package/';

	$st_this_host = 'https://cloudcyber.in/drive-billing/';


	include 'functions.php';

	$company_query = $mysqli->query("SELECT * FROM company");
    $company = $company_query->fetch_assoc();

	$thisSoftware 	= 'DRIVE - BILLING';

	//Extra
	$script_ver = '1.1';
