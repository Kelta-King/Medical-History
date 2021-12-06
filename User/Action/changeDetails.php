<?php
session_start();

if(isset($_SESSION['login_admin']) && isset($_REQUEST['email']) && isset($_REQUEST['name'])){
		    
    require_once("../../Common/url_details.php");

	$_SESSION['db_join'] = "yes, join";
	require_once("../../DB/dbconnect.php");
	$name = $_REQUEST['name'];
	$email = $_REQUEST['email'];

    $data = base64_decode($_SESSION['login_admin']);
    $data = explode("#", $data);

    $admin_id = $data[1];
    $admin_name = $data[0];

	$stmt = $conn->prepare("UPDATE admin SET admin_email = ?, admin_name = ? WHERE admin_id = ?");
	$stmt->bind_param('ssi', $email, $name, $admin_id);
	$stmt->execute();
	$result = $stmt->get_result();
		
	$conn->close();
	unset($_SESSION['db_join']);
		
}
else{
	die("Something went wrong");
}
