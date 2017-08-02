<?PHP
session_start();
header("Location: ./index.php");

function auth($login, $passwd) {
	$read_file = unserialize(file_get_contents("./users/accounts"));
	foreach ($read_file as $curr) {
		if ($curr["login"] == $login) {
			if ($curr["passwd"] == hash("whirlpool", $passwd))
				return TRUE;
		}
	}
	return FALSE;
}

if ($_POST["submit"] && $_POST["login"] && $_POST["passwd"]) {
	$_SESSION["login"] = $_POST["login"];
	$_SESSION["passwd"] = $_POST["passwd"];
}

if (!file_exists("./users/accounts")) {
	$_SESSION["admin_msg"] = "Error: No accounts exist, please create one";
}

if (auth($_SESSION["login"], $_SESSION["passwd"])) {
	$_SESSION["logged"] = $_SESSION["login"];
	$_SESSION["admin_msg"] = "Successfully logged in";
}

else {
	$_SESSION["logged"] = "";
	$_SESSION["admin_msg"] = "Error: User or Password Combination not found";
}

?>
