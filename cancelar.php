<?php
require('db.php');

extract($_POST);

$cancelar_query = "update reporte set status='cancelado' where id='$id'";

echo $cancelar_query;

connect();
mysqli_query ($conn, $cancelar_query);
disconnect();

?>
