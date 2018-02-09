<?php

	include 'title.php';

?>

<html>
<body>
	<div class="container">
		<article class="info">
			<p>If there is a game you want to add to the schedule, you may do so here, if you are signed in.</p><br>
			<form action="" method="post" enctype="text/plain">
          		Game: <input type="text" name="newGame"><br>
          		Date: <input type="text" name="gameDate"><br>
          		Details: <input type="text" name="gameDetails" size="40"><br>
          		<input type="submit" value="Submit">
        	</form>
		</article>
	</div>
</body>
</html>