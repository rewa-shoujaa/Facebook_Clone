<?php

include("connection.php");

$id = $_POST['AddedUserID'];
$userID = $_POST["userID"];


$getID = $connection->prepare('Select cnx_id from connections_tbl where cnx_targetUserID= "' . $userID . '" and cnx_sourceUserID = "' . $id . '" OR cnx_targetUserID= "' . $id . '" and cnx_sourceUserID="' . $userID . '"');
$getID->execute();
$result = $getID->get_result();
$User = $result->fetch_assoc();
$idCnx = $User["cnx_id"];


$y = $connection->prepare("Delete from connections_tbl WHERE cnx_id=?;");
$y->bind_param("i", $idCnx);
$y->execute();
//$y->close();



$y->close();


$getID->close();
$connection->close();
