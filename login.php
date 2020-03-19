<?php
session_start();
require 'password.php';
if ( !empty($_POST)) { // if $_POST filled then process the form

	// initialize $_POST variables
	$username = $_POST['username']; // username is email address
	$password = $_POST['password'];
	$passwordhash = MD5($password);
	// echo $password . " " . $passwordhash; exit();
	// robot 87b7cb79481f317bde90c116cf36084b
		
	// verify the username/password
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM People WHERE Email = ? AND Password = ? LIMIT 1";
	$q = $pdo->prepare($sql);
	$q->execute(array($username,$passwordhash));
	$data = $q->fetch(PDO::FETCH_ASSOC);
	
	if($data) { // if successful login set session variables
		echo "success!";
		$_SESSION['person_id'] = $data['ID'];
		$sessionid = $data['ID'];
		$_SESSION['person_title'] = $data['Admin'];
		header("Location: Database/flights_app.php?id=$sessionid ");
		// javascript below is necessary for system to work on github
		echo "<script type='text/javascript'> document.location = 'Database/flights_app.php'; </script>";
		exit();
	}
	else { // otherwise go to login error page
		header("Location: login_error.php");
	}
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="Database/css/bootstrap.min.css" rel="stylesheet">
    <script src="Database/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">

		<div class="span10 offset1">
			
			<!--
			<div class="row">
				<br />
				<p style="color: red;">System temporarily unavailable.</p>
			</div>
			-->

			<div class="row">
				<h3>User Login</h3>
			</div>

			<form class="form-horizontal" action="login.php" method="post">
								  
				<div class="control-group">
					<label class="control-label">Username (Email)</label>
					<div class="controls">
						<input name="username" type="text"  placeholder="me@email.com" required> 
					</div>	
				</div> 
				
				<div class="control-group">
					<label class="control-label">Password</label>
					<div class="controls">
						<input name="password" type="password" placeholder="not your SVSU password, please" required> 
					</div>	
				</div> 

				<div class="form-actions">
					<button type="submit" class="btn btn-success">Sign in</button>
					&nbsp; &nbsp;
					<a class="btn btn-primary" href="new_user.php">Join (New User)</a>
				</div>
				
				<p><strong>Dear NEW Users</strong>: Please register by clicking the blue "Join" button above.</p>
				<p><strong>Dear Registered Users</strong>: To log in, use your email address and password, and click the green "sign in" button.</p>
				<p><strong>Regarding passwords</strong>: Please create a new unique password for this site. <strong><em><span style="color: red;">Please do not use your regular SVSU password.</span><em></strong> If you forgot your password, to RE-SET your password for this site email "re-set password" to: Zachary Barkey, zgbarkey@svsu.edu.</p>
				
				<br />
				
			</form>


		</div> <!-- end div: class="span10 offset1" -->
				
    </div> <!-- end div: class="container" -->

  </body>
  
</html>