<?
session_start();
header("Location: ./cart.php");

$user_dir = "./users/";
$user_purchase = "./users/purchases";

if ($_SESSION["logged"] && $_SESSION["active_cart"]) {
	$new_purchase = array("login" => $_SESSION["logged"], "purchases" => $_SESSION["active_cart"]);
	if (file_exists($user_purchase)) {
		$read_file = unserialize(file_get_contents($user_purchase));
	}
	$read_file[] = $new_purchase;
	file_put_contents($user_purchase, serialize($read_file));
	$_SESSION["admin_msg"] = "Bought!";
	$_SESSION["active_cart"] = "";
}
else
	$_SESSION["admin_msg"] = "You must be signed in to checkout!";
?>
