<!-- Shopping cart section  -->
<section id="cart" class="py-3">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Shopping Cart</h5>

        <?php

        $session  = $_SESSION['id'];

        $stmt = $db->prepare("SELECT * FROM cart WHERE user_id = ? ORDER BY cart_id DESC");
        $stmt->execute(array($session));
        $carts = $stmt->fetchAll();

        ?>

        <!--  shopping cart items   -->
        <div class="row">
            <div class="col-sm-12" id="carts">
                <?php
                foreach ($carts as $cart) {
                    $stmt = $db->prepare("SELECT * FROM product WHERE item_id = ?");
                    $stmt->execute(array($cart['item_id']));
                    $rows = $stmt->fetchAll();

                    foreach ($rows as $row) {
                ?>
                        <!-- cart item -->
                        <div class="row border-top py-3 mt-3">
                            <input type="hidden" name="item_id" value="<?php echo $row['item_id'] ?>">
                            <div class="col-sm-2">
                                <img src="<?php echo $row['item_image'] ?>" style="height: 120px;" alt="cart<?php echo $row['item_name'] ?>" class="img-fluid">
                            </div>
                            <div class="col-sm-8">
                                <h5 class="font-baloo font-size-20"><?php echo $row['item_name'] ?></h5>
                                <small>by <?php echo $row['item_brand'] ?></small>
                                <!-- product qty -->
                                <div class="qty d-flex pt-2">
                                    <div class="d-flex font-rale w-25">
                                        <!-- <input type="number" value="1" min="1" max="10"> -->
                                    </div>
                                    <form action="" method="POST">
                                        <a type="submit" href="?do=addToCommande&item_id=<?php echo $row['item_id'] ?>&user_id=<?php echo $_SESSION['id'] ?>&cart_id=<?php echo $cart['cart_id'] ?>" class="btn btn-primary font-baloo text-white px-3">Acheter</a>
                                        <a type="submit" href="?do=delete&cart_id=<?php echo $cart['cart_id'] ?>" class="btn font-baloo text-danger px-3">Supprimer</a>
                                    </form>
                                </div>
                                <!-- !product qty -->
                            </div>
                            <div class="col-sm-2 text-right">
                                <div class="font-size-20 text-danger font-baloo">
                                    <span class="product_price"><?php echo $row['item_price'] ?> DH</span>
                                </div>
                            </div>
                        </div>
                        <!-- !cart item -->
                <?php
                    }
                } ?>
            </div>

        </div>
        <!--  !shopping cart items   -->
    </div>
</section>
<!-- * Script -->
<!-- ! Script -->
<!-- !Shopping cart section  -->