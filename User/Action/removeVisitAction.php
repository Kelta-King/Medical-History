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
        
        $patient_id = $data->patient_id;
        $visit_id = $data->visit_id;

        $query = "DELETE FROM visits WHERE v_id = ? AND v_patient = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ii', $visit_id, $patient_id);
        $stmt->execute();

        echo "Visit removed";

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
