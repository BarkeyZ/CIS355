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
						<h2>Enter New Enty's Data</h2>
					</div>
					<div class='row'>
						<form method='post' action='create_record.php'>
							First Name:<input name='first' type='text'>
							</br>
							Last Name:<input name='last' type='text'>
							</br>
							Phone:<input name='phone' type='text'>
							</br>
							<input type='submit' value='Submit'>
							</form>
						</div>

						<div class='row'>
							<form action='form_hub.php'>
								<input type='submit' value='Back'>
								</form>
							</div>

						</div>
					</body>
				</html>