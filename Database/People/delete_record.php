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
					<?php

//Connects to Database
if(empty($_GET)){
    if(!empty($_POST)){
    ?>
					<form method='get' action='delete_record.php'>
						<input type='hidden' name='delete_id' value='<?php echo $_POST['personID'];?>'>
							<div class='row'>
								<h1>Are you sure you want to DELETE this file?!?</h1>
							</div>
							<br>
								<p>
									<?php $sql = "SELECT * FROM People WHERE ID = " . $_POST['personID'];
                    foreach($pdo->query($sql) as $row){
                        $out = "";
                        $out .= "(" . $row['ID'] . ") " . $row['FirstName'] . " " . $row['LastName'];
                        echo $out;
                    }
                ?>
									<br><b>Doing so will also delete any and all of their assignments. (The events themselves will not be affected)</b>
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
    
    $sql = "DELETE FROM Assignments WHERE PersonID = " . $_GET['delete_id'] . " LIMIT 1;";
    $pdo->query($sql);
    
    echo "<h3>It has been deleted<?h3><br><br><a href='form_hub.php'>Return</a>";
}
?>

									</div>
								</body>
							</html>