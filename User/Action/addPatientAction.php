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
        
        $family = $data->new_family;
        if($data->new_family == "Yes"){
            
            $family_name = $data->name." and Family";
            $query = "SELECT * FROM family WHERE f_name = ?";
            
            $stmt = $conn->prepare($query);
            $stmt->bind_param('s', $family_name);
            
            $stmt->execute();
            $result = $stmt->get_result();
            
            if($result->num_rows > 0){
                // This family name already exist
                $conn->close();
	            unset($_SESSION['db_join']);
                die("Error:This man's family name already exist. Please write a unique patient name to avoid confusion in future.");
            }

            $query = "INSERT INTO family (f_name) VALUES (?)";
            $stmt = $conn->prepare($query);
            
            $stmt->bind_param('s', $family_name);
            $stmt->execute();
            
            $family = $conn->insert_id;
            
        }
        else if($data->new_family == ""){
            $family = null;
        }
        else if(is_numeric($data->new_family) == 1){
            $query = "UPDATE family SET f_members = f_members + 1 WHERE f_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $data->new_family);
            $stmt->execute();
        }
        else{
            die("Error:Something went wrong. Non integer value received for family.");
        }

        if($data->gender == ""){
            $data->gender = null;
        }

        $query = "INSERT INTO patients (p_name, p_age, p_gender, p_address, p_mobile_no, p_family) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sisssi", $data->name, $data->age, $data->gender, $data->address, $data->mobile_number, $family);
        $stmt->execute();

        $patient_id = $conn->insert_id;

        if($patient_id <= 0){
            die("Error:Something went wrong");
        }

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

        echo "Patient added";

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
