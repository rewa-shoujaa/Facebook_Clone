<?php

include("connection.php");

$id = $_POST['connectionID'];
$notification = $_POST["notification"];


$y = $connection->prepare("UPDATE connections_tbl SET cnx_isPending=0, cnx_isfriend=1 WHERE cnx_id=?;");
$y->bind_param("i", $id);
$y->execute();
//$y->close();



$y->close();
$time = date("Y-m-d H:i:s");


$getID = $connection->prepare("Select user_id from users_tbl where user_id= (SELECT cnx_sourceUserID FROM connections_tbl where cnx_id=" . $id . ");");
$getID->execute();
$result = $getID->get_result();
$User = $result->fetch_assoc();
$idUser = $User["user_id"];

$x = $connection->prepare("Insert into notifications_tbl (notfication_userid, notification_message, notification_time, notification_clear) Values ('" . $idUser . "', '" . $notification . "', '" . $time . "' , 0);");
//$y->bind_param("s,s", $userID, $id);
$x->execute();
//$y->close();


$getID->close();
$x->close();
$connection->close();
