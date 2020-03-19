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
<html lang="en">
	<head>
		<meta charset="utf-8">
			<link   href="../css/bootstrap.min.css" rel="stylesheet">
				<script src="../js/bootstrap.min.js"></script>
			</head>
<?php
//Connects to Database
require '../../password.php';

if(!empty($_POST)){    
    $PersonID = $_POST['person'];
    $FlightID = $_POST['flight'];
    
    $sql = "INSERT INTO Reservations (PersonID, FlightID) VALUES (" . $PersonID . ", " . $FlightID . ");";
    $pdo->query($sql);
    
    ?>
    
    <br><h2>Reservation Created, hopefully...</h2><br>
    <a href='reserve_hub.php'>Back</a>
<?php
}
else{
    echo "<h2>Nothin' Happened</h2><br><a href='reserve_hub.php'>Back</a>";
}

?>