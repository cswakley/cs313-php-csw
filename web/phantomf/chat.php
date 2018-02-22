<?php

	include 'title.php';

?>

<html>

<body>
	<div id="wrapper">
		<div id="menu">
			<?php
				if (!isset($_SESSION['usr']))
				{
					echo "Please sign in to use chat.";
				}
				else
				{
					echo "Posting as: <b>" . $_SESSION['usr'] . "</b>";
				}
			?>
		</div>
		<div id="chatOutput"></div>
		<center>
			<input name="usernm" type="hidden" id="chatUser" value="<?php echo $_SESSION['usr']; ?>">
			<input name="usermsg" type="text" id="chatInput" size="63">
			<input name="submitmsg" type="submit" id="chatSend" value="Send">
		</center>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
		
		$(document).ready(function () {
    		var chatInterval = 1500; //refresh interval in ms
    		var $userName = $("#chatUser");
    		var $chatOutput = $("#chatOutput");
    		var $chatInput = $("#chatInput");
    		var $chatSend = $("#chatSend");

    		function sendMessage() {
        		var userNameString = $userName.val();
        		var chatInputString = $chatInput.val();

        		$.get("write.php", {
            		username: userNameString,
            		text: chatInputString
        		});

        		$userName.val("");
        		retrieveMessages();
    		}

    		function clearField() {
    			document.getElementById("chatInput").value = "";
    			document.getElementById("chatUser").value = "<?php echo $_SESSION['usr']; ?>";
    		}

    		function retrieveMessages() {
        		$.get("read.php", function (data) {
            		$chatOutput.html(data); //Paste content into chat output
        		});
    		}

    		$($chatSend).click(function () {
        		sendMessage();
        		clearField();
    		});

    		setInterval(function () {
        		retrieveMessages();
    		}, chatInterval);
		});
	</script>
</body>
</html>