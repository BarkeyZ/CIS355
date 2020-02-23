<?php
require '../../password.php';
?>

<h2>Selected Event:</h2>

<?php
$theID = $_POST['eventID'];

$sql = "SELECT * FROM Events WHERE ID = " . $theID;
foreach($pdo->query($sql) as $row){
    $str = "";
    $str .= ' (' . $row['ID'] . ') ' . $row['Name'] . ' at ' . $row['Location'] . " on " . $row['Day'];
    $str .= '<br>';
    echo $str;
}

echo "<br><br><a href='event_hub.php'>Return</a>"


?>