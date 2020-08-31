<?php
$stmt = $db->prepare("SELECT * FROM commande ORDER BY RAND()");
$stmt->execute(array($_SESSION['id']));
$rows = $stmt->fetchAll();


?>
<div class="container mt-3">
    <h2 class="text-center">Mes Commandes</h2>
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
            ?>
                <tr>
                    <td><?php echo fetchOne('user', 'user_id',  $row['commande_user_id'])['user_username'] ?></td>
                    <td><?php echo fetchOne('product', 'item_id',  $row['commande_item_id'])['item_name'] ?></td>
                    <td><?php echo fetchOne('user', 'user_id',  $row['commande_user_id'])['user_adresse'] ?></td>
                    <td><?php echo fetchOne('user', 'user_id',  $row['commande_user_id'])['user_email'] ?></td>
                    <td><?php echo $row['commande_status'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <p>Note that we start the search in tbody, to prevent filtering the table headers.</p>
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