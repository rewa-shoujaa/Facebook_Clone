<?php

include("connection.php");

$id = $_POST['AddedUserID'];
$userID = $_POST["userID"];


$y = $connection->prepare("Insert into connections_tbl (cnx_sourceUserID, cnx_targetUserID, cnx_isBlocked) Values  ('" . $userID . "', '" . $id . "' , 1);");
//$y->bind_param("s,s", $userID, $id);
$y->execute();
//$y->close();



$y->close();
$connection->close();