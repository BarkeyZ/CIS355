<h2>To edit or view the database, click the links below</h2>

<form action='create_form.php'>
    <input type='submit' value='Create'>
</form>

<form action='../events_people.php'>
    <input type='submit' value='Home'>
</form>


<h1>All Assignments</h1>
<?php
require '../../password.php';

$sql = "SELECT DISTINCT Assignments.ID, People.FirstName, People.LastName, Events.Name AS 'Event' FROM People, Events, Assignments WHERE Assignments.PersonID = People.ID AND Assignments.EventID = Events.ID;";
foreach ($pdo->query($sql) as $row){
    $str = "";
    $str .= $row['FirstName'] . ' ' . $row['LastName'] . ' assigned to ' . $row['Event'];
    $str .= "<form method='post' action='read_record.php'>";
    $str .= "<input type='hidden' name ='assignmentID' value='" . $row['ID'] . "'>";
    $str .= "<input type='Submit' value='Read'>";
    $str .=  '</form>';
    $str .= "<form method='post' action='delete_record.php'>";
    $str .= "<input type='hidden' name ='assignmentID' value='" . $row['ID'] . "'>";
    $str .= "<input type='Submit' value='Delete'>";
    $str .=  '</form><br>';
    echo $str;
    }
?>