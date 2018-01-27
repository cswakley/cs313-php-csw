<?php

	session_start();

	$page = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
	
?>

<head>
	<title>GPULand</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<center>
<header>
        <h1 class="header"><img src="gpubanner.PNG" style="width:1059px;height:110px;"></h1>
</header>
</center>

<nav class="tab">
	<button class="tablinks"><a href="browse.php">Browse Products</a></button>
	<button class="tablinks"><a href="cart.php">View Cart</a></button>
</nav>
<br>