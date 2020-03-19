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
if(!empty($_GET)){
	echo "<div class='row'><h2>Update the Entry</h2></div>";
    $id = $_GET['personID'];
    $FName;
    $LName;
    $Phone;
    
    $sql = "SELECT * FROM People WHERE  ID = " . $id;
    foreach($pdo->query($sql) as $row){
        $FName = $row['FirstName'];
        $LName = $row['LastName'];
        $Phone = $row['PhoneNumber'];
    }
?>
					<div class='row'>
						<form method='post' action='update_form.php'>
							<input type='hidden' name='id' value='<?php echo $id; ?>'>
								<label>First Name: </label><input type='text' name='NewF' value='<?php echo $FName; ?>'>
									<label>Last Name: </label><input type='text' name='NewL' value='<?php echo $LName; ?>'>
										<label>Phone Number: </label><input type='text' name='NewP' value='<?php echo $Phone; ?>'>
											<br>
												<input type='submit' value='Submit'>
												</form>
											</div>
											<br>
												<div class='row'>
													<form action='form_hub.php'>
														<input type='submit' value='Back'>
														</form>
													</div>

													<?php
}
 if(!empty($_POST)){
     $id = $_POST['id'];
     $FName = $_POST['NewF'];
     $LName = $_POST['NewL'];
     $Phone = $_POST['NewP'];
     
     $sql = "UPDATE People SET FirstName = '" . $FName . "', LastName = '" . $LName . "', PhoneNumber = '" . $Phone . "' WHERE ID = " . $id;
     $pdo->query($sql);
     
     echo "<h1>Hopefully it was updated: <a href='form_hub.php'>Go and check!</a></h1>";
 }   
?>
												</div>
											</body>
										</html>