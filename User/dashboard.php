<?php
    session_start();
    
    require("../Common/url_details.php");
    require("../Common/globals.php");
    require("../Common/kelta_functions.php");

    if(isset($_SESSION['login_admin'])){
        
        $data = base64_decode($_SESSION['login_admin']);
        $data = explode("#", $data);

        if(count($data) != 2){
            echo "Something went wrong";
            header("Location:../logout"+$url_extension);
        }
        else{
            $admin_id = $data[1];
            $admin_name = $data[0];
            $_SESSION['db_join'] = "yes, join";
            require_once("../DB/dbconnect.php");

            $level = 1;
            
            // Data of the page
            $query = "SELECT COUNT(f_id) FROM family";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $family_count = $stmt->get_result()->fetch_assoc()['COUNT(f_id)'];

            $query = "SELECT COUNT(p_id) FROM patients";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $patients_count = $stmt->get_result()->fetch_assoc()['COUNT(p_id)'];
            
            $conn->close();
			unset($_SESSION['db_join']);
            require("Views/dashboardView.php");
        }
    }
    else{
        echo "Something went wrong";
        header("Location:../logout"+$url_extension);
    }
?>
