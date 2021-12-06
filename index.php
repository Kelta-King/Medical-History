<?php

session_start();
$_SESSION['login_start'] = "Yes, started";
require("Common/url_details.php");
require("Common/globals.php");
require("Common/kelta_functions.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo CLINIC_NAME ?> Account Login </title>
    <link rel="stylesheet" href="Style/style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <style>
        body{
            font-family: 'Ubuntu', sans-serif;
        }
    </style>
</head>
<body class='' id='login_bg'>
    <div class='w3-content' style=''>
        <div class='w3-round w3-padding w3-white' style='margin-top:100px;'>
            <div class='w3-padding-32'>
                <div class='w3-center'>
                    <h2 class='w3-text-gray'> <?php echo CLINIC_NAME ?> </h2>
                    <h3 class='w3-text-black'> Patient Record Management System  </h3>
                </div>
                <div class='w3-content w3-border-top' style='max-width:430px'>
                    <div class='w3-pale-red' id='err'>
                    </div>
                    <form id='login_form'>
                        <div class='w3-section'>
                            <div style='padding-bottom:6px;'> Email </div>
                            <input type="text" id="email" 
                            class='w3-input w3-border w3-round' placeholder='Email'>
                        </div>
                        <div class='w3-section'>
                            <div style='padding-bottom:6px;'> Password </div>
                            <input type="password" id="password" 
                            class='w3-input w3-border w3-round' placeholder='Password'>
                        </div>
                    </form>
                    <div class='w3-section w3-center'>
                        <button class='w3-button kel-hover w3-green w3-round w3-hover-green'
                        onclick='login()'>
                            Login
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="Js/common.js"></script>
    <script src="Js/index.js"></script>
</body>
</html>

<?php

?>