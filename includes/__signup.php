<div class="container my-5">
    <h1 class="text-center text-info">Inscription</h1>

    <?php
    if (isset($_SESSION['admin']) || isset($_SESSION['user'])) {
        header('location: index.php');
        exit();
    } elseif (isset($_SESSION['user'])) {
        header('location: dashbord.php');
        exit();
    } else {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmpassword = $_POST['confirmpassword'];

            if (checkIfExists("user_username", "user", $username) > 0) {
                echo '<div class="container">
            <div class="alert alert-danger alert-dismissible m-0">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Danger!</strong> Nom d\'utilisateur deja kayn</div>
            </div>';
            } elseif (checkIfExists("user_email", "user", $email) > 0) {
                echo '<div class="container">
            <div class="alert alert-danger alert-dismissible m-0">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Danger!</strong> Email deja kayn</div>
            </div>';
            } else {
                if ($password == $confirmpassword) {
                    $stmt = $db->prepare("INSERT INTO user ( user_username, user_email, user_password) VALUES (?, ?, ?)");
                    $stmt->execute(array($username, $email, $password));
                    $count = $stmt->rowCount();
                    if ($count > 0) {
                        echo '<div class="container"><div class="alert alert-success alert-dismissible m-0">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Vous avez enregistré avec succès</div></div>';
                    }
                } else {
                    echo '<div class="container"><div class="alert alert-danger alert-dismissible m-0">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Danger!</strong> Confirmer votre mot de passe</div></div>';
                }
            }

            // if (checkIfExists("user_username", "user", $username) < 1) {
            //     if ($password == $confirmpassword) {
            //         $stmt = $db->prepare("INSERT INTO user ( user_username, user_email, user_password) VALUES (?, ?, ?)");
            //         $stmt->execute(array($username, $email, $password));
            //         $count = $stmt->rowCount();
            //         if ($count > 0) {
            //             echo '<div class="container"><div class="alert alert-success alert-dismissible m-0">
            //         <button type="button" class="close" data-dismiss="alert">&times;</button>
            //         Vous avez enregistré avec succès</div></div>';
            //         }
            //     } else {
            //         echo '<div class="container"><div class="alert alert-danger alert-dismissible m-0">
            //         <button type="button" class="close" data-dismiss="alert">&times;</button>
            //         <strong>Danger!</strong> Confirmer votre mot de passe</div></div>';
            //     }
            // } else {
            //     echo '<div class="container">
            //     <div class="alert alert-danger alert-dismissible m-0">
            //     <button type="button" class="close" data-dismiss="alert">&times;</button>
            //     <strong>Danger!</strong> Nom d\'utilisateur deja kayn</div>
            //     </div>
            //     ';
            // }
        }
    }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <label for="username" class="mr-sm-2">Nom D'Utilisateur</label>
        <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Enter email" name="username" required autocomplete="off">
        <label for="username" class="mr-sm-2">Email</label>
        <input type="email" class="form-control mb-2 mr-sm-2" placeholder="Enter email" name="email" required autocomplete="off">
        <label for="password" class="mr-sm-2">Mot De Passe:</label>
        <input type="password" class="form-control mb-2 mr-sm-2" placeholder="Enter password" name="password" required autocomplete="off">
        <label for="password" class="mr-sm-2">Confirmer Mot De Passe:</label>
        <input type="password" class="form-control mb-2 mr-sm-2" placeholder="Enter password" name="confirmpassword" required autocomplete="off">
        <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </form>
</div>