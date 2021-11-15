<?php

include("connection.php");
$userID = $_POST["userID"];
//echo($userID);
$respone = [];
$sql = 'Select * from users_tbl where user_id ="' . $userID . '"';
$result = mysqli_query($connection, $sql);
if ($result) {
    header("Content-Type: JS");
    $i = 0;
    $row = mysqli_fetch_assoc($result);
    //print_r($row);
    $response['id'] = $row['user_id'];
    $response['firstName'] = $row['user_firstName'];
    $response['LastName'] = $row['user_lastName'];
    $response['image_url'] = $row['user_imgURL'];
    $response['details'] = $row['user_details'];
    $response['DoB'] = $row['user_DoB'];
    $response['phone'] = $row['user_phoneNumber'];
    $response['city'] = $row['user_city'];
    $response['country'] = $row['user_country'];




    //$array=json_encode($response);
    //print(gettype($response[0]['image']));
    //print_r($response);
    echo json_encode($response, JSON_PRETTY_PRINT);
//print_r(json_encode($response, JSON_PRETTY_PRINT));
}

?>