<?PHP
session_start();
header("Location: ./admin_user.php");

$admin = "mastercat";
$user_file = "./users/accounts";

if ($admin == $_SESSION["logged"] && $_POST["del"] && $_POST["name"] != $admin) {
	$read_file = unserialize(file_get_contents($user_file));
	foreach ($read_file as $key => $value) {
		if ($value["login"] == $_POST["name"]) {
			$match = $key;
			break ;
		}
	}
	if ($match) {
		unset($read_file[$match]);
		file_put_contents($user_file, serialize($read_file));
		$_SESSION["admin_msg"] = "Account deleted!";
	}
	else
		$_SESSION["admin_msg"] = "User does not exist!";
}
else
	$_SESSION["admin_msg"] = "Don't delete the admin account";
?>
