<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        define("TITLE", "Edit Account");
        include_once("Common/headurls.php");
    ?>
</head>
<body class=''>
    <?php
        include_once("Common/header.php");
    ?>

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
                Edit Account Details
            </div>
            <div class='w3-content' style='max-width:500px;'>
                <div class='w3-white w3-round w3-margin-top' 
                style='padding:24px 16px;'>
                    <div class='w3-pale-red' id='err'>
                    </div>
                    <form id="change_form">
                    <div class='w3-section'>
                        <div class='w3-text-gray' style='padding:8px 0px;'>Admin Email</div>
                        <input type="email" placeholder="Admin email"
                        value = "<?php echo $admin_data['admin_email'] ?>"
                        id='email' class='w3-input w3-round w3-border'>
                    </div>
                    <div class='w3-section'>
                    <div class='w3-text-gray' style='padding:8px 0px;'>Admin Name</div>
                        <input type="text" placeholder="Admin name"
                        value = "<?php echo $admin_data['admin_name'] ?>"
                        id='name' class='w3-input w3-round w3-border'>
                    </div>
                    </form>
                    <div class='w3-section w3-center'>
                        <button class='w3-button w3-green kel-hover w3-round'
                        onclick='changeDetails()'>
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