<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        define("TITLE", "Dashboard");
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
            <div class='w3-bar'>
                <div class='w3-bar-item w3-right'>
                    <a href="addPatient<?php echo $url_extension ?>">
                        <button class='w3-button w3-round kel-hover w3-text-white'
                        style='background-color:#00A36C;'>
                            <i class='fa fa-plus'></i> Add Patient
                        </button>
                    </a>
                </div>
                <div class='w3-bar-item'>
                    <a href="searchPatient<?php echo $url_extension ?>">
                        <button class='w3-button w3-round w3-blue kel-hover'>
                            <i class='fa fa-search'></i> Search Patient
                        </button>
                    </a>
                </div>
                <div class='w3-bar-item'>
                    <a href="searchFamily<?php echo $url_extension ?>">
                        <button class='w3-button w3-round kel-hover w3-text-white'
                        style='background-color:#2AAA8A;'>
                            <i class='fa fa-users'></i> Search Family
                        </button>
                    </a>
                </div>
            </div>
            <hr style='border-bottom:0.5px solid gray;'>
            <div class='w3-content w3-padding-64' style='max-width:600px;'>
                <input type="text" name="search_field" id="search_field"
                class='w3-input w3-border w3-round' placeholder='Search patient or family...'>
            </div>
            <div style='min-height:400px;'></div>
            <hr style='border-bottom:0.5px solid gray;'>
            <div class='w3-container w3-center w3-padding'>
                &reg; Patients Record management system By Kushang Shah
            </div>
        </div>
    </div>

</body>
</html>