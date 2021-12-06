<?php
session_start();

if(isset($_POST)){

	if(isset($_SESSION['login_start']) && $_SESSION['login_start'] == "Yes, started" && isset($_POST['email']) && isset($_POST['password'])){

        require_once("Common/url_details.php");

		$_SESSION['db_join'] = "yes, join";
		require_once("DB/dbconnect.php");
		$password = $_POST['password'];
		
		$stmt = $conn->prepare("SELECT admin_id, admin_name, admin_pass FROM admin WHERE admin_email = ?");
		$stmt->bind_param('s', $email);
		
		$email = $_POST['email'];
		$stmt->execute();
		$result = $stmt->get_result();
		$data = $result->fetch_assoc();
		
		if(password_verify($password, $data['admin_pass'])){
			
			//successfull login
			$conn->close();
			unset($_SESSION['db_join']);
			$_SESSION['login_admin'] = base64_encode($data['admin_name']."#".$data['admin_id']);
			header("Location:User/dashboard".$url_extension);
			
		}
		else{
			echo "Incorrect password";
		}
		
		$conn->close();
		unset($_SESSION['db_join']);
		
	}
	else{
		die("Something went wrong2");
	}
	
}
else{
	
	echo "Something went wrong";
	
}

?>