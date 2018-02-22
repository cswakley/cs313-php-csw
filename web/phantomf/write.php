<?php

	session_start();

	require("connect.php");

	$message = substr($_GET["text"], 0, 128);
	$tempuser = substr($_GET["username"], 0, 32);
	$datetime = date("Y/m/d h:i:sa");

	if ($tempuser != "")
	{
		$tmp = $db->prepare("SELECT id FROM users WHERE username = '$tempuser'");
		$tmp->execute();

		$user = $tmp->fetch(PDO::FETCH_ASSOC);

		if($message != "")
		{
			$stmt = $db->prepare('INSERT INTO messages (message, sender_id, datetime) VALUES (:message, :sender_id, :datetime)');
			$stmt->bindValue(':message', $message, PDO::PARAM_STR);
			$stmt->bindValue(':sender_id', $user['id'], PDO::PARAM_INT);
			$stmt->bindValue(':datetime', $datetime, PDO::PARAM_STR);
			$stmt->execute();
		}
	}
?>