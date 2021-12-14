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
            
            $level = 2;
            
            // Data of the page
            $family_id = 0;
            if(isset($_GET['id'])){
                $family_id = (int)$_GET['id'];
            }

            if($family_id == 0){
                header("Location:dashboard".$url_extension);
            }

            $query = "SELECT * FROM family WHERE f_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('i', $family_id);
            $stmt->execute();
            
            $data = $stmt->get_result();

            if($data->num_rows <= 0){
                die("Incorrect family");
            }

            $family = $data->fetch_assoc();
            
            $conn->close();
			unset($_SESSION['db_join']);
            require("Views/editFamilyView.php");
        }
    }
    else{
        echo "Something went wrong";
        header("Location:../logout"+$url_extension);
    }
?>
