<?php
if (isset($_GET['item_id'])) {

    $idOfItem = $_GET['item_id'];

    $stmt = $db->prepare("SELECT * FROM product WHERE item_id = ? LIMIT 1");
    $stmt->execute(array($idOfItem));
    $rows = $stmt->fetchAll();

    foreach ($rows as $row) {

?>

        <!--   product  -->
        <div class="blank"></div>
        <section id="product" class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <input type="hidden" name="item_id" value="<?php echo $row['item_id'] ?>">
                        <img src="<?php echo $row['item_image'] ?>" alt="product" class="img-fluid">
                        <div class="form-row pt-4 font-size-16 font-baloo">
                            <?php if (isset($_SESSION['admin']) || isset($_SESSION['user'])) { ?>
                                <div class="col">
                                    <button type="submit" class="btn btn-danger form-control">Acheter</button>
                                </div>
                                <div class="col">
                                    <form method="POST" action="?do=addToCart&item_id=<?php echo $row['item_id'] ?>&user_id=<?php echo $_SESSION['id'] ?>">
                                        <button type="submit" class="btn btn-warning form-control">Ajouter Au Pannier</button>
                                    </form>
                                </div>
                            <?php } else {
                            } ?>

                            <div class="col">
                                <a href="login.php" type="submit" class="btn btn-danger form-control">Acheter</a>
                            </div>
                            <div class="col">
                                <a href="login.php" type="submit" class="btn btn-warning form-control">Ajouter Au Pannier</a>
                            </div>
                            <?php ?>
                        </div>
                    </div>
                    <div class="col-sm-6 py-5">
                        <h5 class="font-baloo font-size-20"><?php echo $row['item_name'] ?></h5>
                        <small>by <?php echo $row['item_brand'] ?></small>
                        <hr class="mb-1">

                        <!---    product price       -->
                        <table class=" my-3">

                            <tr class="font-rale font-size-14">
                                <td>Deal Price:</td>
                                <td class="font-size-20 text-danger">$<span><?php echo $row['item_price'] ?> Dh</span><small class="text-dark font-size-12">&nbsp;&nbsp;Inclusive of all taxes</small></td>
                            </tr>
                        </table>
                        <!---    !product price       -->

                        <!--    #policy -->
                        <div id="policy">
                            <div class="d-flex">
                                <div class="return text-center mr-5">
                                    <div class="font-size-20 my-2 color-second">
                                        <span class="fas fa-retweet border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-rale font-size-12">10 Days <br> Replacement</a>
                                </div>
                                <div class="return text-center mr-5">
                                    <div class="font-size-20 my-2 color-second">
                                        <span class="fas fa-truck  border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-rale font-size-12">Daily Tuition <br>Deliverd</a>
                                </div>
                                <div class="return text-center mr-5">
                                    <div class="font-size-20 my-2 color-second">
                                        <span class="fas fa-check-double border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-rale font-size-12">1 Year <br>Warranty</a>
                                </div>
                            </div>
                        </div>
                        <!--    !policy -->

                        <hr>

                        <!-- order-details -->
                        <div id="order-details" class="font-rale d-flex flex-column text-dark">
                            <small>Delivery by : Mar 29 - Apr 1</small>
                            <small>Sold by <a href="#">Daily Electronics </a>(4.5 out of 5 | 18,198 ratings)</small>
                            <small><i class="fas fa-map-marker-alt color-primary"></i>&nbsp;&nbsp;Deliver to Customer -
                                424201</small>
                        </div>
                        <!-- !order-details -->

                        <div class="row">
                            <div class="col-6">
                                <!-- color -->
                                <div class="color my-3">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="font-baloo">Color:</h6>
                                        <div class="p-2 color-yellow-bg rounded-circle"><button class="btn font-size-14"></button></div>
                                        <div class="p-2 color-primary-bg rounded-circle"><button class="btn font-size-14"></button></div>
                                        <div class="p-2 color-second-bg rounded-circle"><button class="btn font-size-14"></button></div>
                                    </div>
                                </div>
                                <!-- !color -->
                            </div>
                            <div class="col-6">
                                <!-- product qty section -->
                                <div class="qty d-flex">
                                    <h6 class="font-baloo">Qty</h6>
                                    <div class="px-4 d-flex font-rale">
                                        <input type="number" value="1" min="1" max="10">
                                    </div>
                                </div>
                                <!-- !product qty section -->
                            </div>
                        </div>

                        <!-- size -->
                        <div class="size my-3">
                            <h6 class="font-baloo">Size :</h6>
                            <div class="d-flex justify-content-between w-75">
                                <div class="font-rubik border p-2">
                                    <button class="btn p-0 font-size-14">4GB RAM</button>
                                </div>
                                <div class="font-rubik border p-2">
                                    <button class="btn p-0 font-size-14">6GB RAM</button>
                                </div>
                                <div class="font-rubik border p-2">
                                    <button class="btn p-0 font-size-14">8GB RAM</button>
                                </div>
                            </div>
                        </div>
                        <!-- !size -->


                    </div>

                    <div class="col-12">
                        <h6 class="font-rubik">Product Description</h6>
                        <hr>
                        <p class="font-rale font-size-14">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat
                            inventore vero numquam error est ipsa, consequuntur temporibus debitis nobis sit, delectus officia
                            ducimus dolorum sed corrupti. Sapiente optio sunt provident, accusantium eligendi eius reiciendis
                            animi? Laboriosam, optio qui? Numquam, quo fuga. Maiores minus, accusantium velit numquam a aliquam
                            vitae vel?</p>
                        <p class="font-rale font-size-14">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat
                            inventore vero numquam error est ipsa, consequuntur temporibus debitis nobis sit, delectus officia
                            ducimus dolorum sed corrupti. Sapiente optio sunt provident, accusantium eligendi eius reiciendis
                            animi? Laboriosam, optio qui? Numquam, quo fuga. Maiores minus, accusantium velit numquam a aliquam
                            vitae vel?</p>
                    </div>
                </div>
            </div>
        </section>
        <!--   !product  -->
<?php
    }
} else {
    header("location: index.php");
}
?>