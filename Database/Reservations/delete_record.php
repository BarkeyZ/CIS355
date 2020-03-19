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
require '../../password.php';
//Connects to Database
if(empty($_GET)){
    if(!empty($_POST)){
    ?>
        <form method='get' action='delete_record.php'>
            <input type='hidden' name='delete_id' value='<?php echo $_POST['reservationID'];?>'>
            <h1>Are you sure you want to DELETE this Reservation?!?</h1><br>
            <p>
                <?php $sql = "SELECT DISTINCT * FROM People, Flights, Reservations WHERE Reservations.PersonID = People.ID AND Reservations.FlightID = Flights.ID AND Reservations.ID = " . $_POST['reservationID'];
                    foreach($pdo->query($sql) as $row){
                        $str = "";
                        $str .= "(" . $row['ID'] . ") ";
                        $str .= $row['FirstName'] . ' ' . $row['LastName'] . ' reserved a seat from ' . $row['Start'] . " to " . $row['End'] . " on " . $row['Time'];
                        $str .= '<br>';
                        echo $str;
                    }
                ?>
            </p>
            <input type='submit' value='Yes, DELETE IT'>
        </form>
        <form action='reserve_hub.php'>
            <input type='submit' value='NO! Go Back!'>
        </form>
    <?php
    }
}
else{
    $sql = "DELETE FROM Reservations WHERE ID = " . $_GET['delete_id'] . " LIMIT 1;";
    
    $pdo->query($sql);
    
    echo "<h3>It has been deleted<?h3><br><br><a href='reserve_hub.php'>Return</a>";
}
?>