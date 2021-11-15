<?php

include("connection.php");
$userID = $_POST["userID"];
//echo($userID);
$response = array();
$sql = 'Select * from users_tbl where user_id !="' . $userID . '" AND user_id not in (Select cnx_sourceUserID from connections_tbl where cnx_targetUserID="' . $userID . '" Union Select cnx_targetUserID from connections_tbl where cnx_sourceUserID="' . $userID . '")';
$result = mysqli_query($connection, $sql);
if ($result) {
    header("Content-Type: JS");
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        //print_r($row);
        $response[$i]['id'] = $row['user_id'];
        $response[$i]['firstName'] = $row['user_firstName'];
        $response[$i]['LastName'] = $row['user_lastName'];
        $response[$i]['image_url'] = $row['user_imgURL'];




        $i++;

    }
    //$array=json_encode($response);
    //print(gettype($response[0]['image']));
    //print_r($response);
    echo json_encode($response, JSON_PRETTY_PRINT);
//print_r(json_encode($response, JSON_PRETTY_PRINT));
}

?>