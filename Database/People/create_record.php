<?php
session_start();
if(!isset($_SESSION["person_id"])){ // if "user" not set,
	session_destroy();
	header('Location: ../login.php');   // go to login page
	exit;
}
$sessionID = $_SESSION['person_id'];
$sessionTitle = $_SESSION['person_title'];

require '../../password.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
			<link   href="../css/bootstrap.min.css" rel="stylesheet">
				<script src="../js/bootstrap.min.js"></script>
			</head>

			<body>
				<div class='container'>
					<?php

//Grab info from form
$f = $_POST['first'];
$l = $_POST['last'];
$p = $_POST['phone'];

if(!empty($f) && !empty($l) && !empty($p)){

//Make SQL string
$sql = "INSERT INTO People (FirstName, LastName, PhoneNumber) VALUES ('$f', '$l', '$p')";

//Execute Query
$pdo->query($sql);

echo "<h3>Your info has been added</h3><br>";
echo "<a class ='btn' href='form_hub.php'>Back to Form</a>";
}
else{
    echo "<h3>Field was left empty, please return</h3><br>";
    echo "<a class ='btn' href='create_form.php'>Back to Form</a>";
}
?>
				</div></body></html>