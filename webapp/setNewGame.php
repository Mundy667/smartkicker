<?php
	include "inc/db.conf.php";
	
	$stmt = $pdo->prepare("SELECT * FROM games ORDER BY id DESC LIMIT 0,1"); 
	$stmt->execute(); 
	$currentGameID = $stmt->fetch();
	# var_dump($currentGameID);	
	#echo $currentGameID["gameId"];
        $newGameID = $currentGameID["gameId"] + 1; 
	#echo $newGameID;
	$stmt = $pdo->prepare("INSERT INTO games(gameId, team) VALUES(".$newGameID.", 'new')");
        $stmt->execute();
	
	header("Location: /index.php"); 
?>
