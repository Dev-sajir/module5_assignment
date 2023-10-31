<?php
session_start();


if(isset($_SESSION['email'])){
    echo "you are logged in<br>";
    echo "<a href='logout.php'>click here to logout</a>";
    
}else{
    header("Location: login.php");
}