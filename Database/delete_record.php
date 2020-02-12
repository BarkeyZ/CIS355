<?php
//Connects to Database
$pdo = new PDO( 
    "mysql:host=".'localhost'.";"."dbname=".'id12463490_test1', 
    'id12463490_testy', 
    'ZippyDot'
);

if(!empty($_POST)){
?>
    
    <form method='get' action='delete_record.php'>
        <input type='hidden' name='record_id' value='<?php $_POST['record_id']?>'
        <h1>Are you sure you want to DELETE this file?!?</h1>
        <input type='submit' value='Yes, DELETE IT'>
    </form>
<?php
}
else{
    echo "There is no more file to delete";
}
    if(!empty($_GET)){
        $id = $_GET['record_id'];
        
        $sql = "DELETE FROM People WHERE ID=" . $id;
        
        $pdo->query($sql);
    }

?>