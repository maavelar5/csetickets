<?php
require('db.php');

extract($_POST);

$terminado_query = "update reporte set status='terminado' where id='$id'";

echo $terminad_query;

connect();
mysqli_query ($conn, $terminado_query);
disconnect();

?>
