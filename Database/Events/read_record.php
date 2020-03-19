<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
			<link   href="../css/bootstrap.min.css" rel="stylesheet">
				<script src="../js/bootstrap.min.js"></script>
			</head>

			<body>
				<div class='container'>
				
<?php
require '../../password.php';
?>
<div class='row'>
<h2>Selected Event:</h2>
</div>

<div class='row'>
<?php
$theID = $_POST['eventID'];

$sql = "SELECT * FROM Events WHERE ID = " . $theID;
foreach($pdo->query($sql) as $row){
    $str = "";
	$str .= "<div class='row'>";
    $str .= ' (' . $row['ID'] . ') ' . $row['Name'] . ' at ' . $row['Location'] . " on " . $row['Day'];
    $str .= '</div><br>';
    echo $str;
}
?>
<div class='row'>
<h3>This event has the following assignments:</h3>
</div>
<div class="row">
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Assignment ID</th>
										<th>Description</th>
									</tr>
								</thead>
								<tbody>
<?php
$sql = "SELECT * FROM People, Events, Assignments WHERE Assignments.PersonID = People.ID AND Assignments.EventID = Events.ID AND Events.ID = " . $theID . ";";
foreach($pdo->query($sql) as $row){
    $str = "";
	$str .= "<tr>";
    $str .= "<td>(" . $row['ID'] . ")</td>";
    $str .= "<td>" . $row['FirstName'] . ' ' . $row['LastName'] . ' assigned to ' . $row['Name'] . ' on ' . $row['Day'] . "</td>";
    $str .= '</tr>';
    echo $str;
}
?>
								</tbody>
							</table>
						</div>
<br><br><a href='event_hub.php'>Return</a>
							</div>
						</body>
					</html>