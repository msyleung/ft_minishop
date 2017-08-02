<?PHP
session_start();
header("Location: ./cart.php");

if ($_POST["remove"]) {
	$prod_id = $_POST["remove"];
	$match = -1;
	foreach ($_SESSION["active_cart"] as $key => $value) {
		if ($prod_id == $value["id"]) {
			$match = $key;
		}
	}
	if ($match > -1) {
		unset($_SESSION["active_cart"][$match]);
	}
}
?>
