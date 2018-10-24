<?php

	include 'password.php';

	session_start();

	// Connect to database
	$dbUrl = getenv('DATABASE_URL');

	if (empty($dbUrl))
	{
		$dbUrl = "";
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

	// When the user tries to log in on the navbar, this fires.
	if (isset($_POST['loginSubmit']))
	{
		if($_POST['usrname'] != "")
		{
			$usermatch = false;

			foreach($db->query('SELECT username, password FROM users') as $log)
			{
				$hashed = $log['password'];
				$userpass = $_POST['pass'];
				if($log['username'] == $_POST['usrname'] && password_verify($userpass, $hashed))
				{
					// If username and passwords match, the username is stored as a session variable
					$_SESSION['usr'] = $log['username'];
					$usermatch = true;
				}
			}
			if (!$usermatch)
			{
				echo '<script>';
				echo 'alert("Username or password does not match!")';
				echo '</script>';
			}
		}
	}

	// If the user logs out, the session is cleared.
	if (isset($_POST['logout']))
	{
		session_unset();
	}

?>
<head>
	<title>Phantom Foxtrot Server Hosting</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<center>
<header>
	<div class="header" align="right"><img src="FinalBanner.PNG"></div>
</header>

<div class="topnav">
	<a href="main.php">Main</a>
	<a href="request.php">Submit Request</a>
	<a href="chat.php">Chat</a>
	<a href="join.php">Join us!</a>
	<?php
		/* This jumbled mess handles what is displayed on the righthand side of the navbar, depending if
		the user is logged in or not. */
		if (!isset($_SESSION['usr']))
		{
	?>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="login" class="login">
		Sign In:
		<input type="text" name="usrname" size="10" placeholder="Username"> 	<input type="password" name="pass" size="10" placeholder="Password"> 
		<input type="submit" name="loginSubmit" value="Login">
	</form>
	<?php
		}
		else {
	?>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="logout">
	<?php
			echo '<div class="login">Welcome, ' . $_SESSION['usr'] . ' - ';
	?>
			<input type="submit" name="logout" value="Logout">
			</div>
			</form>
	<?php
		}
	?>
</div>
</center>
