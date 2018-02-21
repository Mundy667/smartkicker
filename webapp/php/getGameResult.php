<?php
	include "inc/db.conf.php";
	
	$stmt = $pdo->prepare("SELECT * FROM games ORDER BY id DESC LIMIT 0,1"); 
	$stmt->execute(); 
	$currentGameID = $stmt->fetch();
	# var_dump($currentGameID);	
	#echo $currentGameID["gameId"];
	$stmt = $pdo->prepare('SELECT * FROM games WHERE gameId='.$currentGameID["gameId"].' AND team="A"');
        $stmt->execute();
        $resultA = $stmt->rowCount();
        $stmt = $pdo->prepare("SELECT * FROM games WHERE gameId=".$currentGameID["gameId"]." AND team='B'");
        $stmt->execute();
        $resultB = $stmt->rowCount();

	echo "$resultA:$resultB";
?>
