<?php

	include 'title.php';

  if (isset($_POST['userSubmit']))
  {
    $newUser = $_POST['usr'];
    $userPass = $_POST['psw'];
    $passConf = $_POST['pswConf'];
    $steam = $_POST['steam'];
    $origin = $_POST['origin'];
    $uplay = $_POST['uplay'];

    $isTaken = false;

    foreach ($db->query('SELECT username FROM users') as $row)
    {
      if ($newUser == $row['username'])
      {
        echo "<center><article class='notice'>That username is taken. Please enter a new username.</article></center>";
        $isTaken = true;
      }
    }

    if (!$isTaken)
    {
      if ($userPass != $passConf)
      {
        echo "<center><article class='notice'>Passwords do not match. Please check and try again.</article></center>";
      }
      else
      {
        $stmt = $db->prepare('INSERT INTO users (username, password, steamname, originname, uplayname) VALUES (:username, :password, :steamname, :originname, :uplayname)');
        $stmt->bindValue(':username', $newUser, PDO::PARAM_STR);
        $stmt->bindValue(':password', $userPass, PDO::PARAM_STR);
        if (isset($steam))
        {
          $stmt->bindValue(':steamname', $steam, PDO::PARAM_STR);
        }
        if (isset($origin))
        {
          $stmt->bindValue(':originname', $origin, PDO::PARAM_STR);
        }
        if (isset($uplay))
        {
          $stmt->bindValue(':uplayname', $uplay, PDO::PARAM_STR);
        }

        $stmt->execute();
      }
    }
  }

?>

<html>
<body>
	<div class="container">
		<article class="info">
        <p>If you wish to join our community, we are more than happy to include you!
          In order to have you included, we ask that you provide us with a username and
          password so you can sign in and contribute. Also, please provide your username
          for game distribution systems like Steam and Origin, so you and the other players
          can connect.<br><br>
          <strong>As you choose a password, please enter a unique password, different than your 
          Steam or Origin password.</strong>
          <br>
          <br>
        </p>
        <p>Please enter your information here!<br></p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          Username: <input type="text" name="usr"><br>
          Password: <input type="password" name="psw"><br>
          Confirm Password: <input type="password" name="pswConf"><br>
          <br>
          SteamID: <input type="text" name="steam"><br>
          OriginID: <input type="text" name="origin"><br>
          UPlayID: <input type="text" name="uplay"><br>
          <input type="submit" name="userSubmit" value="Create Account">
        </form>
        <p>The admin will contact you on these platforms when convenient.</p>
      </article>
	</div>
</body>
</html>