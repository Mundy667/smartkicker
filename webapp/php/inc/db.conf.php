<?php
	$mysql_server = "192.168.99.100";
	$mysql_username = "kicker";
	$mysql_password = "kicker";

	try {
        	$dsn = 'mysql:host='.$mysql_server.';dbname=kicker;charset=utf8;port=8989';
        	$pdo = new PDO($dsn, 'root','root');
    	} catch (PDOException $e) {
        	echo $e->getMessage();
    	}


?>
