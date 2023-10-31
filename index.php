<?php

session_start();

function checkuserstatus()
{
    if (isset($_SESSION['email'])) {
        echo "Hi visitor you are logged in<br>";
        echo "<a href='logout.php'>click here to logout</a>";
    } else {
        header("Location: login.php");
    }
}

?>



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2 class="text-center">  <?php checkuserstatus(); ?></h2>
</div>
</body>
</html>