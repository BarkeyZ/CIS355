<?php
session_start();
if(!isset($_SESSION["person_id"])){ // if "user" not set,
	session_destroy();
	header('Location: ../login.php');   // go to login page
	exit;
}

$sessionID = $_SESSION['person_id'];
$sessionTitle = $_SESSION['person_title'];

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
			<link   href="../css/bootstrap.min.css" rel="stylesheet">
				<script src="../js/bootstrap.min.js"></script>
			</head>

			<body>
				<div class="container">
					<div class="row">	
<h2>To edit or view the database, click the links below</h2>
</div>


<form action='create_form.php'>
    <input type='submit' value='Create'>
</form>

<form action='../flights_app.php'>
    <input type='submit' value='Home'>
</form>

<div class='row'>
<h1>All Reservations</h1>
</div>

<div class='row'>
								<table class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>Person</th>
											<th>Flight</th>
											<th>Time</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
<?php
require '../../password.php';

$sql = "SELECT DISTINCT FirstName, LastName, Start, End, Time, People.ID FROM People, Flights, Reservations WHERE Reservations.PersonID = People.ID AND Reservations.FlightID = Flights.ID;";
foreach ($pdo->query($sql) as $row){
    $str = "";
	$str .= "<tr>";
    $str .= '<td>' . $row['FirstName'] . ' ' . $row['LastName'] . '</td>';
	$str .= '<td>' . $row['Start'] . " to " . $row['End'] . '</td>';
	$str .= '<td>' . $row['Time'] . '</td>';
	$str .= '<td><table>';
    $str .= "<td><form method='post' action='read_record.php'>";
    $str .= "<input type='hidden' name ='reservationID' value='" . $row['ID'] . "'>";
    $str .= "<input type='Submit' value='Read'>";
    $str .= '</form></td>';
    if($sessionTitle == 1 || $sessionID == $row['ID']){
        $str .= "<td><form method='post' action='delete_record.php'>";
        $str .= "<input type='hidden' name ='reservationID' value='" . $row['ID'] . "'>";
        $str .= "<input type='Submit' value='Delete'>";
        $str .= '</form></td>';
    }
	$str .= '</td>';
	$str .= '</table>';
	$str .= '</tr>';
    echo $str;
    }
?>