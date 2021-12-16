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

        $patient_id = $data->p_id;
        $family_id = $data->f_id;
        
        $patient_id = explode(".", $patient_id)[1];
        $family_id = explode(".", $family_id)[1];

        $query = "SELECT p_family FROM patients WHERE p_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $patient_id);
        $stmt->execute();

        $data = $stmt->get_result();

        if($data->num_rows <= 0){
            die("Error: Incorrect patient id");
        }

        $data = $data->fetch_assoc();

        if(is_null($data['p_family'])){
            
            // Patients family set
            $query = "UPDATE patients SET p_family = ? WHERE p_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ii",$family_id ,$patient_id);
            $stmt->execute();

            // Family memebrs count update
            $query = "UPDATE family SET f_members = f_members + 1 WHERE f_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i",$family_id);
            $stmt->execute();

        }
        else{

            $old_family_id = $data['p_family'];

            // Patients family set
            $query = "UPDATE patients SET p_family = ? WHERE p_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ii",$family_id ,$patient_id);
            $stmt->execute();

            // Family memebrs count update
            $query = "UPDATE family SET f_members = f_members + 1 WHERE f_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i",$family_id);
            $stmt->execute();

            $query = "UPDATE family SET f_members = f_members - 1 WHERE f_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i",$old_family_id);
            $stmt->execute();

        }

        echo "Member assigmed";

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
