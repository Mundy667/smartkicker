<?php
	include "inc/db.conf.php";

	$stmt = $pdo->prepare("SELECT * FROM games ORDER BY id DESC LIMIT 0,1");
        $stmt->execute();
        $currentGameID = $stmt->fetch();
        # var_dump($currentGameID);     
 #       echo "- Aktuelles Spiel: ". $currentGameID["Id"];
	if ( $currentGameID["team"] != "new" ){
        #	echo "team a/b";
		$stmt = $pdo->prepare("DELETE FROM games WHERE Id = ". $currentGameID["Id"].  "");
        	$stmt->execute();
	}else{
	 #echo "keine tor vorhanden!";
	}
	header("Location: /index.php");	
?>
