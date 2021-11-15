<?php

include("connection.php");

$id = $_POST['AddedUserID'];
$userID = $_POST["userID"];


$getID = $connection->prepare('Select cnx_id from connections_tbl where cnx_targetUserID= "' . $userID . '" and cnx_sourceUserID = "' . $id . '" OR cnx_targetUserID= "' . $id . '" and cnx_sourceUserID="' . $userID . '"');
$getID->execute();
$result = $getID->get_result();
$User = $result->fetch_assoc();
$idCnx = $User["cnx_id"];


$y = $connection->prepare("UPDATE connections_tbl SET cnx_isPending=0, cnx_isfriend=0, cnx_isBlocked=1 WHERE cnx_id=?;");
$y->bind_param("i", $idCnx);
$y->execute();
//$y->close();



$y->close();


$getID->close();
$connection->close();
