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
				
<div class='row'>
<h2>Selected Flight:</h2>
</div>

<div class='row'>
<?php
$theID = $_POST['flightID'];

$sql = "SELECT * FROM Flights WHERE ID = " . $theID;
foreach($pdo->query($sql) as $row){
    $str = "";
	$str .= "<div class='row'>";
    $str .= ' (' . $row['ID'] . ') ' . $row['Start'] . ' to ' . $row['End'] . " on " . $row['Time'];
    $str .= '</div><br>';
    echo $str;
}
?>
<div class='row'>
<h3>This Flight has the following reservations:</h3>
</div>
<div class="row">
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Reservation ID</th>
										<th>Description</th>
									</tr>
								</thead>
								<tbody>
<?php
$sql = "SELECT * FROM People, Flights, Reservations WHERE Reservations.PersonID = People.ID AND Reservations.FlightID = Flights.ID AND Flights.ID = " . $theID . ";";
foreach($pdo->query($sql) as $row){
    $str = "";
	$str .= "<tr>";
    $str .= "<td>(" . $row['ID'] . ")</td>";
    $str .= "<td>" . $row['FirstName'] . ' ' . $row['LastName'] . ' reserved a spot on the flight from ' . $row['Start'] . ' to ' . $row['End'] . " on " . $row['Time'] . "</td>";
    $str .= '</tr>';
    echo $str;
}
?>
								</tbody>
							</table>
						</div>
<br><br><a href='flight_hub.php'>Return</a>
							</div>
						</body>
					</html>