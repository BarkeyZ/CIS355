<?php
//Connects to Database
$pdo = new PDO( 
    "mysql:host=".'localhost'.";"."dbname=".'id12463490_test1', 
    'id12463490_testy', 
    'ZippyDot'
);

//Grab info from form
$f = $_POST['first'];
$l = $_POST['last'];
$p = $_POST['phone'];

//Make SQL string
$sql = "INSERT INTO People (FirstName, LastName, PhoneNumber) VALUES ('$f', '$l', '$p')";

//Execute Query
$pdo->query($sql);

echo "<p>Your info has been added</p><br>";
echo "<a href='create_form.php'>Back to Form</a>";

?>