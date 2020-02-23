<?php
require '../../password.php';
?>

<h2>Selected Event:</h2>

<?php
$theID = $_POST['assignmentID'];

$sql = "SELECT Assignments.ID, People.FirstName, People.LastName, Events.Day, Events.Name AS 'Event' FROM People, Events, Assignments WHERE Assignments.PersonID = People.ID AND Assignments.EventID = Events.ID AND Assignments.ID = " . $theID . ";";
foreach($pdo->query($sql) as $row){
    $str = "";
    $str .= "(" . $theID . ") ";
    $str .= $row['FirstName'] . ' ' . $row['LastName'] . ' assigned to ' . $row['Event'] . ' on ' . $row['Day'];
    $str .= '<br>';
    echo $str;
}

echo "<br><br><a href='assign_hub.php'>Return</a>"


?>