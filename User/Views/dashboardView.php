<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        define("TITLE", "Dashboard");
        include_once("Common/headurls.php");
    ?>
    <style>
        .autocomplete {
            position: relative;
            display: inline-block;
        }
        .autocomplete-items {
            position: absolute;
            border: 1px solid #d4d4d4;
            border-bottom: none;
            border-top: none;
            z-index: 99;
            /*position the autocomplete items to be the same width as the container:*/
            top: 100%;
            left: 0;
            right: 0;
        }

        .autocomplete-items div {
            padding: 10px;
            cursor: pointer;
            background-color: #fff; 
            border-bottom: 1px solid #d4d4d4; 
        }

        /*when hovering an item:*/
        .autocomplete-items div:hover {
            background-color: #e9e9e9; 
        }

        /*when navigating through the items using the arrow keys:*/
        .autocomplete-active {
            background-color: DodgerBlue !important; 
            color: #ffffff; 
        }
    </style>
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
                <div class="autocomplete" style='width:600px;'>
                    <input type="text" name="search_field" id="search_field"
                    class='w3-input w3-border w3-round' placeholder='Search patient or family...'>
                </div>
            </div>
            <div style='min-height:400px;'>
                <div style='min-height:100px;'></div>
                <div class='w3-row'>
                    <div class='w3-half'>
                        <div class='w3-margin w3-padding w3-round w3-white w3-center'>
                            <div class='w3-jumbo'>
                                <?php echo $patients_count ?>
                            </div>
                            <div class='w3-large w3-padding'>
                                Patients
                            </div>
                        </div>
                    </div>
                    <div class='w3-half'>
                        <div class='w3-margin w3-padding w3-round w3-white w3-center'>
                            <div class='w3-jumbo'>
                                <?php echo $family_count ?>
                            </div>
                            <div class='w3-large w3-padding'>
                                Families
                            </div>
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
    <script src="../Js/dashboard_search.js"></script>
    <script src="../Js/dashboard.js"></script>
</body>
</html>