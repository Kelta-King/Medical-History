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
            
            $patient_id = 0;
            $visit_id = 0;
            
            // Getting patient_id
            if(isset($_GET['patient'])){
                $patient_id = (int)$_GET['patient'];
            }
            else{
                header("Location:dashboard".$url_extension);
            }

            // Getting visit id
            if(isset($_GET['visit'])){
                $visit_id = (int)$_GET['visit'];
            }
            else{
                header("Location:dashboard".$url_extension);
            }
            
            $level = 3;
            $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $_SESSION['lvl3'] = array("name"=>"Edit Visit", "url"=>$link);
            
            // Data of the page
            $query = "SELECT p_id, p_name, visits.* FROM (patients INNER JOIN visits ON patients.p_id = visits.v_patient) WHERE v_id = ? AND p_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('ii', $visit_id, $patient_id);
            $stmt->execute();
            $data = $stmt->get_result();

            if($data->num_rows <= 0){
                die("This visit does not exist");
            }

            $visit = $data->fetch_assoc();
            
            $conn->close();
			unset($_SESSION['db_join']);
            require("Views/editVisitView.php");
        }
    }
    else{
        echo "Something went wrong";
        header("Location:../logout".$url_extension);
    }
?>
