<?php
//Connects to Database
require '../../password.php';

$Name;
$Loc;
$Day;

if(!empty($_GET)){
    echo "<h2>Update the Entry</h2>";
    $id = $_GET['eventID'];
    $Name;
    $Loc;
    $Day;
    
    $sql = "SELECT * FROM Events WHERE  ID = " . $id;
    foreach($pdo->query($sql) as $row){
        $Name = $row['Name'];
        $Loc = $row['Location'];
        $Day = $row['Day'];
    }
?>

<form method='post' action='update_form.php'>
    <input type='hidden' name='id' value='<?php echo $id; ?>'>
    Name of event: <input type='text' name='NewN' value='<?php echo $Name; ?>'>
    Location of event: <input type='text' name='NewL' value='<?php echo $Loc; ?>'>
    Day of event: <input type='text' name='NewD' value='<?php echo $Day; ?>'>
    <input type='submit' value='Submit'>
</form>
<br>
<form action='assign_hub.php'>
    <input type='submit' value='Home'>
</form>

<?php
}
 if(!empty($_POST)){
     $id = $_POST['id'];
     $FName = $_POST['NewN'];
     $LName = $_POST['NewL'];
     $Phone = $_POST['NewD'];
     
     $sql = "UPDATE Events SET Name = '" . $FName . "', Location = '" . $LName . "', Day = '" . $Phone . "' WHERE ID = " . $id;
     $pdo->query($sql);
     
     echo "<h1>Hopefully it was updated: <a href='event_hub.php'>Go and check!</a></h1>";
 }   
?>