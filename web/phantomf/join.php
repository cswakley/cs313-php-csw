<?php

	include 'title.php';

?>

<html>
<body>
	<div class="container">
		<article class="info">
        <p>If you wish to join our community, we are more than happy to include you!
          In order to have you included, we ask that you provide us with a username and
          password so you can sign in and contribute. Also, please provide your username
          for game distribution systems like Steam and Origin, so you and the other players
          can connect.<br>
          <br>
        </p>
        <p>Please enter your information here!<br><b>This functionality does not yet work. An update will come soon!</b></p>
        <form action="" method="post" enctype="text/plain">
          Username: <input type="text" name="usr"><br>
          Password: <input type="password" name="psw"><br>
          Confirm Password: <input type="password" name="pswConf"><br>
          <br>
          SteamID: <input type="text" name="steam"><br>
          OriginID: <input type="text" name="origin"><br>
          UPlayID: <input type="text" name="uplay"><br>
          <input type="submit" value="Submit">
        </form>
        <p>The admin will contact you on these platforms when convenient.</p>
      </article>
	</div>
</body>
</html>