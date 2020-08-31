<!-- Top Sale -->
<section id="top-sale">
    <div class="container py-5">
        <h4 class="font-rubik font-size-20">Meilleures Ventes</h4>
        <hr>
        <!-- owl carousel -->

        <div class="owl-carousel owl-theme">
            <?php

            $stmt = $db->prepare("SELECT * FROM product ORDER BY RAND()");
            $stmt->execute(array());
            $rows = $stmt->fetchAll();
            foreach ($rows as $row) {

            ?>
                <div class="item py-2">
                    <div class="product font-rale">
                        <input type="hidden" name="item_id" value="<?php echo $row['item_id'] ?>">
                        <a href="product.php?item_id=<?php echo $row['item_id'] ?>"><img src="<?php echo $row['item_image'] ?>" alt="product<?php echo $row['item_id'] ?>" class="img-fluid"></a>
                        <div class="text-center">
                            <h6><?php echo $row['item_name'] ?></h6>
                            <div class="price py-2">
                                <span><?php echo $row['item_price'] ?> Dh</span>
                            </div>
                            <?php
                            if (isset($_SESSION['admin']) || isset($_SESSION['user'])) { ?>
                                <form action="" method="POST">
                                    <a href="?do=addToCart&item_id=<?php echo $row['item_id'] ?>&user_id=<?php echo $_SESSION['id'] ?>" type="submit" class="btn btn-warning font-size-12">Ajouter au pannier</a>
                                </form>
                            <?php } else { ?>
                                <a href="login.php" class="btn btn-warning font-size-12">Ajouter au pannier</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php }
            ?>
        </div>
        <!-- !owl carousel -->
    </div>
</section>
<!-- Top Sale -->