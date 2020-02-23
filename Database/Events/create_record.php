<?php
//Connects to Database
require '../../password.php';


//Grab info from form
$n = $_POST['name'];
$l = $_POST['location'];
$d = $_POST['day'];

if(!empty($n) && !empty($l) && !empty($d)){

//Make SQL string
$sql = "INSERT INTO Events (Name, Location, Day) VALUES ('$n', '$l', '$d')";

//Execute Query
$pdo->query($sql);

echo "<p>Your info has been added</p><br>";
echo "<a href='event_hub.php'>Back to Form</a>";
}
else{
    echo "<p>Field was left empty, please return</p><br>";
    echo "<a href='create_form.php'>Back to Form</a>";
}
?>