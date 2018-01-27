<?php

	session_start();

	include 'title.php';

?>

<html>
	<body>
		<div class="container">
			<article class="info">
				<p>The following items are in your cart.</p>
			</article>

			<article class="entry">
				<?php
					echo "<form action'' method='post'>";
					if (!empty($_SESSION['gtx1070'])) {
						echo "<strong>GIGABYTE GeForce GTX 1070 DirectX 12 GV-N1070WF2OC-8GD 8GB 256-Bit GDDR5 PCI Express 3.0 x16 ATX Video Card</strong><br>Quantity: " . $_SESSION['gtx1070'] . "<input type='submit' value='Remove from Cart' name='rm1070'><br><br>";
					}
					if (!empty($_SESSION['rx480'])) {
						echo "<strong>XFX Radeon RX 480 DirectX 12 RX480M8BFA6 8GB 256-Bit GDDR5 PCI Express 3.0 CrossFireX Support Video Card</strong><br>Quantity: " . $_SESSION['rx480'] . "<input type='submit' value='Remove from Cart' name='rm480'><br><br>";
					}
					if (!empty($_SESSION['gtx1080'])) {
						echo "<strong>AORUS GeForce GTX 1080 8GB Xtreme OC Edition</strong><br>Quantity: " . $_SESSION['gtx1080'] . "<input type='submit' value='Remove from Cart' name='rm1080'><br><br>";
					}
					if (!empty($_SESSION['rx470'])) {
						echo "<strong>SAPPHIRE Radeon RX 470 DirectX 12 100407-4GOCL 4GB 256-Bit GDDR5 PCI Express 3.0 HDCP Ready CrossFireX Support Video Card</strong><br>Quantity: " . $_SESSION['rx470'] . "<input type='submit' value='Remove from Cart' name='rm470'><br><br>";
					}
					if (!empty($_SESSION['titan'])) {
						echo "<strong>EVGA 06G-P4-3791-KR G-SYNC Support GeForce GTX TITAN BLACK Superclocked 6GB 384-Bit GDDR5 PCI Express 3.0 SLI Support Video Card</strong><br>Quantity: " . $_SESSION['titan'] . "<input type='submit' value='Remove from Cart' name='rmTitan'><br><br>";
					}
					if (!empty($_SESSION['nvs310'])) {
						echo "<strong>PNY Quadro NVS 310 VCNVS310DP-PB 512MB 64-bit DDR3 PCI Express 2.0 x16 Low Profile Workstation Video Card</strong><br>Quantity: " . $_SESSION['nvs310'] . "<input type='submit' value='Remove from Cart' name='rm310'><br><br>";
					}
					if (!empty($_SESSION['w2100'])) {
						echo "<strong>AMD FirePro W2100 100-505980 2GB 128-bit DDR3 PCI Express 3.0 x16 Low Profile Video Cards - Workstation</strong><br>Quantity: " . $_SESSION['w2100'] . "<input type='submit' value='Remove from Cart' name='rm2100'><br><br>";
					}
					echo "</form>";

				?>

				<?php
					if (isset($_POST['rm1070'])){
        				$_SESSION['gtx1070'] = 0;
        				header("Refresh:0");
        				} 
        				if (isset($_POST['rm480'])){
        				$_SESSION['rx480'] = 0;
        				header("Refresh:0");
        				}
        				if (isset($_POST['rm1080'])){
        				$_SESSION['gtx1080'] = 0;
        				header("Refresh:0");
        				}
        				if (isset($_POST['rm470'])){
        				$_SESSION['rx470'] = 0;
        				header("Refresh:0");
        				}
        				if (isset($_POST['rmTitan'])){
        				$_SESSION['titan'] = 0;
        				header("Refresh:0");
        				}
        				if (isset($_POST['rm310'])){
        				$_SESSION['nvs310'] = 0;
        				header("Refresh:0");
        				}
        				if (isset($_POST['rm2100'])){
        				$_SESSION['w2100'] = 0;
        				header("Refresh:0");
        				}
				?>

				<form action="checkout.php">
					<input type="submit" value="Checkout">
				</form>
			</article>
		</div>
	</body>
</html>