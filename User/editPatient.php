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
            $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $_SESSION['lvl2'] = array("name"=>"Edit Patient", "url"=>$link);
            
            // Data of the page
            $patient_id = 0;
            if($_GET['id']){
                $patient_id = (int)$_GET['id'];
            }

            if($patient_id == 0){
                die("Something went wrong");
            }

            $query = "SELECT * FROM (patients LEFT JOIN family ON patients.p_family = family.f_id) WHERE p_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('i', $patient_id);
            $stmt->execute();

            $data = $stmt->get_result();

            if($data->num_rows <= 0){
                die("This patient does not exist");
            }

            $patient = $data->fetch_assoc();

            $query = "SELECT * FROM family";
            $stmt = $conn->prepare($query);
            $stmt->execute();

            $families = $stmt->get_result();
            
            $conn->close();
			unset($_SESSION['db_join']);
            require("Views/editPatientView.php");
        }
    }
    else{
        echo "Something went wrong";
        header("Location:../logout"+$url_extension);
    }
?>
