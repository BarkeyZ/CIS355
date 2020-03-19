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
<h2>Enter Flight Data</h2>
<form method='post' action='create_record.php'>
    Flight Start Location:<input name='start' type='text'>
    </br>
    Flight End Location:<input name='end' type='text'>
    </br>
    Event Day/Time:<input name='day' type='text'>
    </br>
	Flight Price:<input name='price' type='text'>
    </br>
	Flight Capacity:<input name='capacity' type='text'>
    </br>
    <input type='submit' value='Submit'>
</form>

<form action='flight_hub.php'>
    <input type='submit' value='Back'>
</form>