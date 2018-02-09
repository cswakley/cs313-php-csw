<?php

	session_start();

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

	if (isset($_POST['loginSubmit']))
	{
		if($_POST['usrname'] != "")
		{
			foreach($db->query('SELECT username, password FROM users') as $log)
			{
				if($log['username'] == $_POST['usrname'] && $log['password'] == $_POST['pass'])
				{
					$_SESSION['usr'] = $log['username'];
				}
			}
		}
	}

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
	<h1 class="header">PHANTOM FOXTROT</h1>
</header>

<div class="topnav">
	<a href="main.php">Main</a>
	<a href="request.php">Submit Request</a>
	<a href="chat.php">Chat</a>
	<a href="join.php">Join us!</a>
	<?php
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
			echo 'Welcome, ' . $_SESSION['usr'];
	?>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="logout">
			<input type="submit" name="logout" value="Logout">
	<?php
		}
	?>
</div>
</center>