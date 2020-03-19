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

//Grab info from form
$s = $_POST['start'];
$e = $_POST['end'];
$d = $_POST['day'];
$p = $_POST['price'];
$c = $_POST['capacity'];

if(!empty($s) && !empty($e) && !empty($d) && !empty($p) && !empty($c)){

//Make SQL string
$sql = "INSERT INTO Flights (Start, End, Time, Price, Capacity) VALUES ('$s', '$e', '$d', '$p', '$c')";

//Execute Query
$pdo->query($sql);

echo "<p>The Flight has been added</p><br>";
echo "<a href='flight_hub.php'>Back to Form</a>";
}
else{
    echo "<p>Field was left empty, please return</p><br>";
    echo "<a href='create_form.php'>Back to Form</a>";
}
?>