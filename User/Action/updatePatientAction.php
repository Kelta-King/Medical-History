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
        $name = $data->name;
        $age = $data->age;
        $gender = $data->gender;
        $address = $data->address;
        $mobile_number = $data->mobile_number;

        $query = "UPDATE patients SET p_name = ?, p_age = ?, p_gender = ?, p_address = ?, p_mobile_no = ? WHERE p_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sisssi', $name, $age, $gender, $address, $mobile_number, $patient_id);
        $stmt->execute();

        echo "Patient updated";

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
