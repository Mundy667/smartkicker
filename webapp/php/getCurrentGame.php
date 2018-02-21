<?php
	include "inc/db.conf.php";
	
	$stmt = $pdo->prepare("SELECT * FROM games ORDER BY id DESC LIMIT 0,1"); 
	$stmt->execute(); 
	$currentGameID = $stmt->fetch();
	# var_dump($currentGameID);	
	echo "- Aktuelles Spiel: ". $currentGameID["gameId"];
?>
