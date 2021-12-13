<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        define("TITLE", "Edit Family");
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
                Edit Family
            </div>
            <div class='w3-content' style='max-width:900px;'>
                <div class='w3-white w3-round w3-margin-top' style='padding:24px 16px;'>
                    <div class='w3-pale-red' id='err'>
                    </div>
                    <div id='family_details' class='w3-border w3-round w3-padding'>
                        <div class='w3-row'>
                            <div class='w3-half'>
                                <div style='margin:8px 4px;'>
                                    <div style='padding:8px 0px;'> Family name<span class='w3-text-red'>*</span> </div>
                                    <input type="text" placeholder="Family name" id='family_name'
                                        class='w3-input w3-round w3-border' value="<?php echo $family['f_name'] ?>">
                                </div>
                            </div>
                            <div class='w3-half'>
                                <div style='margin:8px 4px;'>
                                    <div style='padding:8px 0px;'> Famfily members<span class='w3-text-red'>*</span> </div>
                                    <input type="number" placeholder="Family memebrs" id='family_members'
                                        class='w3-input w3-round w3-border' value="<?php echo $family['f_members'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class='w3-section w3-center'>
                            <button class='w3-button w3-round w3-green kel-hover'
                            onclick='updateFamily(<?php echo $family_id ?>)'> 
                                Update 
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <hr style='border-bottom:0.5px solid gray;'>
            <div class='w3-container w3-center w3-padding'>
                &reg; Patients Record management system By Kushang Shah
            </div>
        </div>
    </div>
    <script src="../Js/common.js"></script>
    <script src="../Js/family.js"></script>
</body>
</html>