<h2>To edit or view the database, click the links below</h2>

<form action='create_form.php'>
    <input type='submit' value='Create'>
</form>

<form action='update_form.php'>
    <input type='submit' value='Update'>
</form>

<form action='delete_form.php'>
    <input type='submit' value='Delete'>
</form>

<h1>Messages List</h1>
<?php
$pdo = new PDO( 
    "mysql:host=".'localhost'.";"."dbname=".'id12463490_test1', 
    'id12463490_testy', 
    'ZippyDot'
);
$sql = "SELECT * FROM People";
foreach ($pdo->query($sql) as $row){
    $str = "";
    $str .= ' (' . $row['ID'] . ') ' . $row['FirstName'] . ' ' . $row['LastName'];
    $str .=  '<br>';
    echo $str;
    }
?>