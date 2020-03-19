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
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
			<link   href="../css/bootstrap.min.css" rel="stylesheet">
				<script src="../js/bootstrap.min.js"></script>
			</head>

			<body>
				<div class='container'>
					<div class='row'>
						<h2>Selected Person:</h2>
					</div>
					<div class='row'>
						<?php
$theID = $_POST['personID'];

$sql = "SELECT * FROM People WHERE ID = " . $theID;
foreach($pdo->query($sql) as $row){
    $str = "";
	$sql .= "<div class='row'>";
    $str .= ' (' . $row['ID'] . ') ' . $row['FirstName'] . ' ' . $row['LastName'] . " #" . $row['PhoneNumber'];
    $str .= '</div>';
    echo $str;
}
echo "<div class='row'>";
echo "<br><h3>This person has the following assignments:</h3><br>";
echo "</div>";
?>

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
$sql = "SELECT * FROM People, Events, Assignments WHERE Assignments.PersonID = People.ID AND Assignments.EventID = Events.ID AND People.ID = " . $theID . ";";
foreach($pdo->query($sql) as $row){
    $str = "";
	$str .= "<tr>";
    $str .= "<td>(" . $row['ID'] . ")</td>";
    $str .= "<td>" . $row['FirstName'] . ' ' . $row['LastName'] . ' assigned to ' . $row['Name'] . ' on ' . $row['Day'] . '</td>';
    $str .= '</tr>';
    echo $str;
}
?>
								</tbody>
							</table>
						</div>
						<br><br><a href='form_hub.php'>Return</a>
							</div>
						</body>
					</html>


					