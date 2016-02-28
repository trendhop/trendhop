<?php 
	$db['db_host'] = "localhost";
	$db['db_user'] = "root";
	$db['db_pass'] = "";
	$db['db_name'] = "trendhop_main";

	foreach($db as $k => $v) {
		define(strtoupper($k), $v);
	}

	$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
?>