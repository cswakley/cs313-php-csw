<?php

	session_start();

	include 'title.php';

?>

<html>
	<body>
		<div class="container">
			<article class="info">
				<p>You are purchasing the following items:<br>
					<?php
					if (!empty($_SESSION['gtx1070'])) {
						echo "<strong>GIGABYTE GeForce GTX 1070 DirectX 12 GV-N1070WF2OC-8GD 8GB 256-Bit GDDR5 PCI Express 3.0 x16 ATX Video Card</strong><br>Quantity: " . $_SESSION['gtx1070'] . "<br>";
					}
					if (!empty($_SESSION['rx480'])) {
						echo "<strong>XFX Radeon RX 480 DirectX 12 RX480M8BFA6 8GB 256-Bit GDDR5 PCI Express 3.0 CrossFireX Support Video Card</strong><br>Quantity: " . $_SESSION['rx480'] . "<br>";
					}
					if (!empty($_SESSION['gtx1080'])) {
						echo "<strong>AORUS GeForce GTX 1080 8GB Xtreme OC Edition</strong><br>Quantity: " . $_SESSION['gtx1080'] . "<br>";
					}
					if (!empty($_SESSION['rx470'])) {
						echo "<strong>SAPPHIRE Radeon RX 470 DirectX 12 100407-4GOCL 4GB 256-Bit GDDR5 PCI Express 3.0 HDCP Ready CrossFireX Support Video Card</strong><br>Quantity: " . $_SESSION['rx470'] . "<br>";
					}
					if (!empty($_SESSION['titan'])) {
						echo "<strong>EVGA 06G-P4-3791-KR G-SYNC Support GeForce GTX TITAN BLACK Superclocked 6GB 384-Bit GDDR5 PCI Express 3.0 SLI Support Video Card</strong><br>Quantity: " . $_SESSION['titan'] . "<br>";
					}
					if (!empty($_SESSION['nvs310'])) {
						echo "<strong>PNY Quadro NVS 310 VCNVS310DP-PB 512MB 64-bit DDR3 PCI Express 2.0 x16 Low Profile Workstation Video Card</strong><br>Quantity: " . $_SESSION['nvs310'] . "<br>";
					}
					if (!empty($_SESSION['w2100'])) {
						echo "<strong>AMD FirePro W2100 100-505980 2GB 128-bit DDR3 PCI Express 3.0 x16 Low Profile Video Cards - Workstation</strong><br>Quantity: " . $_SESSION['w2100'] . "<br>";
					}
					?>
				</p>
			</article>

			<article class="entry">
				<form action="confirm.php" method="post">
					Please input your shipping address.<br>
					<input name="address" size="50" placeholder="Street"/><br>
          			<input name="city" size="20" placeholder="City"/>
          			<input name="state" size="2" placeholder="ST"/>
          			<input name="zip" size="7" placeholder="Zip"/><br>
          			<input type="submit" value="Complete Purchase">
				</form>
			</article>
		</div>
	</body>
</html>