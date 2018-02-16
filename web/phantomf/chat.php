<?php

	include 'title.php';

?>

<html>

<body>
	<div id="wrapper">
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
    		var chatInterval = 200; //refresh interval in ms
    		// var $userName = "<?php echo $_SESSION['usr']; ?>";
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
		

		// function update()
		// {
		// 	$.post("server.php", {}, function(data){ $("#chatOutput").val(data);});
		// }

		// $(document).ready(

		// 	function()
		// 	{
		// 		update();

		// 		$("#chatSend").click(
		// 			function()
		// 			{
		// 				$.post("server.php", { message: $("#chatInput").val()}, function(data){
		// 					$("#chatOutput").val(data);
		// 					$("#chatInput").val("");
		// 				});
		// 			});
		// 		});
	</script>
</body>
</html>