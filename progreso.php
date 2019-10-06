<?php
require('db.php');

extract($_POST);

$progreso_query = "update reporte set status='progreso' where id='$id'";

echo $progreso_query;

connect();
mysqli_query ($conn, $progreso_query);
disconnect();

?>
