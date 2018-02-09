<?php

	include 'title.php';

	$dbUrl = getenv('DATABASE_URL');

	if (empty($dbUrl))
	{
		$dbUrl = "postgres://rahcccsbnamvss:e32675dcc727946b100dd92eaec7efee2edd946b23887d34a0502e1e6adca480@ec2-54-83-204-230.compute-1.amazonaws.com:5432/d8jro2qh5v71i4";
	}

	$dbopts = parse_url($dbUrl);

	$dbHost = $dbopts["host"];
	$dbPort = $dbopts["port"];
	$dbUser = $dbopts["user"];
	$dbPassword = $dbopts["pass"];
	$dbName = ltrim($dbopts["path"],'/');

	try {
		$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
	}
	catch (PDOException $ex) {
		echo 'Error!: ' . $ex->getMessage();
		die();
	}
?>

<html>
	<body>
		<div class="container">
			<article class="info">
        	<h2>Welcome, one and all!</h2>
        	<p>Welcome to the Phantom Foxtrot clan, where we host multiplayer servers for a variety of 
          	different games on the PC gaming spectrum. <br>We are a small group, running our
          	services through the help of the Evolve Social Gaming Platform. <br>
          	At this current moment, we host servers in a few games:<br>
          	<ul>
            <li>Garry's Mod (Sandbox and Deathmatch servers)</li>
            <li>Minecraft (Survival and Creative maps)</li>
            <li>Civilization 5 (Done without the use of Evolve)</li>
            <li>Borderlands 2 (Also done without Evolve)</li>
            <li>Left 4 Dead 1 & 2</li>
          	</ul>
          	In addition to hosting servers, us in the Phantom Foxtrot clan maintain a presence
          	in a vast number of games, including, but not limited to; Battlefield: Bad Company
          	2, Battlefield 4, Battlefield 1, Command & Conquer (numerous games), Rainbow Six: Siege,
          	and Portal 2.
        	</p>
      		</article>

      		<br>

      		<article class="entry">
      			<h2>Schedule</h2>
      			<p>You can check this schedule to see what and when we are playing. Signed in users can submit events for others to join.</p>

      			<form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      				Search the Schedule:
      				<select name="games">
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
      				</select>
      				<input type="submit" name="search" value="Search">
      			</form>

      			<?php

      			$found = false;

      			foreach ($db->query('SELECT * FROM schedule AS u JOIN games AS n ON u.gameId = n.id JOIN users AS k ON u.userId = k.id') as $row)
      			{
      				if ($row['game'] == $_POST['games'])
      				{
      					echo $row['date'] . ' - ' . $row['game'] . ': ' . $row['details'] . ' - Created by: ' . $row['username'] . '<br>';
      					$found = true;
      				}
      			}
      			if (!$found)
      			{
      				echo 'There are currently no events for the selected game';
      			}
      			
      			?>
      		</article>
      	</div>
	</body>
</html>