<?php
$user_id = $_GET['user_id'];
$item_id = $_GET['item_id'];

// echo $item_id;
// echo $user_id;

$stmt = $db->prepare("INSERT INTO cart (user_id, item_id) VALUES (?, ?)");
$stmt->execute(array($user_id, $item_id));