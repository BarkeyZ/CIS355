<?php
session_start();
if(!isset($_SESSION["person_id"])){ // if "user" not set,
	session_destroy();
	header('Location: ../login.php');   // go to login page
	exit;
}
$sessionID = $_SESSION['person_id'];
$sessionTitle = $_SESSION['person_title'];

require '../../password.php';

$Start;
$End;
$Day;
$Price;
$Capacity;

if(!empty($_GET)){
    echo "<h2>Update the Entry</h2>";
    $id = $_GET['flightID'];
    
    $sql = "SELECT * FROM Flights WHERE  ID = " . $id;
    foreach($pdo->query($sql) as $row){
        $Start = $row['Start'];
		$End = $row['End'];
		$Day = $row['Time'];
		$Price = $row['Price'];
		$Capacity = $row['Capacity'];
    }
?>

<form method='post' action='update_form.php'>
    <input type='hidden' name='id' value='<?php echo $id; ?>'>
    Flight Start: <input type='text' name='NewS' value='<?php echo $Start; ?>'><br>
    Flight End: <input type='text' name='NewE' value='<?php echo $End; ?>'><br>
    Time of Flight: <input type='text' name='NewD' value='<?php echo $Day; ?>'><br>
	Price: <input type='text' name='NewP' value='<?php echo $Price; ?>'><br>
	Capacity: <input type='text' name='NewC' value='<?php echo $Capacity; ?>'><br>
    <input type='submit' value='Submit'>
</form>
<br>
<form action='flight_hub.php'>
    <input type='submit' value='Home'>
</form>

<?php
}
 if(!empty($_POST)){
     $id = $_POST['id'];
     $NStart = $_POST['NewS'];
	 $NEnd = $_POST['NewE'];
     $NDay = $_POST['NewD'];
     $NPrice = $_POST['NewP'];
	 $NCap = $_POST['NewC'];
     
     $sql = "UPDATE Flights SET Start = '" . $NStart . "', End = '" . $NEnd . "', Time = '" . $NDay . "' WHERE ID = " . $id;
     $pdo->query($sql);
     
     echo "<h1>Hopefully it was updated: <a href='flight_hub.php'>Go and check!</a></h1>";
 }   
?>