<?php

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