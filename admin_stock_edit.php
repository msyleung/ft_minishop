<?PHP
session_start();
header("Location: ./admin_stock.php");

$admin = "mastercat";
$stock = unserialize(file_get_contents("./shop/stock"));

if ($_POST["add"] && $_POST["name"] && $_POST["price"] && $_POST["img"] &&
	($_POST["food"] || $_POST["toy"] || $_POST["util"] || $_POST["furn"])) {
		$item = end($stock);
		$new_item = array("id" => $item["id"] + 1,
			"name" => $_POST["name"],
			"price" => $_POST["price"],
			"img" => "<img src='".$_POST["img"]."' height=200px width=200px>",
			"food" => $_POST["food"],
			"toy" => $_POST["toy"],
			"util" => $_POST["util"],
			"furn" => $_POST["furn"]
		);
		$stock[] = $new_item;
		file_put_contents("./shop/stock", serialize($stock));
		$_SESSION["admin_stock_msg"] = "Item successfully added";
	}

else if ($_POST["del"] && $_POST["name"] && $_POST["price"] &&
	($_POST["food"] || $_POST["toy"] || $_POST["util"] || $_POST["furn"])) {
		$del_item = array("name" => $_POST["name"],
			"price" => $_POST["price"],
			"img" => "<img src='".$_POST["img"]."' height=200px width=200px>",
			"food" => $_POST["food"],
			"toy" => $_POST["toy"],
			"util" => $_POST["util"],
			"furn" => $_POST["furn"]
		);
		$match = -1;
		foreach($stock as $key => $item_arr) {
			if ($item_arr["name"] == $del_item["name"]) {
				if ($item_arr["price"] == $del_item["price"])
					$match = $key;
			}
		}
		if ($match > -1) {
			unset($stock[$key]);
			file_put_contents("./shop/stock", serialize($stock));
			$_SESSION["admin_stock_msg"] = "Item successfully deleted";
		}
		else
			$_SESSION["admin_stock_msg"] = "Item not found, could not be deleted";
	}
else
	$_SESSION["admin_stock_msg"] = "Something wrong happened!";
?>
