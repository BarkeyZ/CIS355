<?php
require '../../password.php';
//Connects to Database
if(empty($_GET)){
    if(!empty($_POST)){
    ?>
        <form method='get' action='delete_record.php'>
            <input type='hidden' name='delete_id' value='<?php echo $_POST['personID'];?>'>
            <h1>Are you sure you want to DELETE this file?!?</h1><br>
            <p>
                <?php $sql = "SELECT * FROM People WHERE ID = " . $_POST['personID'];
                    foreach($pdo->query($sql) as $row){
                        $out = "";
                        $out .= "(" . $row['ID'] . ") " . $row['FirstName'] . " " . $row['LastName'];
                        echo $out;
                    }
                ?>
            </p>
            <input type='submit' value='Yes, DELETE IT'>
        </form>
        <form action='form_hub.php'>
            <input type='submit' value='NO! Go Back!'>
        </form>
    <?php
    }
}
else{
    $sql = "DELETE FROM People WHERE ID = " . $_GET['delete_id'] . " LIMIT 1;";
    
    $pdo->query($sql);
    
    echo "<h3>It has been deleted<?h3><br><br><a href='form_hub.php'>Return</a>";
}
?>