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

    $str_json = file_get_contents('php://input');
        
    // Decoding json
    $str_json = base64_decode($str_json);
    $data = json_decode($str_json);
        
    $value = $data->value;

    $json_result = new stdClass;

    $family = array();
    $param = "%".$value."%";
	$query = "SELECT * FROM family WHERE f_name LIKE ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $param);
    $stmt->execute();
    $data = $stmt->get_result();
    
    while($f = $data->fetch_assoc()){
        $f = "f.".$f['f_id']."#".$f['f_name']." (Family members:".$f['f_members'].")";
        array_push($family, $f);
    }

    $json_result->families = $family;

    echo json_encode($json_result);
		
	$conn->close();
	unset($_SESSION['db_join']);
		
}
else{
	die("Something went wrong");
}
