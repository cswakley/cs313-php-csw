<?php

	include 'title.php';
        	
    // Only logged in users can submit an event
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
              <label>Game: </label><select name="newGame">
                <option value="Garrys Mod">Garrys Mod</option>
                <option value="Minecraft">Minecraft</option>
                <option value="Civilization 5">Civilization 5</option>
                <option value="Borderlands 2">Borderlands 2</option>
                <option value="Left 4 Dead 2">Left 4 Dead 2</option>
                <option value="Battlefield: Bad Company 2">Battlefield: Bad Company 2</option>
                <option value="Battlefield 4">Battlefield 4</option>
                <option value="Battlefield 1">Battlefield 1</option>
                <option value="Red Alert">Red Alert</option>
                <option value="Red Alert 2">Red Alert 2</option>
                <option value="Red Alert 3">Red Alert 3</option>
                <option value="Command and Conquer">Command and Conquer</option>
                <option value="Tiberian Sun">Tiberian Sun</option>
                <option value="Tiberian Wars">Tiberian Wars</option>
                <option value="Generals">Generals</option>
                <option value="Rainbow Six: Siege">Rainbow Six: Siege</option>
                <option value="Portal 2">Portal 2</option>
              </select><br>
              <label>Date: </label><input type="date" name="gameDate"><br>
          		<label>Details: </label><input type="text" name="gameDetails" size="40"><br>
          		<input type="submit" name="requestSubmit" value="Submit">
        	</form>
		</article>
	</div>
</body>
</html>