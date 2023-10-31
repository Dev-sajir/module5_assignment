<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usersFile = 'users.json';
    $users = file_exists($usersFile) ? json_decode(file_get_contents($usersFile), true) : [];

    $email = $_POST['email'];

    if (isset($users[$email])) {
        if (isset($_POST['create'])) {
            $role = $_POST['role'];
            $users[$email]['role'] = $role;
        } elseif (isset($_POST['update'])) {
            $role = $_POST['role'];
            $users[$email]['role'] = $role;
        } elseif (isset($_POST['delete'])) {
            $users[$email]['role'] = ''; // You can set it to an empty string or another default value
        }

        file_put_contents($usersFile, json_encode($users, JSON_PRETTY_PRINT));
    }

    header('Location: admin.php');
}
?>
