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
<html lang="en">
	<head>
		<meta charset="utf-8">
			<link   href="../css/bootstrap.min.css" rel="stylesheet">
				<script src="../js/bootstrap.min.js"></script>
			</head>
<h2>Selected Reservation:</h2>

<?php
$theID = $_POST['reservationID'];

$sql = "SELECT DISTINCT * FROM People, Flights, Reservations WHERE Reservations.PersonID = People.ID AND Reservations.FlightID = Flights.ID AND Reservations.ID = " . $theID . ";";
foreach($pdo->query($sql) as $row){
    $str = "";
    $str .= "(" . $theID . ") ";
    $str .= $row['FirstName'] . ' ' . $row['LastName'] . ' reserved a seat from ' . $row['Start'] . ' to ' . $row['End'] . " on " . $row['Time'];
    $str .= '<br>';
    echo $str;
}

echo "<br><br><a href='reserve_hub.php'>Return</a>"


?>