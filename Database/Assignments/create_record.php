<?php
//Connects to Database
require '../../password.php';

if(!empty($_POST)){    
    $PersonID = $_POST['person'];
    $EventID = $_POST['event'];
    
    $sql = "INSERT INTO Assignments (PersonID, EventID) VALUES (" . $PersonID . ", " . $EventID . ");";
    $pdo->query($sql);
    
    ?>
    
    <br><h2>Assignment Created, hopefully...</h2><br>
    <a href='assign_hub.php'>Back</a>
<?php
}
else{
    echo "<h2>Nothin' Happened</h2><br><a href='assign_hub.php'>Back</a>";
}

?>