<?PHP
session_start();
header("Location: ./cart.php");
if ($_POST["add"] && $_POST["product_qty"] > 0) {
	$read_file = unserialize(file_get_contents("./shop/stock"));
	$i = 0;
	foreach ($read_file as $curr) {
		if ($curr["id"] == $_POST["product_id"])
			break ;
		$i++;
	}
	$item = $read_file[$i];
	if (!$_SESSION["active_cart"][$i]) {
		$_SESSION["active_cart"][$i] = $item;
		$_SESSION["active_cart"][$i]["qty"] = $_POST["product_qty"];
	}
	else {
		$_SESSION["active_cart"][$i]["qty"] += $_POST["product_qty"];
	}
}
?>
