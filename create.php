<?PHP
session_start();
header("Location: ./index.php");
$user_file = "./users/accounts";
$user_dir = "./users/";

if (!file_exists($user_dir))
	mkdir($user_dir);

if ($_POST["submit"] && $_POST["login"] && $_POST["passwd"]) {
	$new_user = array("login" => $_POST["login"], "passwd" => hash("whirlpool", $_POST["passwd"]));
	if (file_exists($user_file)) {
		$read_file = unserialize(file_get_contents($user_file));
		foreach ($read_file as $curr) {
			if ($curr["login"] == $new_user["login"]) {
				$_SESSION["admin_msg"] = "Username taken! Please try again";
				exit;
			}
		}
	}
	$read_file[] = $new_user;
	file_put_contents($user_file, serialize($read_file));
	$_SESSION["admin_msg"] = "User successfully created!";
	$_SESSION["logged"] = $_POST["login"];
}
else
	$_SESSION["admin_msg"] = "Something went wrong! Did you fill out all the fields?";
?>
