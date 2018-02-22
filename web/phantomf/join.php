<?php

	include 'title.php';
  include 'password.php';

  // Once the user submits the form, this fires off.
  if (isset($_POST['userSubmit']))
  {
    $newUser = $_POST['usr'];
    $temp = $_POST['psw'];
    $userPass = password_hash($temp, PASSWORD_DEFAULT);
    $passConf = $_POST['pswConf'];
    $steam = $_POST['steam'];
    $origin = $_POST['origin'];
    $uplay = $_POST['uplay'];

    $isTaken = false;
    $success = false;

    if ($newUser != "" && $temp != "")
    {
      foreach ($db->query('SELECT username FROM users') as $row)
      {
        if ($newUser == $row['username'])
        {
          echo "<center><article class='notice'>Please enter a valid username.</article></center>";
          $isTaken = true;
        }
      }

      if (!$isTaken)
      {
        if (!password_verify($passConf, $userPass))
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
          $success = true;
        }
      }

      if ($success)
      {
        echo "<center><article class='notice'>Account has been created! Please log in in the top right corner!</article></center>";
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
        <p>Please enter your information here!<br><span style="color:red">* indicates a required field.</span></p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <label class="join">Username: </label><input type="text" name="usr"><span class="required"> *</span><br>
          <label class="join">Password: </label><input type="password" name="psw"><span class="required"> *</span><br>
          <label class="join">Confirm Password: </label><input type="password" name="pswConf"><span class="required"> *</span><br>
          <br>
          <label class="join">SteamID: </label><input type="text" name="steam"><br>
          <label class="join">OriginID: </label><input type="text" name="origin"><br>
          <label class="join">UPlayID: </label><input type="text" name="uplay"><br>
          <input type="submit" name="userSubmit" value="Create Account">
        </form>
        <p>The admin will contact you on these platforms when convenient.</p>
      </article>
	</div>
</body>
</html>