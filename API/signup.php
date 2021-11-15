<?php

include("connection.php");
if ($_POST["Email"] != "") {
	$email = $_POST["Email"];
}
else {
	die("Don't try to mess around bro 1 ;)");
}


if (isset($_POST["firstname"]) && $_POST["firstname"] != "") {
	$FirstName = $_POST['firstname'];
}
else {
	die("Don't try to mess around bro 2;)");
}

if (isset($_POST["lastname"]) && $_POST["lastname"] != "") {
	$LastName = $_POST['lastname'];
}
else {
	die("Don't try to mess around bro 3;)");
}


if (isset($_POST["password"]) && $_POST["password"] != "") {
	$password = hash('sha256', $_POST['password']);
}
else {
	die("Don't try to mess around bro 4;)");
}


if (isset($_POST["Date"]) && $_POST["Date"] != "") {
	$date = $_POST['Date'];
}
else {
	die("Don't try to mess around bro 5;)");
}

if (isset($_POST["city"]) && $_POST["city"] != "") {
	$city = $_POST['city'];
}
else {
	die("Don't try to mess around bro 6;)");
}

if (isset($_POST["country"]) && $_POST["country"] != "") {
	$country = $_POST['country'];
}
else {
	die("Don't try to mess around bro 6;)");
}

$gender = $_POST['gender'];

$id = uniqid();
$gender = $_POST['gender'];

$image_URL = "images/users/Unknown_person.jpg";

$x = $connection->prepare("select * from users_tbl where user_email=?");
$x->bind_param("s", $email);
$x->execute();
$result = $x->get_result(); // get the mysqli result
//print_r(mysqli_num_rows($result));
//$user = $result->fetch_assoc(); // fetch data   
if (mysqli_num_rows($result) == 0) {
	$x = $connection->prepare("INSERT INTO users_tbl (user_id, user_email, user_firstName, user_lastName, user_password, user_gender, user_DoB, user_city, user_country, user_imgURL) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$x->bind_param("ssssssssss", $id, $email, $FirstName, $LastName, $password, $gender, $date, $city, $country, $image_URL);
	$x->execute();
	$x->close();
	$connection->close();
	header("Location:../index.html");
}
else {
	//echo '<script>alert("User already registered!")</script>';
	echo '<script type="text/javascript">';
	echo 'alert("User already registered!")';
	echo 'window.location.href = "sign_up.html";';
	echo '</script>';


	$x->close();
	$connection->close();
//header("Location:sign_up.html");
//echo '<script>alert("User already registered!")</script>';

}



?>