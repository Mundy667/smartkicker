<?php
	include "inc/db.conf.php";
	
	$stmt = $pdo->prepare("SELECT * FROM games where team='new' ORDER By id DESC LIMIT 5"); 
	$stmt->execute(); 
	while($rows = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
	  $gameId = $rows[1];
	  if ($gameId > 0){
	  	$stmt2 = $pdo->prepare('SELECT * FROM games WHERE gameId='.$gameId.' AND team="A"');
          	$stmt2->execute();
          	$resultA = $stmt2->rowCount();
          	$stmt2 = $pdo->prepare("SELECT * FROM games WHERE gameId=".$gameId." AND team='B'");
          	$stmt2->execute();
          	$resultB = $stmt2->rowCount();
	  	$tablebody.="<tr><td>". $gameId ."</td><td>". $rows[3] ."</td><td>".$resultA.":".$resultB."</td></tr>";
	  }
	}
	# var_dump($currentGameID);	
	#echo $currentGameID["gameId"];
	#	$stmt = $pdo->prepare('SELECT * FROM games WHERE gameId='.$currentGameID["gameId"].' AND team="A"');
        #	$stmt->execute();
        #	$resultA = $stmt->rowCount();
        #	$stmt = $pdo->prepare("SELECT * FROM games WHERE gameId=".$currentGameID["gameId"]." AND team='B'");
        #	$stmt->execute();
        #	$resultB = $stmt->rowCount();
	echo "
                <table class=\"table\">
                 <thead>
                     <tr>
                        <th>#</th>
                        <th>Start Time</th>
                        <th>Result</th>
                     </tr>
                </thead>
                <tbody>
                $tablebody
		</tbody>
                </table>
	";
	# echo "$resultA:$resultB";
?>
