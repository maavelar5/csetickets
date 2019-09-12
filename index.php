<?php
require('db.php');

if (isset($_COOKIE['user_data'])) { 
    header('Location: home.php');
    exit;
}

else {
    header('Location: login.php');
    exit;
}

?>
