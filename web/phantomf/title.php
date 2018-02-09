<?php

	session_start();

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
	<form action="" method="post" name="login" class="login">
		Sign In:
		<input type="text" name="usrname" size="10" placeholder="Username"> 
		<input type="password" name="pass" size="10" placeholder="Password"> 
		<input type="submit" name="loginSubmit" value="Login">
	</form>
</div>
</center>