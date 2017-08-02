<?PHP
session_start();
header("Location: ./index.php");

$user_file = "./users/accounts";

if ($_POST["submit"]) {
	if ($_POST["login"] == $_SESSION["logged"]) {
		$read_file = unserialize(file_get_contents($user_file));
		$match = -1;
		foreach ($read_file as $key => $value) {
			if ($value["login"] == $_POST["login"]) {
				$match = $key;
				break ;
			}
		}
		if ($match > 0 && ($read_file[$match]["passwd"] == hash("whirlpool", $_POST["passwd"]))) {
			unset($read_file[$$match]);
			file_put_contents($user_file, serialize($read_file));
			$_SESSION["logged"] = "";
			$_SESSION["admin_msg"] = "Account deleted!";
		}
		else
			$_SESSION["admin_msg"] = "Wrong User/Password Combination";
		}
	else
		$_SESSION["admin_msg"] = "Wrong Username";
}
else
	$_SESSION["admin_msg"] = "Something went wrong! Please contact an admin!";
?>
