<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        define("TITLE", "change password");
        include_once("Common/headurls.php");
    ?>
</head>
<body class=''>
    <div class="w3-bar w3-top w3-large w3-margin" style="z-index:4">
        <button class="w3-bar-item w3-button w3-hide-large w3-hover-none kel-hover w3-hover-text-black" 
        onclick="nav_open();" id='bars'><i class="fa fa-bars"></i></button>
        <div class='w3-hide-small w3-hide-medium' style='width:300px;'></div>
        <div class='w3-bar-item w3-large w3-text-dark-gray' style='margin-left:300px;'>
            Patient Records Management System
        </div>
        <div class="w3-bar-item w3-right w3-border-left"
        style='padding:8px 16px 8px 32px;margin-right:32px;'
        onclick='openDropDown()'>
            <i class='fa fa-user-circle-o w3-text-gray w3-large kel-hover'></i>
        </div>
        
    </div>
    <!-- Dropdown for logout and account -->
    <div class='w3-display-topright w3-padding' id='dropdown'
    style='z-index:9;margin-top:75px;margin-right:0px;display:none;'>
        <div class='w3-round w3-white w3-padding w3-card'>
            <div class='w3-bar-block'>
                <a href="passwordChange<?php echo $url_extension ?>"
                style='text-decoration:none;'>
                    <div class="w3-bar-item w3-button w3-hover-none"> 
                        <i class='fa fa-key' style='padding-right:8px;'></i> Change password 
                    </div>
                </a>
                <a href="editAccount<?php echo $url_extension ?>"
                style='text-decoration:none;'>
                    <div class="w3-bar-item w3-button w3-hover-none"
                    style='padding-bottom:14px;'> 
                        <i class='fa fa-pencil' style='padding-right:8px;'></i> Edit details 
                    </div>
                </a>
                <a href="../logout<?php echo $url_extension ?>"
                style='text-decoration:none;'>
                    <div class="w3-bar-item w3-border-top w3-button w3-hover-none"
                    style='padding-top:14px;'> 
                        <i class='fa fa-sign-out' style='padding-right:8px;'></i> Log out 
                    </div>
                </a>
            </div>
        </div>
    </div>
    <script>
        function openDropDown(){
            if(document.getElementById("dropdown").style.display == "block"){
                document.getElementById("dropdown").style.display = "none";
            }
            else{
                document.getElementById("dropdown").style.display = "block";
            }
        }
    </script>
    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" 
    onclick="nav_close()" style="cursor:pointer" 
    title="close side menu" id="myOverlay"></div>

    <!-- Nav bar -->
    <?php
        include_once("Common/sidenav.php");
    ?>
    <div class='w3-main w3-white' style="margin-left:300px;">
        <div style='height:80px;'>
            <!-- Blank space for top bar -->
        </div>
        <div class='w3-light-gray w3-padding'>
            <div class='w3-center w3-xlarge w3-padding w3-margin-top'>
                Change Password
            </div>
            <div class='w3-content' style='max-width:500px;'>
                <div class='w3-white w3-round w3-margin-top' 
                style='padding:24px 16px;'>
                    <div class='w3-pale-red' id='err'>
                    </div>
                    <form id="change_form">
                    <div class='w3-section'>
                        <div class='w3-text-gray' style='padding:8px 0px;'>
                            Old password
                        </div>
                        <input type="password" placeholder="Old password"
                        id='old_pass' class='w3-input w3-round w3-border'>
                    </div>
                    <div class='w3-section'>
                        <div class='w3-text-gray' style='padding:8px 0px;'>
                            New password
                        </div>
                        <input type="password" placeholder="New password"
                        id='new_pass' class='w3-input w3-round w3-border'>
                    </div>
                    </form>
                    <div class='w3-section w3-center'>
                        <button class='w3-button w3-green kel-hover w3-round'
                        onclick='changePass()'>
                            <i class='fa fa-exchange'></i> Change
                        </button>
                    </div>
                </div>
                <div class='w3-padding-16'></div>
            </div>
            <hr style='border-bottom:0.5px solid gray;'>
            <div class='w3-container w3-center w3-padding'>
                &reg; Patients Record management system By Kushang Shah
            </div>
        </div>
    </div>
    <script src="../Js/common.js"></script>
    <script src="../Js/change.js"></script>
</body>
</html>