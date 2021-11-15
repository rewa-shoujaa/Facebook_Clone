<?php

include("connection.php");

$FirstName = $_POST['firstnametxt'];

$LastName = $_POST['lastnametxt'];


$date = $_POST['Date'];


$city = $_POST['city'];

$country = $_POST['country'];

$phone = $_POST['phonetxt'];
$details = $_POST['my-info'];
$UserID = $_POST['ID_hidden'];

$x = $connection->prepare("Update users_tbl set user_firstName = ?, user_lastName = ?, user_DoB =? , user_city = ?, user_country =?, user_phoneNumber = ?,user_details=? where user_id=?");
$x->bind_param("ssssssss", $FirstName, $LastName, $date, $city, $country, $phone, $details, $UserID);
$x->execute();
$x->close();
$connection->close();

echo '<script type="text/javascript">';
echo 'alert("Updated Successfully");';
echo 'window.location.href = "../main_allUsers.php";';
echo '</script>';




?>