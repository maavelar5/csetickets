<?php

$servername = "localhost";
$username = "root";
$password = "root";
$conn = NULL;


function connect () {
    global $servername;
    global $username;
    global $password;
    global $conn;

    $conn = mysqli_connect($servername, $username, $password, 'cse');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

}

function disconnect () {
    global $conn;

    mysqli_close($conn);
}

?>
