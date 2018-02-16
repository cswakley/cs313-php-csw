<?php

	include 'title.php';
        	
    if (isset($_POST['requestSubmit']) && isset($_SESSION['usr']))
    {
       	$tempG = $_POST['newGame'];
       	$tempU = $_SESSION['usr'];
       	$tempD = $_POST['gameDate'];
       	$tempDet = $_POST['gameDetails'];
	
       	$temp = $db->prepare("SELECT id FROM games WHERE game = '$tempG'");
       	$temp->execute();

       	$tempGame = $temp->fetch(PDO::FETCH_ASSOC);

       	$temp = $db->prepare("SELECT id FROM users WHERE username = '$tempU'");
       	$temp->execute();

       	$tempUser = $temp->fetch(PDO::FETCH_ASSOC);

       	$stmt = $db->prepare('INSERT INTO schedule (gameid, date, details, userid) VALUES (:gameid, :date, :details, :userid)');
       	$stmt->bindValue(':gameid', $tempGame['id'], PDO::PARAM_INT);
       	$stmt->bindValue(':date', $tempD, PDO::PARAM_STR);
       	$stmt->bindValue(':details', $tempDet, PDO::PARAM_STR);
       	$stmt->bindValue(':userid', $tempUser['id'], PDO::PARAM_INT);

       	$stmt->execute();
					
    }
    elseif (!isset($_SESSION['usr']))
    {
    	echo '<script>';
		echo 'alert("You must be signed in to submit an event.")';
		echo '</script>';
    }

?>

<html>
<body>
	<div class="container">
		<article class="info">
			<p>If there is a game you want to add to the schedule, you may do so here, if you are signed in.</p><br>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="request">
          		Game: <input type="text" name="newGame"><br>
          		Date: <input type="text" name="gameDate" placeholder="YYYY-MM-DD"><br>
          		Details: <input type="text" name="gameDetails" size="40"><br>
          		<input type="submit" name="requestSubmit" value="Submit">
        	</form>
		</article>
	</div>
</body>
</html>