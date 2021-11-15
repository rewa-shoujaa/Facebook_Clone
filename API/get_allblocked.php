<?php

include("connection.php");
$userID = $_POST["userID"];
//echo($userID);
$response = array();
//$sql = 'Select * from users_tbl where user_id !="' . $userID . '" AND user_id in (Select cnx_sourceUserID from connections_tbl where cnx_targetUserID="' . $userID . '" and cnx_isfriend=1 and cnx_isBlocked=0 and cnx_isPending=0 Union Select cnx_targetUserID from connections_tbl where cnx_sourceUserID="' . $userID . '" and cnx_isfriend=1 and cnx_isBlocked=0 and cnx_isPending=0)';
$sql = 'Select * from users_tbl inner join connections_tbl on users_tbl.user_id = connections_tbl.cnx_targetUserID where connections_tbl.cnx_sourceUserID="' . $userID . '" and user_id IN (Select cnx_targetUserID from connections_tbl where cnx_sourceUserID="' . $userID . '" and cnx_isBlocked=1)';
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