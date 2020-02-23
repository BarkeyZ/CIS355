<?php
//Connects to Database
require '../../password.php';


//Grab info from form
$f = $_POST['first'];
$l = $_POST['last'];
$p = $_POST['phone'];

if(!empty($f) && !empty($l) && !empty($p)){

//Make SQL string
$sql = "INSERT INTO People (FirstName, LastName, PhoneNumber) VALUES ('$f', '$l', '$p')";

//Execute Query
$pdo->query($sql);

echo "<p>Your info has been added</p><br>";
echo "<a href='form_hub.php'>Back to Form</a>";
}
else{
    echo "<p>Field was left empty, please return</p><br>";
    echo "<a href='create_form.php'>Back to Form</a>";
}
?>