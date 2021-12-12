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
            
            $patient = "";
            // Data of the page
            if(isset($_GET['id'])){
                if(is_numeric($_GET['id']) == 1){
                    
                    $patient_id = (int)$_GET['id'];
                    $query = "SELECT patients.*, family.f_id, family.f_name FROM (patients LEFT JOIN family ON patients.p_family = family.f_id) WHERE patients.p_id = ?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param('i', $patient_id);
                    $stmt->execute();

                    $data = $stmt->get_result();
                    
                    if($data->num_rows == 1){
                        $patient = $data->fetch_assoc();
                    }
                    else{
                        die("Something went wrong1");
                    }

                    $query = "SELECT v_id, v_timing, v_complain, v_paid, v_unpaid FROM visits WHERE v_patient = ?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param('i', $patient_id);
                    $stmt->execute();

                    $visits = $stmt->get_result();
                    
                }
                else{
                    die("Something went wrong");
                }
            }
            else{
                $conn->close();
			    unset($_SESSION['db_join']);
                die("Seomthing went wrong");
            }
            
            $conn->close();
			unset($_SESSION['db_join']);
            require("Views/patientView.php");
        }
    }
    else{
        echo "Something went wrong";
        header("Location:../logout"+$url_extension);
    }
?>
