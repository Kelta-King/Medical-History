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

    $json_result = new stdClass;

    $family = array();
	$query = "SELECT * FROM family";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $data = $stmt->get_result();
    
    while($f = $data->fetch_assoc()){
        array_push($family, $f);
    }

    $json_result->families = $family;

    $patients = array();
    $query = "SELECT p_id, p_name, p_age FROM patients";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $data = $stmt->get_result();
    
    while($f = $data->fetch_assoc()){
        // $f = $f['p_id'];
        array_push($patients, $f);
    }

    $json_result->patients = $patients;

    echo json_encode($json_result);
		
	$conn->close();
	unset($_SESSION['db_join']);
		
}
else{
	die("Something went wrong");
}
