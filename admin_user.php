<?PHP
session_start();
$admin = "mastercat";
?>
<html><head>
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
	if ($admin == $_SESSION["logged"]) {
	$user_file = "./users/accounts";
	$read_file = unserialize(file_get_contents($user_file));

	echo "<center>";
	echo "<h1>List of users:</h1>";

	echo "<table width=300px><tr>";
	foreach ($read_file as $curr) {
		echo "<td>".$curr["login"]."    ";
		echo "<form action='view_history.php' method='post'>
			<input type='hidden' name='name' value='".$curr["login"]."'></td><td>
			<input type='submit' name='view' value='View Purchase History'></form>";
		echo "</td></tr><tr>";
	}
	echo "</tr></table>";

	if ($_SESSION["admin_msg"]) {
		echo "<p>".$_SESSION["admin_msg"]."<br>";
		$_SESSION["admin_msg"] = "";
	}
	echo "<form action='admin_user_edit.php' method='post'>";
	echo "User: <input type='text' name='name' value=''>";
	echo "<input type='submit' name='del' value='Delete'>";
	echo "</form><br>";
}
else
	echo "you do not have admin privileges\n";
?>
</body>
<footer>
		<p style="background-color:dodgerblue;color:white">&copy;&nbsp;sleung&nbsp;&amp;&nbsp;rmanese 2017</p>
	</footer>
</html>
