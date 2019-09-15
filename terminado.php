<?php
require('db.php');

var_dump($_POST);

extract($_POST);

$cancelar_query = "update reporte set status='terminado' where id='$id'";

echo $cancelar_query;

connect();
mysqli_query ($conn, $cancelar_query);
disconnect();

?>
