<?php
session_start();

if(isset($_SESSION['login_start']) && $_SESSION['login_start'] == "Yes, started" && isset($_REQUEST['email']) && isset($_REQUEST['password'])){
		    
    require_once("../Common/url_details.php");

	$_SESSION['db_join'] = "yes, join";
	require_once("../DB/dbconnect.php");
	$password = $_REQUEST['password'];
	$email = $_REQUEST['email'];

	$stmt = $conn->prepare("SELECT admin_pass FROM admin WHERE admin_email = ?");
	$stmt->bind_param('s', $email);
	$stmt->execute();
	$result = $stmt->get_result();
		
	if($result->num_rows <= 0){
			
		$conn->close();
		unset($_SESSION['db_join']);
		die("Incorrect email");
			
	}
		
	$data = $result->fetch_assoc();
		
	if(password_verify($password, $data['admin_pass'])){
		echo "Valid";
	}
	else{
		echo "Incorrect password";
	}
		
	$conn->close();
	unset($_SESSION['db_join']);
		
}
else{
	die("Something went wrong");
}
