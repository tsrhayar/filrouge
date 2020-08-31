<?php

$item_id = $_GET['cart_id'];

$stmt = $db->prepare("DELETE FROM cart WHERE cart_id = ?");
$stmt->execute(array($item_id));
