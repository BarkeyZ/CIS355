<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
			<link   href="../css/bootstrap.min.css" rel="stylesheet">
				<script src="../js/bootstrap.min.js"></script>
			</head>

			<body>
				<div class="container">
					<div class="row">			
						<h2>To edit or view the events, click the links below</h2>
					</div>


					<form action='create_form.php'>
						<input type='submit' value='Create'>
						</form>

						<form action='../../index.php'>
							<input type='submit' value='Home'>
							</form>

							<div class="row">
								<h1>Event List</h1>
							</div>
							<div class='row'>
								<table class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>Event Name</th>
											<th>Location</th>
											<th>Day of the week</th>
										</tr>
									</thead>
									<tbody>
										<?php
require '../../password.php';

$sql = "SELECT * FROM Events";
foreach ($pdo->query($sql) as $row){
    $str = "";
	$str .= "<tr>";
    $str .= "<td>" . $row['Name'] . '</td>';
	$str .= '<td>' . $row['Location'] . '</td>';
	$str .= '<td>' . $row['Day'] . '</td>';
	$str .= '<td><table>';
    $str .= "<td><form method='post' action='read_record.php'>";
    $str .= "<input type='hidden' name ='eventID' value='" . $row['ID'] . "'>";
    $str .= "<input type='Submit' value='Read'>";
    $str .=  '</form></td>';
    $str .= "<td><form method='post' action='delete_record.php'>";
    $str .= "<input type='hidden' name ='eventID' value='" . $row['ID'] . "'>";
    $str .= "<input type='Submit' value='Delete'>";
    $str .=  '</form></td>';
    $str .= "<td><form method='get' action='update_form.php'>";
    $str .= "<input type='hidden' name ='eventID' value='" . $row['ID'] . "'>";
    $str .= "<input type='Submit' value='Update'>";
    $str .= '</form></td>';
	$str .= '</td>';
	$str .= '</table>';
	$str .= '</tr>';
    echo $str;
    }
?>
									</tbody>
								</table>
							</div>
						</div>
					</body>
				</html>