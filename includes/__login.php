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
        $password = $_POST['password'];

        $stmt = $db->prepare("SELECT user_id, user_username, user_password FROM user WHERE user_username = ? AND user_password = ? AND user_role = ?");
        $stmt->execute(array($username, $password, "admin"));
        $row = $stmt->fetch();
        $count = $stmt->rowCount();

        if ($count > 0) {
            $_SESSION['admin'] = $username;
            $_SESSION['id'] = $row['user_id'];
            header('location: index.php');
            exit();
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $db->prepare("SELECT user_id, user_username, user_password FROM user WHERE user_username = ? AND user_password = ? AND user_role = ?");
        $stmt->execute(array($username, $password, "user"));
        $row = $stmt->fetch();
        $count = $stmt->rowCount();

        if ($count > 0) {
            $_SESSION['user'] = $username;
            $_SESSION['id'] = $row['user_id'];
            header('location: index.php');
            exit();
        }
    }
}
?>

<div class="container my-5">
    <h1 class="text-center text-info">Login</h1>
    <form class="px-sm-5" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <label for="username" class="mr-sm-2">Email address</label>
        <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Enter email" name="username" id="username">
        <label for="password" class="mr-sm-2">Password:</label>
        <input type="password" class="form-control mb-2 mr-sm-2" placeholder="Enter password" name="password" id="password">
        <button type="submit" class="btn btn-primary mb-2">Submit</button>
        <br>
        <small> <a href="signup.php">S'inscrire</a> </small>
    </form>
</div>