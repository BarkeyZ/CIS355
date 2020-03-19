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
<h2>Select a flight to make an reservation</h2>

<form method='post' action='create_record.php'>

<?php
if($sessionTitle == 1){
echo "<h3>Person: </h3>";
    $sql = 'SELECT * FROM People ORDER BY LastName ASC, FirstName ASC';
		echo "<select name='person' id='person_id'>";
		foreach ($pdo->query($sql) as $row) {
			echo "<option value='" . $row['ID'] . " '> " . $row['LastName'] . ', '  . $row['FirstName'] . "</option>";
		}
		echo "</select>";
}
else{
    echo "<h2>You arent admin</h2>";
    $sql = 'SELECT * FROM People WHERE ID = ' . $sessionID;
    foreach ($pdo->query($sql) as $row) {
        echo "<input type='hidden' name='person' id='person_id' value='" . $row['ID'] . "'>";
    }
}

?>
<br><h3>Flight: </h3>
<?php
    $sql = 'SELECT * FROM Flights ORDER BY Start ASC, End ASC';
        echo "<select name='flight' id='flight_id'>";
        foreach ($pdo->query($sql) as $row) {
			echo "<option value='" . $row['ID'] . " '> " . $row['Start'] . " to " . $row['End'] . " (" . $row['Time'] . ")</option>";
        }
        echo "</select>";
?>
<br><input type='submit' value='Submit'>
</form>