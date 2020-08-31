<?php

$do = isset($_GET['do']) ? $_GET['do'] : 'product';

if ($do == 'product') {
    include "./includes/__head.php";
    include "./includes/__navBar.php";
    include "./includes/__owlCarousel.php";
    include "./includes/__topSale.php";
    include "./includes/__specialPrice.php";
    include "./includes/__newPhones.php";
    include "./includes/__footer.php";
} elseif ($do == "addToCart") {
    include "./includes/connect.php";
    include "./includes/addToCart.php";

    header('location: cart.php');
    exit();
}
