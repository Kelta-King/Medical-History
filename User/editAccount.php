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
            $query = "SELECT admin_email, admin_name FROM admin WHERE admin_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('i', $admin_id);
            $stmt->execute();
            $admin_data = $stmt->get_result()->fetch_assoc();
            
            $conn->close();
			unset($_SESSION['db_join']);
            require("Views/editAccountView.php");
        }
    }
    else{
        echo "Something went wrong";
        header("Location:../logout"+$url_extension);
    }
?>
