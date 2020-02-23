<?php
require '../../password.php';
?>

<h2>Selected Person:</h2>

<?php
$theID = $_POST['personID'];

$sql = "SELECT * FROM People WHERE ID = " . $theID;
foreach($pdo->query($sql) as $row){
    $str = "";
    $str .= ' (' . $row['ID'] . ') ' . $row['FirstName'] . ' ' . $row['LastName'] . " #" . $row['PhoneNumber'];
    $str .= '<br>';
    echo $str;
}

echo "<br><br><a href='form_hub.php'>Return</a>"


?>