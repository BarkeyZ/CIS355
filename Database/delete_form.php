<h2>Select the data you wish to delete</h2>

<?php
//Connects to Database
$pdo = new PDO( 
    "mysql:host=".'localhost'.";"."dbname=".'id12463490_test1', 
    'id12463490_testy', 
    'ZippyDot'
);

$sql = "SELECT * FROM People";
foreach ($pdo->query($sql) as $row){
    echo "<form method='post' action='delete_record.php'>";
    echo "<p>ID: </p>";
    echo "<input type='text' name='record_id' value='" . $row['ID'] . "' readonly>" ;
    echo "<p>Name: </p>";
    echo "<input type='text' name='record_name' value='" . $row['FirstName'] . " " . $row['LastName'] . "' readonly><br>";
    echo "<input type='submit' value='Delete'></br>";
    echo "</form>";
    }
?>