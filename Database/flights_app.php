<?php
session_start();
if(!isset($_SESSION["person_id"])){ // if "user" not set,
	session_destroy();
	header('Location: ../login.php');   // go to login page
	exit;
}

$sessionID = $_SESSION['person_id'];
$sessionTitle = $_SESSION['person_title'];

echo "<h2> Your Session ID is: " . $sessionID . "</h2>";
echo "<h2> Your Session Title is: " . $sessionTitle . "</h2>";

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
			<link   href="css/bootstrap.min.css" rel="stylesheet">
				<script src="js/bootstrap.min.js"></script>
			</head>

			<body>
				<div class='container'>
				<div class='row'>
<h3>
    Welcome to the Flight app! Here you can customize the list of people, flights, and also assign people TO flights! Wicked!
</h3>
</div>

<?php
if($sessionTitle == 1){
    echo "<div class='row'><a class='btn' href='People/form_hub.php'>Edit the list of people here!</a></div><div class='row'><a class='btn' href='Flights/flight_hub.php'>Edit the flight list here!</a></div>";
}
?>
<div class='row'>
<br>
<a class='btn' href='Reservations/reserve_hub.php'>You can edit the reservations here!</a>
</div>