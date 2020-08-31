<?php
$stmt = $db->prepare("SELECT * FROM commande WHERE commande_user_id=? ORDER BY RAND()");
$stmt->execute(array($_SESSION['id']));
$rows = $stmt->fetchAll();


?>
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
                    <th>Etat de commande</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <?php
                foreach ($rows as $row) {
                ?>
                    <tr>
                        <td><?php echo fetchOne('product', 'item_id',  $row['commande_item_id'])['item_name'] ?></td>
                        <td><?php $etat =  $row['commande_status'];
                            if ($etat == 'ordered') {
                                echo 'En Attente de livraison';
                            } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php }
    ?>


</div>

<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>