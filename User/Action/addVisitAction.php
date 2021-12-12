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

        if($data->timings == "Yes" || $data->timings == ""){
            // Current timings
            $query = "INSERT INTO visits (v_complain, v_diagnose, v_treatment, v_paid, v_unpaid, v_patient) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sssssi", $data->complain, $data->diagnose, $data->treatment, $data->paid, $data->unpaid, $patient_id);
            $stmt->execute();
        }
        else{
            // Manual timings
            $timings = $data->timings;
            $query = "INSERT INTO visits (v_timing, v_complain, v_diagnose, v_treatment, v_paid, v_unpaid, v_patient) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssssssi", $timings, $data->complain, $data->diagnose, $data->treatment, $data->paid, $data->unpaid, $patient_id);
            $stmt->execute();
        }

        echo "Visit added";

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
