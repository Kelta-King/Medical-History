<?php
session_start();

if(isset($_POST)){
	
	if(isset($_SESSION['admin_process']) && $_SESSION['admin_process'] == "start" && isset($_REQUEST['email']) && isset($_REQUEST['password'])){
		    
        require_once("../../../Common/htadetails.php");

		$_SESSION['db_join'] = "yes, join";
		require_once("../DB/dbconnect.php");
		$password = $_REQUEST['password'];
		
		$stmt = $conn->prepare("SELECT admin_pass FROM admins WHERE admin_email = ?");
		$stmt->bind_param('s', $email);
		
		$email = $_REQUEST['email'];
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
	
}
else{
	
	echo "Something went wrong";
	
}