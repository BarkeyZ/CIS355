<h2>To edit or view the database, click the links below</h2>

<form action='create_form.php'>
    <input type='submit' value='Create'>
</form>

<form action='../events_people.php'>
    <input type='submit' value='Home'>
</form>


<h1>Event List</h1>
<?php
require '../../password.php';

$sql = "SELECT * FROM Events";
foreach ($pdo->query($sql) as $row){
    $str = "";
    $str .= $row['Name'] . ' (' . $row['Location'] . ')';
    $str .= "<form method='post' action='read_record.php'>";
    $str .= "<input type='hidden' name ='eventID' value='" . $row['ID'] . "'>";
    $str .= "<input type='Submit' value='Read'>";
    $str .=  '</form>';
    $str .= "<form method='post' action='delete_record.php'>";
    $str .= "<input type='hidden' name ='eventID' value='" . $row['ID'] . "'>";
    $str .= "<input type='Submit' value='Delete'>";
    $str .=  '</form>';
    $str .= "<form method='get' action='update_form.php'>";
    $str .= "<input type='hidden' name ='eventID' value='" . $row['ID'] . "'>";
    $str .= "<input type='Submit' value='Update'>";
    $str .=  '</form><br>';
    echo $str;
    }
?>