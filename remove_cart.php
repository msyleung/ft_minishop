<?PHP
session_start();
$_SESSION["active_cart"] = "";
header("Location: ./cart.php");
?>
