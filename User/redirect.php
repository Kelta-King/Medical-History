<?php
    session_start();
    
    require("../Common/url_details.php");
    require("../Common/globals.php");
    require("../Common/kelta_functions.php");

    if(isset($_SESSION['login_admin']))
        
        // Used to redirect in family and patient search combined
        if(isset($_GET['value'])){

            require_once("../Common/url_details.php");

            $value = $_GET['value'];
            $value = explode(".", $value);
            
            if($value[0] == "p"){
                header("Location:patient".$url_extension."?id=".$value[1]);
            }
            else if($value[0] == "f"){
                header("Location:family".$url_extension."?id=".$value[1]);
            }
            else{
                die("Something went wrong");
            }

        }
        else{
            die("Something went wrong");
        }
    }
    else{
        echo "Something went wrong";
        header("Location:../logout".$url_extension);
    }

?>