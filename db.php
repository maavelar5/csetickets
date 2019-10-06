<?php
$conn = NULL;
$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . "/config.ini");

function connect () {
    global $conn;
    global $config;

    $conn = mysqli_connect($config["servername"],
                           $config["username"],
                           $config["password"],
                           $config["database"]);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
}

function disconnect () {
    global $conn;

    mysqli_close($conn);
}
?>
