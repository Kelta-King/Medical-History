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
            
            // Data of the page
            $page = 1;
            $number_per_page = 5;
            
            if(isset($_GET['page'])){
                $page = (int)$_GET['page'];
            }
            $start = ($page-1)*$number_per_page;
        
            $query = "SELECT p_id, p_name, p_age, f_name, f_id FROM (patients LEFT JOIN family ON patients.p_family = family.f_id) ORDER BY p_id DESC LIMIT ?, ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('ii', $start, $number_per_page);
            $stmt->execute();

            $patients = $stmt->get_result();

            $query = "SELECT COUNT(p_id) FROM patients";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $data = $stmt->get_result()->fetch_assoc();
            $total_entries = $data['COUNT(p_id)'];

            $fraction = ($total_entries/$number_per_page);
            $int_convert = (int)$fraction;

            $total_buttons = $int_convert;
            if(($fraction-$int_convert) > 0){
                $total_buttons += 1;
            }

            if($page <= 0 || $page > $total_buttons){
                header("Location:searchPatient".$url_extension);
            }

            $conn->close();
			unset($_SESSION['db_join']);
            require("Views/searchPatientView.php");
        }
    }
    else{
        echo "Something went wrong";
        header("Location:../logout"+$url_extension);
    }
?>
