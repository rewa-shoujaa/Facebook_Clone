<?php

include("connection.php");
$userID = $_POST["userID"];
//echo($userID);
$response = array();
$sql = 'Select * from notifications_tbl where notfication_userid ="' . $userID . '" AND notification_clear=0 order by notification_time DESC';
$result = mysqli_query($connection, $sql);
if ($result) {
    header("Content-Type: JS");
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        //print_r($row);
        $response[$i]['notification'] = $row['notification_message'];
        $response[$i]['notificationID'] = $row['notification_id'];




        $i++;

    }
    //$array=json_encode($response);
    //print(gettype($response[0]['image']));
    //print_r($response);
    echo json_encode($response, JSON_PRETTY_PRINT);
//print_r(json_encode($response, JSON_PRETTY_PRINT));
}

?>