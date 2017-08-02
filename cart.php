<?PHP
session_start();
?>
<html>
	<head>
		<title>maobao</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/flex.css" />
		<link rel="stylesheet" type="text/css" href="css/dropdown.css" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arvo|Chewy">
	</head>
	<body>
		<div class="menu-container">
			<div class="menu">
			<div id="nav-login">
<?PHP
if ($_SESSION["logged"])
	echo "Logged in as ".$_SESSION["logged"];
else
	echo '<a class="link-edit" href="login.html">Login | Sign up</a>';
?>
			</div>
				<div class="dropdown">
					<button class="dropbtn">Categories</button>
						<div class="dropdown-content">
							<a href="cat_food.php">Cat food</a>
							<a href="furniture.php">Furniture</a>
							<a href="cat_toys.php">Toys</a>
							<a href="utilities.php">Utilities</a>
						</div>
				</div>
				<div class="cart"><a class="link-edit" href="cart.php">*cart</a></div>
				<div class="dropdown">
					<img class="setting-dropbtn" id="gear" src="img/gear.png" />
						<div class="dropdown-content">
							<a href="logout.php">Log out</a>
							<a href="settings.html">Delete account</a>
						</div>
				</div>
			</div>
		</div>
		<div class="header-container">
			<div class="header">
				<div class="company">MaoBao Supplies</div>
				<div class="logo"><a href=./index.php><img src="img/neko.png" /></a></div>
				<div class="social"><img src="img/social-icons.svg" /></div>
			</div>
		</div>
<table><tr>
<?PHP
echo "<h2 style='text-align: center'>Shopping Cart</h2>";

if ($_SESSION["admin_msg"]) {
	echo "<center>".$_SESSION["admin_msg"]."<br>";
	$_SESSION["admin_msg"] = "";
}

if ($_SESSION["active_cart"] && count($_SESSION["active_cart"]) > 0) {
	echo "<form method='post' action='update_cart.php'>";

	$total = 0;
	foreach ($_SESSION["active_cart"] as $cart_item) {
		$product_name = $cart_item["name"];
		$product_id = $cart_item["id"];
		$product_price = $cart_item["price"];
		$product_desc = $cart_item["desc"];
		$product_img = $cart_item["img"];
		$product_qty = $cart_item["qty"];
		if ($i > 3) {
			echo "</tr><tr>";
			$i = 0;
		}
		echo "<td>".$product_img."<br>";
		echo "<b><font size=4>".$product_name."</font></b><br>";
		echo "<font size=2>Price: $".$product_price."<br>";
		echo "Qty: <input text='text' size='2' maxlength='2' name='qty[".$product_id."]' value='".$product_qty."' /><br>";
		$subtotal = ($product_price * $product_qty);
		echo "$".$subtotal."</font><br>";
		echo "<button input type='submit' name='remove' value='".$product_id."'>Remove</button><br></td>";
		$total = $total + $subtotal;
		$i++;
	}
	echo "<p align='center'>Total: $$total<br>";
//	echo "<button id='cart-btn' type='submit'>Update</button>";
	echo "</form>";
	echo "<button id='cart-btn'><a href='./remove_cart.php'>Remove cart</a></button>";
	echo "<button id='cart-btn'><a href='./checkout.php'>Checkout</a></button>";
}
else {
	echo "<br><center>Nothing in cart!<br><br>";
	echo "<button><a href=./index.php>Continue Shopping</a></button>";
}
?>
</tr></table>
	</body>
	<footer>
		<p style="background-color:dodgerblue;color:white">&copy;&nbsp;sleung&nbsp;&amp;&nbsp;rmanese 2017</p>
	</footer>
</html>
