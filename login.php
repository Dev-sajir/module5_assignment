<?php
session_start();

$usersFile = 'users.json';

$users = file_exists($usersFile) ? json_decode(file_get_contents($usersFile), true) : [];

function saveUsers($users, $file)
{
    file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT));
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validation
    if (empty($email) || empty($password)) {
        $errorMsg = "Please fill in all the fields.";
    } elseif (!isset($users[$email]) || $users[$email]['password'] !== $password) {
        $errorMsg = "Invalid email or password.";
    } else {
        $_SESSION['email'] = $email;
        header('Location: admin.php');
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>User Registration and Login</title>
    <?php include 'bootstrap.php'; ?>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8 mx-auto">
                <h3 class="text-center mb-4">User Role Management App</h3>
                <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between">
                        <h3>User Login</h3>
                        <a href="ragistration.php" class="btn btn-info text-white">
                            Register
                        </a>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($errorMsg)) {
                            echo "<p>$errorMsg</p>";
                        }
                        ?>
                        <form class="form" method="POST">
                            <input class="form-control" type="email" name="email" placeholder="Email"><br>
                            <input class="form-control" type="password" name="password" placeholder="Password"><br>
                            <input class="btn btn-primary" type="submit" name="login" value="Login">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
