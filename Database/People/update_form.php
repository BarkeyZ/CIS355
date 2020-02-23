<h2>Update the Entry</h2>

<?php
//Connects to Database
require '../../password.php';
if(!empty($_GET)){
    echo "<h2>Update the Entry</h2>";
    $id = $_GET['personID'];
    $FName;
    $LName;
    $Phone;
    
    $sql = "SELECT * FROM People WHERE  ID = " . $id;
    foreach($pdo->query($sql) as $row){
        $FName = $row['FirstName'];
        $LName = $row['LastName'];
        $Phone = $row['PhoneNumber'];
    }
?>

<form method='post' action='update_form.php'>
    <input type='hidden' name='id' value='<?php echo $id; ?>'>
    First Name: <input type='text' name='NewF' value='<?php echo $FName; ?>'>
    Last Name: <input type='text' name='NewL' value='<?php echo $LName; ?>'>
    Phone Number: <input type='text' name='NewP' value='<?php echo $Phone; ?>'>
    <input type='submit' value='Submit'>
</form>

<form action='form_hub.php'>
    <input type='submit' value='Back'>
</form>

<?php
}
 if(!empty($_POST)){
     $id = $_POST['id'];
     $FName = $_POST['NewF'];
     $LName = $_POST['NewL'];
     $Phone = $_POST['NewP'];
     
     $sql = "UPDATE People SET FirstName = '" . $FName . "', LastName = '" . $LName . "', PhoneNumber = '" . $Phone . "' WHERE ID = " . $id;
     $pdo->query($sql);
     
     echo "<h1>Hopefully it was updated: <a href='form_hub.php'>Go and check!</a></h1>";
 }   
?>