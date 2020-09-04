<?php
$stmt = $db->prepare("SELECT * FROM commande ORDER BY commande_status ASC");
$stmt->execute(array());
$rows = $stmt->fetchAll();


?>
<div class="container mt-3">
    <h2 class="text-center">Tous Les Commandes</h2>
    <input class="form-control" id="myInput" type="text" placeholder="Search..">
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom de client</th>
                <th>Produit</th>
                <th>Adress</th>
                <th>Email</th>
                <th>Etat de commande</th>
            </tr>
        </thead>
        <tbody id="myTable">
            <?php
            foreach ($rows as $row) {
                $user = fetchOne('user', 'user_id',  $row['commande_user_id']);
                $product = fetchOne('product', 'item_id',  $row['commande_item_id']);
                $etat = $row['commande_status'];
            ?>
                <form action="changeStatus.php" method="post">
                    <tr>
                        <input type="hidden" name="commande_id" value="<?php echo $row['commande_id'] ?>">
                        <td><?php echo $user['user_username'] ?></td>
                        <td><?php echo $product['item_name'] ?></td>
                        <td><?php echo $user['user_adresse'] ?></td>
                        <td><?php echo $user['user_email'] ?></td>
                        <td class="column"><?php if ($etat == '1ordered') {  ?>
                                <p class="bg-danger text-light text-center">En Attente de livraison </p>
                                <button name="orderedToSent" class="btn btn-primary btn-sm text-center">Livrée </button>
                            <?php } elseif ($etat == '2sent') {
                                echo '<p class="bg-primary text-light text-center">A été envoyé </p>';
                            } elseif ($etat == '3completed') {
                                echo '<p class="bg-success text-light text-center">Commande terminée </p>';
                            } ?>
                        </td>
                </form>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>