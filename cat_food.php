<?PHP
session_start();
$stock = unserialize(file_get_contents("./shop/stock"));
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
							<a href="admin_stock.php">Admin Setting</a>
							<a href="admin_user.php">Admin Setting2</a>
							<a href="settings.html">Delete account</a>
							<a href="logout.php">Log out</a>
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
foreach ($stock as $curr) {
	if ($curr["food"] == 1) {
		if ($i > 3) {
					echo "</tr><tr>";
							$i = 0;
						}
			echo "<td>".$curr["img"]."<br>";
			echo "".$curr["name"]."<br>";
			echo '<b>Price</b> :$'.$curr["price"].'<br>';
			echo "<form action='add_to_cart.php' method='post'>
			<input type='hidden' name='product_id' value=".$curr["id"].">
			<input type='text' size='2' maxlength='2' name='product_qty' value='1'/>
			<input type='submit' name='add' value='add to cart'></form></td>";
			$i++;
	}
}
?>
</td></tr></table>
</body>
<footer>
		<p style="background-color:dodgerblue;color:white">&copy;&nbsp;sleung&nbsp;&amp;&nbsp;rmanese 2017</p>
	</footer>
</html>