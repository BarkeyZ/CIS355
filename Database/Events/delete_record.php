<?php
require '../../password.php';
//Connects to Database
if(empty($_GET)){
    if(!empty($_POST)){
    ?>
        <form method='get' action='delete_record.php'>
            <input type='hidden' name='delete_id' value='<?php echo $_POST['eventID'];?>'>
            <h1>Are you sure you want to DELETE this file?!?</h1><br>
            <p>
                <?php $sql = "SELECT * FROM Events WHERE ID = " . $_POST['eventID'];
                    foreach($pdo->query($sql) as $row){
                        $out = "";
                        $out .= "(" . $row['ID'] . ") " . $row['Name'] . " at " . $row['Location'];
                        echo $out;
                    }
                ?>
            </p>
            <input type='submit' value='Yes, DELETE IT'>
        </form>
        <form action='event_hub.php'>
            <input type='submit' value='NO! Go Back!'>
        </form>
    <?php
    }
}
else{
    $sql = "DELETE FROM Events WHERE ID = " . $_GET['delete_id'] . " LIMIT 1;";
    
    $pdo->query($sql);
    
    echo "<h3>It has been deleted<?h3><br><br><a href='event_hub.php'>Return</a>";
}
?>