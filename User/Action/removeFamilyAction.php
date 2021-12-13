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

        $query = "SELECT COUNT(p_id) FROM patients WHERE p_family = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $family_id);
        $stmt->execute();

        $data = $stmt->get_result()->fetch_assoc();
        $members_count = (int)$data['COUNT(p_id)'];

        if($members_count <= 0){
            $query = "DELETE FROM family WHERE f_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('i', $family_id);
            $stmt->execute();
        }
        else{
            $conn->close();
	        unset($_SESSION['db_join']);
            die("Error: Family containing memebrs cannot be deleted");
        }

        echo "Family removed";

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
