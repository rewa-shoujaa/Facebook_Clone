<?php

include("connection.php");
$userID = $_POST["userID"];
$search = '%' . $_POST["SearchKey"] . '%';
//echo($search);
$response = array();
$sql = 'Select * from users_tbl where user_id !="' . $userID . '" AND user_id in (Select cnx_sourceUserID from connections_tbl where cnx_targetUserID="' . $userID . '" and cnx_isfriend=1 and cnx_isBlocked=0 and cnx_isPending=0 Union Select cnx_targetUserID from connections_tbl where cnx_sourceUserID="' . $userID . '" and cnx_isfriend=1 and cnx_isBlocked=0 and cnx_isPending=0) AND (user_firstName LIKE "' . $search . '" OR user_lastName LIKE "' . $search . '")';
$x = $connection->prepare($sql);
//$x->bind_param("ss", $search, $search);
$x->execute();
$result = $x->get_result();

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