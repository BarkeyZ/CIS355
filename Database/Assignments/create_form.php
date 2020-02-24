<h2>Select a person and event to make an assignment</h2>

<?php
require '../../password.php';
?>

<form method='post' action='create_record.php'>
<h3>Assign: </h3>
<?php
    $sql = 'SELECT * FROM People ORDER BY LastName ASC, FirstName ASC';
		echo "<select name='person' id='person_id'>";
		foreach ($pdo->query($sql) as $row) {
			echo "<option value='" . $row['ID'] . " '> " . $row['LastName'] . ', '  . $row['FirstName'] . "</option>";
		}
		echo "</select>";
?>
<br><h3>To Event: </h3>
<?php
    $sql = 'SELECT * FROM Events ORDER BY Day ASC, Name ASC';
        echo "<select name='event' id='event_id'>";
        foreach ($pdo->query($sql) as $row) {
			echo "<option value='" . $row['ID'] . " '> " . $row['Name'] . " at " . $row['Location'] . " (" . $row['Day'] . ")</option>";
        }
        echo "</select>";
?>
<br><input type='submit' value='Submit'>
</form>