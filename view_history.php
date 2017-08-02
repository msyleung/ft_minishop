<?PHP
session_start();
$admin = "mastercat";
$user_purchase = "./users/purchases";
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
<?PHP
if ($_POST["name"] && $_POST["view"] && $admin == $_SESSION["logged"]) {
	if (!file_exists($user_purchase)) {
		echo "No purchases have ever been made on this website<br>";
		exit();
	}
	$read_file = unserialize(file_get_contents($user_purchase));
	$found = 0;
	echo "<center><h1>".$_POST["name"]."</h1>";
	echo "<table><tr><td>";
	foreach ($read_file as $key => $value) {
		if ($_POST["name"] == $value["login"]) {
			$total = 0;
			foreach ($value["purchases"] as $cart) {
				$found = 1;
				echo $cart["name"]." x ".$cart["qty"]." || ";
				echo "$".$cart["price"]."<br>";
				$total += $cart["price"]*$cart["qty"];
			}
		}
		if ($found)
			echo "<br>".$_POST["name"]." spent $".$total." in this transaction<br><br>";
	}
	if (!$found)
		echo "No purchases have been made by this user yet<br>";
}
echo "<br><a href='./admin_user.php'>Back</a>";
?>
</td></tr></table>
</body>
<footer>
		<p style="background-color:dodgerblue;color:white">&copy;&nbsp;sleung&nbsp;&amp;&nbsp;rmanese 2017</p>
	</footer>
</html>
