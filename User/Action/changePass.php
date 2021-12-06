<?php
session_start();

if(isset($_SESSION['login_admin']) && isset($_REQUEST['new_pass']) && isset($_REQUEST['old_pass'])){
		    
    require_once("../../Common/url_details.php");

	$_SESSION['db_join'] = "yes, join";
	require_once("../../DB/dbconnect.php");
	$new_pass = $_REQUEST['new_pass'];
	$old_pass = $_REQUEST['old_pass'];

    $data = base64_decode($_SESSION['login_admin']);
    $data = explode("#", $data);

    $admin_id = $data[1];
    $admin_name = $data[0];

	$stmt = $conn->prepare("SELECT admin_pass FROM admin WHERE admin_id = ?");
	$stmt->bind_param('i', $admin_id);
	$stmt->execute();
	$result = $stmt->get_result();
		
	if($result->num_rows <= 0){
			
		$conn->close();
		unset($_SESSION['db_join']);
		die("Something went wrong");
			
	}
		
	$data = $result->fetch_assoc();
		
	if(password_verify($old_pass, $data['admin_pass'])){
		
        // Valid pass
        $options = [
            'cost' => 12,
        ];

        $new_pass = password_hash($new_pass, PASSWORD_BCRYPT, $options);
        $stmt = $conn->prepare("UPDATE admin SET admin_pass = ? WHERE admin_id = ?");
        $stmt->bind_param('si', $new_pass, $admin_id);
        $stmt->execute();
	}
	else{
		echo "Incorrect old password";
	}
		
	$conn->close();
	unset($_SESSION['db_join']);
		
}
else{
	die("Something went wrong");
}
