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
if(empty($_GET)){
    if(!empty($_POST)){
    ?>
        <form method='get' action='delete_record.php'>
            <input type='hidden' name='delete_id' value='<?php echo $_POST['flightID'];?>'>
            <h1>Are you sure you want to DELETE this flight?!?</h1><br>
            <p>
                <?php $sql = "SELECT * FROM Flights WHERE ID = " . $_POST['flightID'];
                    foreach($pdo->query($sql) as $row){
                        $out = "";
                        $out .= "(" . $row['ID'] . ") " . $row['Start'] . " to " . $row['End'];
                        echo $out;
                    }
                ?>
            </p>
            <input type='submit' value='Yes, DELETE IT'>
        </form>
        <form action='flight_hub.php'>
            <input type='submit' value='NO! Go Back!'>
        </form>
    <?php
    }
}
else{
    $sql = "DELETE FROM Flights WHERE ID = " . $_GET['delete_id'] . " LIMIT 1;";
    $pdo->query($sql);
    
    $sql = "DELETE FROM Assignments WHERE FlightID = " . $_GET['delete_id'] . " LIMIT 1;";
    $pdo->query($sql);
    
    echo "<h3>It has been deleted<?h3><br><br><a href='flight_hub.php'>Return</a>";
}
?>