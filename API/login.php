<?php
include("connection.php");

if (isset($_POST["my-email"]) && $_POST["my-email"] != "") {
	$email = $_POST["my-email"];
}
else {
	die("Don't try to mess around bro ;)");
}


if (isset($_POST["my-password"]) && $_POST["my-password"] != "") {
	$password = hash('sha256', $_POST['my-password']);
}
else {
	die("Don't try to mess around bro ;)");
}

print_r($email, $password);
$x = $connection->prepare("select * from users_tbl where user_email=? And user_password=?");
$x->bind_param("ss", $email, $password);
$x->execute();
$result = $x->get_result(); // get the mysqli result
print_r(mysqli_num_rows($result));
//$user = $result->fetch_assoc(); // fetch data   
if (mysqli_num_rows($result) != 0) {
	$user = $result->fetch_assoc();
	session_start();
	$_SESSION["User_id"] = $user['user_id'];
	$_SESSION["Image_URL"] = $user['user_imgURL'];
	$_SESSION["firstname"] = $user['user_firstName'];
	$_SESSION["lastname"] = $user['user_lastName'];


	$x->close();
	$connection->close();

	header('Location:../main_allUsers.php');
}
else {


	echo '<script type="text/javascript">';
	echo 'alert("Wrong username or password");';
	echo 'window.location.href = "../index.html";';
	echo '</script>';
//header('Location:../index.html');


//header("Location:sign_up.html");
//echo '<script>alert("User already registered!")</script>';

}



?>