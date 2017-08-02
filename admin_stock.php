<?PHP
session_start();
$admin = "mastercat";

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
<?PHP
echo "<center><h1>Add or Delete Inventory</h1>";
?>
<table><tr>
<?PHP
if ($admin == $_SESSION["logged"]) {
	foreach ($stock as $curr) {
		if ($i > 3) {
			echo "</tr><tr>";
			$i = 0;
		}
		echo "<td>".$curr["img"]."<br>";
		echo "".$curr["name"]."</td>";
		$i++;
	}
?>
</td></tr></table>
<p>
<?PHP
	if ($_SESSION["admin_stock_msg"]) {
		echo $_SESSION["admin_stock_msg"]."<br>";
		$_SESSION["admin_stock_msg"] = "";
	}

	echo "<form action='admin_stock_edit.php' method='post' align='left'>";
	echo "Item name: <input type='text' name='name' value=''>";
	echo "<br>";
	echo "Price: <input type='text' name='price' value=''>";
	echo "<br>";
	echo "Img URL: <input type='text' name='img' value=''>";
	echo "<br>";
	echo "Category: <input type='checkbox' name='food' value='1'> food";
	echo " <input type='checkbox' name='toy' value='1'> toy";
	echo " <input type='checkbox' name='util' value='1'> utility";
	echo " <input type='checkbox' name='furn' value='1'> furniture";
	echo "<br>";
	echo "<input type='submit' name='add' value='Add'>";
	echo "<input type='submit' name='del' value='Delete'>";
	echo "</form>";
}
else
	echo "you do not have admin privileges\n";
?>
</body>
<footer>
		<p style="background-color:dodgerblue;color:white">&copy;&nbsp;sleung&nbsp;&amp;&nbsp;rmanese 2017</p>
	</footer>
</html>
