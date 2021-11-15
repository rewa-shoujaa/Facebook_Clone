<?php

include("connection.php");

$id = $_POST['connectionID'];


$y = $connection->prepare("Delete from connections_tbl WHERE cnx_id=?;");
$y->bind_param("i", $id);
$y->execute();
//$y->close();



$y->close();
$connection->close();
