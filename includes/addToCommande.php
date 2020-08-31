<?php
$user_id = $_GET['user_id'];
$item_id = $_GET['item_id'];

$stmt = $db->prepare("INSERT INTO commande (commande_user_id, commande_item_id) VALUES (?, ?)");
$stmt->execute(array($user_id, $item_id));
$count = $stmt->rowCount();


$cart_id = $_GET['cart_id'];

$stmt = $db->prepare("DELETE FROM cart WHERE cart_id = ?");
$stmt->execute(array($cart_id));

header("location: commande.php");
exit();