<!-- start #header -->
<header id="header">
    <?php if (isset($_SESSION['admin']) || isset($_SESSION['user'])) {
    ?>
        <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
            <div class="font-rale ml-auto font-size-14">
                <a href="logout.php" class="px-3 border-right border-left text-dark">Se Deconnecter</a>
            </div>
        </div>
    <?php } else {
    ?>
        <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
            <div class="font-rale ml-auto font-size-14">
                <a href="login.php" class="px-3 text-dark">Se Connecter</a>
                <a href="signup.php" class="px-3 border-left text-dark">S'inscrire</a>
            </div>
        </div>
    <?php

    } ?>
    <!-- Primary Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark color-second-bg">
        <a class="navbar-brand" href="index.php">iShop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav m-auto font-rubik">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <?php if (isset($_SESSION['admin']) || isset($_SESSION['user'])) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="commande.php">Mes Commandes</a>
                    </li>
                    
                <?php }
                ?>
                 <?php if (isset($_SESSION['admin'])) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="allCommande.php">Tous les Commandes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gestion.php">Gestion</a>
                    </li>
                <?php }
                ?>
            </ul>
            <?php if (isset($_SESSION['admin']) || isset($_SESSION['user'])) {
            ?>
                <form action="#" class="font-size-14 font-rale">
                    <a href="cart.php" class="py-2 rounded-pill color-primary-bg">
                        <span class="font-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
                        <span class="px-3 py-2 rounded-pill text-dark bg-light">
                            <?php
                            $session  = $_SESSION["id"];
                            $stmt = $db->prepare("SELECT * FROM cart WHERE user_id = ?");
                            $stmt->execute(array($session));
                            $carts = $stmt->fetchAll();

                            echo count($carts);
                            ?>
                        </span>
                    </a>
                </form>
            <?php } ?>

        </div>
    </nav>
    <!-- !Primary Navigation -->

</header>
<!-- !start #header -->