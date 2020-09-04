<?php
$stmt = $db->prepare("SELECT * FROM commande WHERE commande_user_id=? ORDER BY commande_status ASC");
$stmt->execute(array($_SESSION['id']));
$rows = $stmt->fetchAll();


?>
<div class="blank"></div>
<div class="container mt-3">
    <h2 class="text-center">Mes Commandes</h2>
    <br>
    <?php
    if (count($rows) == 0) {
        echo '<h5 class="text-center">Aucune Commande</h5>';
    } else { ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Etat de commande</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <?php
                foreach ($rows as $row) {
                    $myCommande = fetchOne('product', 'item_id',  $row['commande_item_id']);
                ?><form action="changeStatus.php" method="post">
                        <tr>
                            <input type="hidden" name="commande_id" value="<?php echo $row['commande_id'] ?>">
                            <td><img src="<?php echo $myCommande['item_image'] ?>" alt="<?php echo $myCommande['item_name'] ?>" style="height: 50px;"><?php echo $myCommande['item_name'] ?></td>
                            <td><?php echo $myCommande['item_price'] ?> Dh</td>
                            <td class="column"><?php $etat =  $row['commande_status'];
                                                if ($etat == '1ordered') {
                                                    echo 'En Attente de livraison ';
                                                } elseif ($etat == '2sent') {
                                                    echo 'A été envoyé';
                                                ?>
                                    <button href="#" name="sentToCompleted" class="btn btn-success">Confirmation réception</button>
                                <?php
                                                } elseif ($etat == '3completed') {
                                                    echo "Commande terminée";
                                                } ?>
                            </td>
                        </tr>
                    </form>
                <?php } ?>
            </tbody>
        </table>
    <?php }
    ?>


</div>