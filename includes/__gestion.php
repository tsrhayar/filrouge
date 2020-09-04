<?php
$view = isset($_GET['view']) ? $_GET['view'] : "welcome";
$do = isset($_GET['do']) ? $_GET['do'] : "nothing";
$products = fetchAll('product');

if ($view == 'welcome' && $do == 'nothing') {
?>
  <div class="blank"></div>
  <div class="container">
    <h1 class="text-center">Gestion de Site</h1>
    <div class="card-group">
      <div class="card bg-warning">
        <div class="card-body text-center dashbord-card">
          <p class="card-text">Gestion des produits</p>
          <a class="btn btn-dark" href="?view=gestionProduits">Gérer</a>
        </div>
      </div>
      <div class="card bg-dark">
        <div class="card-body text-center dashbord-card">
          <p class="card-text text-light">Gestion des members</p>
          <a class="btn btn-warning" href="?view=gestionMembres">Gérer</a>
        </div>
      </div>
    </div>
  </div>
<?php } elseif ($view == 'gestionProduits' && $do == 'nothing') {
?>
  <div class="container">
    <div class="blank"></div>
    <h2>Gestion des produit</h2>
    <div class="table-responsive">
      <div class="container mt-3">
        <input class="form-control" id="myInput" type="text" placeholder="Chercher un produit..">
        <br>
        <table class="table table-hover">
          <thead>
            <tr>
              <th class="text-center align-middle">Id</th>
              <th class="text-center align-middle">Nom de Bricoleur</th>
              <th class="text-center align-middle">Ville</th>
              <th class="text-center align-middle">Catégorie</th>
              <th class="text-center align-middle">N° Téléphone</th>
              <th class="text-center align-middle">CIN</th>
              <th class="text-center align-middle">Controle</th>
            </tr>
          </thead>
          <tbody id="myTable">
            <a href="?view=gestionProduits&do=add" class="btn btn-primary mb-3">Ajouter Un Produit</a>
            <?php
            foreach ($products as $product) {
            ?>
              <tr>
                <td class="text-center align-middle"><?php echo $product['item_id'] ?></td>
                <td class="text-center align-middle"><img src="<?php echo $product['item_image'] ?>" alt="<?php echo $product['item_image'] ?>" style="height: 50px;"></td>
                <td class="text-center align-middle"><?php echo $product['item_brand'] ?></td>
                <td class="text-center align-middle"><?php echo $product['item_name'] ?></td>
                <td class="text-center align-middle"><?php echo $product['item_price'] ?> Dh</td>
                <td class="text-center align-middle"><?php echo $product['item_qte'] ?></td>
                <td class="text-center align-middle">
                  <a href="?view=gestionProduits&do=edit&item_id=<?php echo $product['item_id'] ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                  <a href="?view=gestionProduits&do=delete&item_id=<?php echo $product['item_id'] ?>" class="btn btn-danger confirm"><i class="fas fa-trash"></i></a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<?php
} elseif ($view == 'gestionProduits' && $do == 'add') {
?>
  <div class="container">
    <div class="blank"></div>
    <form action="?view=gestionProduits&do=insert" method="POST">
      <div class="form-group">
        <label for="exampleInputPassword1">Nom de marque</label>
        <input type="text" class="form-control" name="item_brand" placeholder="Nom de marque.." required>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Nom de téléphone</label>
        <input type="text" class="form-control" name="item_name" placeholder="Nom de téléphone.." required>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Prix de produit (Dh)</label>
        <input type="text" class="form-control" name="item_price" placeholder="Prix de produit (Dh).." required>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Nom de téléphone</label>
        <input type="file" class="form-control form-control" name="item_image" required>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Quantité de produit</label>
        <input type="number" class="form-control" name="item_qte" value="<?php echo $product['item_qte'] ?>" placeholder="Quantité de produit.." required>
      </div>
      <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
  </div>
<?php
} elseif ($view == 'gestionProduits' && $do == 'insert') {
  $item_brand = $_POST['item_brand'];
  $item_name = $_POST['item_name'];
  $item_price = $_POST['item_price'];
  $item_image = "./assets/products/" . $_POST['item_image'];
  $item_qte = $_POST['item_qte'];
  $stmt = $db->prepare("INSERT INTO product (item_brand, item_name, item_price, item_image, item_qte) VALUES (?, ?, ?, ?, ?)");
  $stmt->execute(array($item_brand, $item_name, $item_price, $item_image, $item_qte));

  header("location: gestion.php?view=gestionProduits");
  echo "./assets/products/" . $item_image;
} elseif ($view == 'gestionProduits' && $do == 'edit') {
  $product_id = $_GET['item_id'];
  $product = fetchOne('product', 'item_id', $product_id);
?>
  <div class="container">
    <div class="blank"></div>
    <form action="?view=gestionProduits&do=update" method="POST">
      <div class="form-group">
        <input type="hidden" class="form-control" name="item_id" value="<?php echo $product['item_id'] ?>" placeholder="Enter email" required>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Nom de marque</label>
        <input type="text" class="form-control" name="item_brand" value="<?php echo $product['item_brand'] ?>" placeholder="Nom de marque.." required>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Nom de téléphone</label>
        <input type="text" class="form-control" name="item_name" value="<?php echo $product['item_name'] ?>" placeholder="Nom de téléphone.." required>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Prix de produit (Dh)</label>
        <input type="text" class="form-control" name="item_price" value="<?php echo $product['item_price'] ?>" placeholder="Prix de produit (Dh).." required>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Quantité de produit</label>
        <input type="number" class="form-control" name="item_qte" value="<?php echo $product['item_qte'] ?>" placeholder="Quantité de produit.." required>
      </div>
      <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
  </div>
<?php
} elseif ($view == 'gestionProduits' && $do == 'update') {
  $item_id    = $_POST['item_id'];
  $item_brand = $_POST['item_brand'];
  $item_name  = $_POST['item_name'];
  $item_price = $_POST['item_price'];
  $item_qte   = $_POST['item_qte'];
  $stmt = $db->prepare("UPDATE product SET item_brand=?, item_name=?, item_price=?, item_qte=? WHERE item_id=?");
  $stmt->execute(array($item_brand, $item_name, $item_price, $item_qte,  $item_id));

  header("location: gestion.php?view=gestionProduits");
  exit();
} elseif ($view == 'gestionProduits' && $do == 'delete') {
  $item_id    = $_GET['item_id'];
  $stmt = $db->prepare("DELETE FROM product WHERE item_id = ?");
  $stmt->execute(array($item_id));

  header("location: gestion.php?view=gestionProduits");
} ?>