<?php
	$mysql_server = "smartkicker";
	$mysql_username = "kicker";
	$mysql_password = "kicker";

	try {
        	$dsn = 'mysql:host='.$mysql_server.';dbname=kicker;charset=utf8;port=3306';
        	$pdo = new PDO($dsn, 'root','root');
    	} catch (PDOException $e) {
        	echo $e->getMessage();
    	}


?>
