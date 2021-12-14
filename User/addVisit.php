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
            
            $level = 3;
            $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $_SESSION['lvl3'] = array("name"=>"Add Visit", "url"=>$link);
            
            // Data of the page
            // Getting patient id
            $patient_id = 1;
            if(isset($_GET['id'])){
                $patient_id = (int)$_GET['id'];
            }
            else{
                header("Location:dashboard".$url_extension);
            }

            $query = "SELECT * FROM patients WHERE p_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $patient_id);
            $stmt->execute();

            $data = $stmt->get_result();

            if($data->num_rows < 1){
                die("Incorrect Id");
            }

            $patient = $data->fetch_assoc();
            
            $conn->close();
			unset($_SESSION['db_join']);
            require("Views/addVisitView.php");
        }
    }
    else{
        echo "Something went wrong";
        header("Location:../logout"+$url_extension);
    }
?>
