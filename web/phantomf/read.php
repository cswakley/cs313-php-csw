<?php

	require("connect.php");

	foreach($db->query('SELECT message, sender_id, datetime FROM messages') as $row)
	{
		$temp = $row['sender_id'];
		$usr = $db->prepare("SELECT username FROM users WHERE id = '$temp'");
		$usr->execute();

		$usernm = $usr->fetch(PDO::FETCH_ASSOC);

		$username = $usernm['username'];
		$text = $row['message'];
		$datetime = $row['datetime'];

		if ($datetime != "")
		{
			echo "<p id=\"chat\">$username ($datetime): $text</p>\n";
		}
		else
		{
			echo "<p id=\"chat\">$username: $text</p>\n";
		}
	}

?>