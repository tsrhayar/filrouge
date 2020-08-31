<?php

if (isset($_POST['upload'])) {
    $file = $_FILES['image']['name'];
    echo $file;
}

?>

<div class="container my-5">
    <h1 class="text-center text-info">Login</h1>
    <form class="px-sm-5" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
        <label for="username" class="mr-sm-2">Email address</label>
        <input type="file" class="form-control mb-2 mr-sm-2" placeholder="Enter email" name="image">
        <button type="submit" class="btn btn-primary mb-2" name="upload">Submit</button>
    </form>
</div>

//


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