<?php
session_start();

function checkuserstatus()
{
    if (isset($_SESSION['email'])) {
        echo "you are logged in<br>";
        echo "<a href='logout.php'>click here to logout</a>";
    } else {
        header("Location: login.php");
    }
}

?>





<!DOCTYPE html>
<html>

<head>
    <title>User Registration and Login</title>
    <?php
    include 'bootstrap.php';
    ?>
</head>

<body>
    <!-- overlay -->
    <div id="sidebar-overlay" class="overlay w-100 vh-100 position-fixed d-none"></div>

    <!-- sidebar -->
    <div class="col-md-3 col-lg-2 px-0 position-fixed h-100 bg-white shadow-sm sidebar" id="sidebar">
        <h1 class="bi bi-bootstrap text-primary d-flex my-4 justify-content-center"></h1>
        <div class="list-group rounded-0">
            <a href="#" class="list-group-item list-group-item-action active border-0 d-flex align-items-center">
                <span class="bi bi-border-all"></span>
                <span class="ml-2">Dashboard</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action border-0 align-items-center">
                <span class="bi bi-box"></span>
                <span class="ml-2">Users</span>
            </a>


            <button class="list-group-item list-group-item-action border-0 d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#sale-collapse">
                <div>
                    <span class="bi bi-cart-dash"></span>
                    <span class="ml-2"> <?php checkuserstatus(); ?></span>
                </div>
                <span class="bi bi-chevron-down small"></span>
            </button>
        </div>
    </div>

    <div class="col-md-9 col-lg-10 ml-md-auto px-0 ms-md-auto p-5">
        <h2 class="text-center">Manager</h2>
        <!-- main content -->
        <main class="p-4 mt-4 min-vh-100">
            <div class="jumbotron jumbotron-fluid rounded bg-white border-0 shadow-sm border-left px-4 py-4">
                <div class="container ">
                    <table class="table table-dark table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="p-3" scope="col">Username</th>
                                <th class="p-3" scope="col">Email</th>
                                <th class="p-3" scope="col">Password</th>
                                <th class="p-3" scope="col">Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $usersFile = 'users.json';
                            $users = file_exists($usersFile) ? json_decode(file_get_contents($usersFile), true) : [];

                            foreach ($users as $email => $userData) {
                                echo '<tr>';
                                echo '<td class="p-3">' . $userData['username'] . '</td>';
                                echo '<td class="p-3">' . $email . '</td>';
                                echo '<td class="p-3">' . $userData['password'] . '</td>';
                                echo '<td class="p-3">' . $userData['role'] . '</td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

</body>