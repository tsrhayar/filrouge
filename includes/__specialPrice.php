<!-- Special Price -->
<?php

$stmt = $db->prepare("SELECT * FROM product ORDER BY RAND()");
$stmt->execute(array());
$rows = $stmt->fetchAll();

$stmt1 = $db->prepare("SELECT item_brand FROM product");
$stmt1->execute();
$rows1 = $stmt1->fetchAll();
$brands = [];
foreach ($rows1 as $row1) {
    array_push($brands, $row1["item_brand"]);
}
$unique = array_unique($brands);
sort($unique);

?>
<section id="special-price">
    <div class="container">
        <h4 class="font-rubik font-size-20">Prix ​​Spécial</h4>
        <div id="filters" class="button-group text-right font-baloo font-size-16">
            <button class="btn is-checked" data-filter="*">Tous Les Marque</button>
            <?php foreach ($unique as $brand) {
            ?>
                <button class="btn" data-filter=".<?php echo $brand ?>"><?php echo $brand ?></button>
            <?php
            }
            ?>
        </div>

        <div class="grid">
            <?php
            foreach ($rows as $row) {
            ?>
                <div class="grid-item <?php echo $row['item_brand'] ?> border">
                    <div class="item py-2" style="width: 200px;">
                        <div class="product font-rale">
                            <input type="hidden" name="item_id" value="<?php echo $row['item_id'] ?>">
                            <a href="product.php?item_id=<?php echo $row['item_id'] ?>"><img src="<?php echo $row['item_image'] ?>" alt="product<?php echo $row['item_id'] ?>" class="img-fluid"></a>
                            <div class="text-center">
                                <h6><?php echo $row['item_name'] ?></h6>
                                <div class="price py-2">
                                    <span><?php echo $row['item_price'] ?> Dh</span>
                                </div>
                                <?php if (isset($_SESSION['admin']) || isset($_SESSION['user'])) { ?>
                                    <form action="" method="POST">
                                        <a href="?do=addToCart&item_id=<?php echo $row['item_id'] ?>&user_id=<?php echo $_SESSION['id'] ?>" type="submit" class="btn btn-warning font-size-12">Ajouter au pannier</a>
                                    </form>
                                <?php } else { ?>
                                    <a href="login.php" class="btn btn-warning font-size-12">Ajouter au pannier</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
            ?>
        </div>
    </div>
</section>
<!-- !Special Price -->