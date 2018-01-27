<?php
	session_start();

	include 'title.php';
?>

<html>

	<body>
		<div class="container">
			<article class="notice">
        		<p>We've got graphics cards! We've got the best graphics cards!</p>
      		</article>

      		<br>

      		<article class="info">
        		<p>Check out our wonderful selection below!</p>
      		</article>
      		<article class="entry">
        		<p><strong>GIGABYTE GeForce GTX 1070 DirectX 12 GV-N1070WF2OC-8GD 8GB 256-Bit GDDR5 PCI Express 3.0 x16 ATX Video Card</strong></p>
        		<img src="gtx1070.jpg" alt="GTX 1070" style="width:400px;height:300px;">
        		<p>
          		<ul>
            		<li>8GB 256-Bit GDDR5</li>
            		<li>1 x Dual-link DVI-D 1 x HDMI 2.0b 3 x DisplayPort 1.4</li>
            		<li>1920 CUDA Cores</li>
            		<li>PCI Express 3.0 x16</li>
          		</ul>
        		</p>
 		       	<p>
          		<strong>$369.99</strong>
        		</p>
        		<form method="post" action="">
        			Quantity: <input type="text" name="gtx1070" id="gtx1070" size="1">
        			<input type="submit" value="Add to Cart" name="sub1070">
        		</form>
        		<?php
        			if (isset($_POST['sub1070'])){
        				if (is_numeric($_POST['gtx1070']) && $_POST['gtx1070'] > 0) {
        					$_SESSION['gtx1070'] = $_POST['gtx1070'];
        					echo "Amount in Cart: " . $_SESSION['gtx1070'];
        				}
        				else {
        					echo "Please enter a valid quantity.";
        				}
        			}
        		?>
      		</article>

      		<article class="entry">
        		<p>
          		<strong>XFX Radeon RX 480 DirectX 12 RX480M8BFA6 8GB 256-Bit GDDR5 PCI Express 3.0 CrossFireX Support Video Card</strong>
        		</p>
        		<img src="rx480.jpg" alt="RX 480" style="width:400px;height:300px;">
        		<p>
          		<ul>
            		<li>VR ready</li>
            		<li>PCI Express 3.0 x16</li>
            		<li>1 x HDMI 3 x DisplayPort 1.4</li>
          		</ul>
        		</p>
        		<p>
          		<strong>$214.99</strong>
        		</p>
        		<form method="post">
        			Quantity: <input type="text" name="rx480" id="rx480" size="1">
        			<input type="submit" value="Add to Cart" name="sub480">
        		</form>
        		<?php
        			if (isset($_POST['sub480'])){
        				if (is_numeric($_POST['rx480']) && $_POST['rx480'] > 0) {
        					$_SESSION['rx480'] = $_POST['rx480'];
        					echo "Amount in Cart: " . $_SESSION['rx480'];
        				}
        				else {
        					echo "Please enter a valid quantity.";
        				}
        			}
        		?>
      		</article>

      		<article class="entry">
        		<p>
          		<strong>AORUS GeForce GTX 1080 8GB Xtreme OC Edition</strong>
        		</p>
        		<img src="gtx1080.jpg" alt="GTX 1080" style="width:400px;height:300px;">
        		<p>
          		<ul>
            		<li>8GB 256-Bit GDDR5X</li>
            		<li>1 x Dual-Link DVI-D 3 x HDMI 3 x DisplayPort</li>
            		<li>PCI Express 3.0 x16</li>
            		<li>VR ready</li>
          		</ul>
        		</p>
        		<p>
          		<strong>$679.99</strong>
        		</p>
        		<form method="post">
        			Quantity: <input type="text" name="gtx1080" id="gtx1080" size="1">
        			<input type="submit" value="Add to Cart" name="sub1080">
        		</form>
        		<?php
        			if (isset($_POST['sub1080'])){
        				if (is_numeric($_POST['gtx1080']) && $_POST['gtx1080'] > 0) {
        					$_SESSION['gtx1080'] = $_POST['gtx1080'];
        					echo "Amount in Cart: " . $_SESSION['gtx1080'];
        				}
        				else {
        					echo "Please enter a valid quantity.";
        				}
        			}
        		?>
      		</article>

      		<article class="entry">
        		<p>
          		<strong>SAPPHIRE Radeon RX 470 DirectX 12 100407-4GOCL 4GB 256-Bit GDDR5 PCI Express 3.0 HDCP Ready CrossFireX Support Video Card</strong>
        		</p>
        		<img src="rx470.jpg" alt="RX 470" style="width:400px;height:300px;">
        		<p>
          		<ul>
            		<li>4GB 256-Bit GDDR5</li>
            		<li>1 x HDMI 2.0b 3 x DisplayPort 1.4</li>
            		<li>2048 Stream Processors</li>
            		<li>PCI Express 3.0</li>
          		</ul>
        		</p>
        		<p>
          		<strong>$159.99</strong>
        		</p>
        		<form method="post">
        			Quantity: <input type="text" name="rx470" id="rx470" size="1">
        			<input type="submit" value="Add to Cart" name="sub470">
        		</form>
        		<?php
        			if (isset($_POST['sub470'])){
        				if (is_numeric($_POST['rx470']) && $_POST['rx470'] > 0) {
        					$_SESSION['rx470'] = $_POST['rx470'];
        					echo "Amount in Cart: " . $_SESSION['rx470'];
        				}
        				else {
        					echo "Please enter a valid quantity.";
        				}
        			}
        		?>
      		</article>

      		<article class="entry">
        		<p>
          		<strong>EVGA 06G-P4-3791-KR G-SYNC Support GeForce GTX TITAN BLACK Superclocked 6GB 384-Bit GDDR5 PCI Express 3.0 SLI Support Video Card</strong>
        		</p>
        		<img src="titan.jpg" alt="TITAN" style="width:400px;height:300px;">
        		<p>
          		<ul>
            		<li>2880 CUDA Cores</li>
            		<li>6GB 384-Bit GDDR5</li>
            		<li>PCI Express 3.0</li>
          		</ul>
        		</p>
        		<p>
          		<strong>$1,124.09</strong>
        		</p>
        		<form method="post">
        			Quantity: <input type="text" name="titan" id="titan" size="1">
        			<input type="submit" value="Add to Cart" name="subtitan">
        		</form>
        		<?php
        			if (isset($_POST['subtitan'])){
        				if (is_numeric($_POST['titan']) && $_POST['titan'] > 0) {
        					$_SESSION['titan'] = $_POST['titan'];
        					echo "Amount in Cart: " . $_SESSION['titan'];
        				}
        				else {
        					echo "Please enter a valid quantity.";
        				}
        			}
        		?>
      		</article>

      		<article class="entry">
        		<p>
          		<strong>PNY Quadro NVS 310 VCNVS310DP-PB 512MB 64-bit DDR3 PCI Express 2.0 x16 Low Profile Workstation Video Card</strong>
        		</p>
        		<img src="nvs310.jpg" alt="NVS 310" style="width:400px;height:300px;">
        		<p>
          		<ul>
            		<li>Quadro NVS 310</li>
            		<li>512MB DDR3</li>
            		<li>PCI Express 2.0 x16</li>
          		</ul>
        		</p>
        		<p>
          		<strong>$81.99</strong>
        		</p>
        		<form method="post">
        			Quantity: <input type="text" name="nvs310" id="nvs310" size="1">
        			<input type="submit" value="Add to Cart" name="sub310">
        		</form>
        		<?php
        			if (isset($_POST['sub310'])){
        				if (is_numeric($_POST['nvs310']) && $_POST['nvs310'] > 0) {
        					$_SESSION['nvs310'] = $_POST['nvs310'];
        					echo "Amount in Cart: " . $_SESSION['nvs310'];
        				}
        				else {
        					echo "Please enter a valid quantity.";
        				}
        			}
        		?>
      		</article>

      		<article class="entry">
        		<p>
          		<strong>AMD FirePro W2100 100-505980 2GB 128-bit DDR3 PCI Express 3.0 x16 Low Profile Video Cards - Workstation</strong>
        		</p>
        		<img src="w2100.jpg" alt="FirePro" style="width:400px;height:300px;">
        		<p>
          		<ul>
            		<li>FirePro W2100</li>
            		<li>2GB DDR3</li>
            		<li>PCI Express 3.0 x16</li>
          		</ul>
        		</p>
        		<p>
          		<strong>$114.99</strong>
        		</p>
        		<form method="post">
        			Quantity: <input type="text" name="w2100" id="w2100" size="1">
        			<input type="submit" value="Add to Cart" name="sub2100">
        		</form>
        		<?php
        			if (isset($_POST['sub2100'])){
        				if (is_numeric($_POST['w2100']) && $_POST['w2100'] > 0) {
        					$_SESSION['w2100'] = $_POST['w2100'];
        					echo "Amount in Cart: " . $_SESSION['w2100'];
        				}
        				else {
        					echo "Please enter a valid quantity.";
        				}
        			}
        		?>
      		</article>
      	</div>
	</body>

</html>