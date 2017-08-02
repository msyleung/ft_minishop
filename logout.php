<?PHP
session_start();
$_SESSION["logged"] = "";
$_SESSION["active_cart"] = "";
header("Location: ./index.php");
?>
