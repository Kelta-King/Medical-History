<?php
session_start();

if(isset($_SESSION['login_admin'])){
		    
    require_once("../../Common/url_details.php");

	$_SESSION['db_join'] = "yes, join";
	require_once("../../DB/dbconnect.php");

    $data = base64_decode($_SESSION['login_admin']);
    $data = explode("#", $data);

    $admin_id = $data[1];
    $admin_name = $data[0];

	try {
        $str_json = file_get_contents('php://input');
        
        // Decoding json
        $str_json = base64_decode($str_json);
        $data = json_decode($str_json);
        
        $family_id = $data->family_id;
        $patient_id = $data->patient_id;

        $query = "UPDATE patients SET p_family = NULL WHERE p_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $patient_id);
        $stmt->execute();

        $query = "UPDATE family SET f_members = f_members-1 WHERE f_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $family_id);
        $stmt->execute();

        echo "Member removed";

    } 
    catch (\Throwable $th) {
        echo $th;
        echo "Error:Something went wrong";
    }
		
	$conn->close();
	unset($_SESSION['db_join']);
		
}
else{
	die("Something went wrong");
}
