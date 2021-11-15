<?php

include("connection.php");

$id = $_POST['AddedUserID'];
$userID = $_POST["userID"];
$notification = $_POST["notification"];



$y = $connection->prepare("Insert into connections_tbl (cnx_sourceUserID, cnx_targetUserID, cnx_isPending) Values ('" . $userID . "', '" . $id . "' , 1);");
//$y->bind_param("s,s", $userID, $id);
$y->execute();
//$y->close();



$y->close();

$time = date("Y-m-d H:i:s");

$x = $connection->prepare("Insert into notifications_tbl (notfication_userid, notification_message, notification_time, notification_clear) Values ('" . $id . "', '" . $notification . "', '" . $time . "' , 0);");
//$y->bind_param("s,s", $userID, $id);
$x->execute();
//$y->close();



$x->close();
$connection->close();