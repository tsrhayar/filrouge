<?php

$do = isset($_GET['do']) ? $_GET['do'] : 'cart';

if ($do == 'cart') {

    include "./includes/__head.php";
    include "./includes/__navBar.php";
    include "./includes/__shoopingCart.php";
    include "./includes/__newPhones.php";
    include "./includes/__footer.php";
} elseif($do == "delete") {
    include "./includes/connect.php";
    include "./includes/deleteCart.php";

    header('location: cart.php');
    exit();
} elseif ($do == "addToCart") {
    include "./includes/connect.php";
    include "./includes/addToCart.php";

    header('location: cart.php');
    exit();
} elseif ($do == "addToCommande") {
    include "./includes/connect.php";
    include "./includes/addToCommande.php";

    header('location: cart.php');
    exit();
}