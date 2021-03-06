<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        define("TITLE", "Search Patient");
        include_once("Common/headurls.php");
    ?>
    <style>
        #members_table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #members_table td,
        #members_table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #members_table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
        }
        
        .autocomplete {
            position: relative;
            display: inline-block;
        }
        .autocomplete-items {
            position: absolute;
            border: 1px solid #d4d4d4;
            border-bottom: none;
            border-top: none;
            z-index: 120;
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
        <?php
            include_once("Common/structure_bar.php");
        ?>
        <div class='w3-light-gray w3-padding'>
            <div class='w3-center w3-xlarge w3-padding w3-margin-top w3-text-dark-gray'>
                Patients List
            </div>
            <hr style='border-bottom:0.5px solid gray;'>
            <div class='w3-container' style=''>
            <div class='w3-white w3-round' style='padding:16px 16px 32px 16px;'>
                <div class='w3-row' style='padding-bottom:32px;'>
                    <div class='w3-jumbo w3-center'>
                        <i class='fa fa-microphone' title="Speak to search"
                        onclick="audioToTextInInput('search_field', this)"></i>
                    </div>
                    <div class='autocomplete w3-col l10 m10 s8'>
                        <input type="text" placeholder='Search patients...' 
                        name="search_field" id="search_field" class='w3-input w3-round w3-border'>
                    </div>
                    <div class='w3-col l2 m2 s4'>
                        <button class="w3-input w3-button w3-round w3-blue kel-hover"
                        onclick="searchPatient()"> 
                            <i class='fa fa-search'></i> 
                        </button>
                    </div>
                </div>
                <table id='members_table' class='w3-padding'>
                <tr>
                    <th>Id</th>
                    <th>Name (Age)</th>
                    <th>Family</th>
                    <th>Operations</th>
                </tr>
                <?php
                    while($patient = $patients->fetch_assoc()){
                ?>
                <tr>
                    <td>
                        P.<?php echo $patient['p_id']  ?>
                    </td>
                    <td>
                        <?php echo $patient['p_name']  ?> (<?php echo $patient['p_age'] ?>)
                    </td>
                    <td>
                        
                        <?php 
                            if(is_null($patient['f_name'])){
                                echo "Not assigned";
                            }
                            else{
                        ?>
                        <a href="family<?php echo $url_extension ?>?id=<?php echo $patient['f_id']  ?>">
                            <?php echo $patient['f_name'] ?>
                        </a>
                        <?php
                            }
                        ?>
                        
                    </td>
                    <td>
                        <a href="editPatient<?php echo $url_extension ?>?id=<?php echo $patient['p_id'] ?>"
                        style='text-decoration:none;'>
                            <button class='w3-button kel-hover w3-round w3-green' title='Edit Patient'>
                                <i class='fa fa-pencil'></i>
                            </button>
                        </a>
                        <button class='w3-button kel-hover w3-round w3-red' title='Remove Patient'
                        onclick="removePatient(<?php echo $patient['p_id'] ?>)">
                            <i class='fa fa-times'></i>
                        </button>
                        <a href="patient<?php echo $url_extension ?>?id=<?php echo $patient['p_id'] ?>">
                            <button class='w3-button kel-hover w3-round w3-blue' title='View Patient'>
                                <i class='fa fa-eye'></i>
                            </button>
                        </a>
                    </td>
                </tr>
                <?php
                    }
                ?>
                </table>
            </div>
            <div class='w3-center w3-margin-top'>
            <?php

                $previous_disabled = false;
                $next_disabled = false;

                if($page == 1){
                    $previous_disabled = true;
                }

                if($page == $total_buttons){
                    $next_disabled = true;
                }
                        
            ?>
                <button class='w3-button w3-green w3-round kel-hover' onclick="window.location.href='searchPatient<?php echo $url_extension ?>?page=<?php echo $page-1 ?>'"
                <?php if($previous_disabled){ echo "disabled"; } ?> title='Previous'>
                    <i class='fa fa-arrow-left'></i>
                </button>
                <?php
                    // Incorrect page value provided
                    if($total_buttons < $page){

                    }
                    // If total buttons are less than or equal to 5
                    elseif($total_buttons <= 5){
                        // Display every buttons
                        for ($i=1; $i <= $total_buttons; $i++) { 
                ?>
                <button class='w3-button <?php if($i == $page){ echo "w3-border"; } ?> w3-round kel-hover' title='<?php echo $i ?>'
                    onclick="window.location.href='searchPatient<?php echo $url_extension ?>?page=<?php echo $i ?>'">
                    <?php echo $i ?>
                </button>
                <?php
                        }
                    }
                    // else if entries are more than 5
                    else{
                        // Display total 5 buttons.
                        // First and last.
                        // page's next and previous buttons
                        $distance_from_first = $page;
                        $distance_from_last = $total_buttons - $page;
                        // echo "<br>".$distance_from_first."<br>";
                        // echo $distance_from_last."<br>";
                        if($distance_from_first < 3){
                ?>
                    <button class='w3-button <?php if(1 == $page){ echo "w3-border"; } ?> w3-round kel-hover' title='1'
                    onclick="window.location.href='searchPatient<?php echo $url_extension ?>?page=1'">
                        1
                    </button>
                    <button class='w3-button <?php if(2 == $page){ echo "w3-border"; } ?> w3-round kel-hover' title='2'
                    onclick="window.location.href='searchPatient<?php echo $url_extension ?>?page=2'">
                        2
                    </button>
                    <button class='w3-button <?php if(3 == $page){ echo "w3-border"; } ?> w3-round kel-hover' title='3'
                    onclick="window.location.href='searchPatient<?php echo $url_extension ?>?page=3'">
                        3
                    </button>
                    <span class='w3-center' style='width:30px;'>...</span>
                    <button class='w3-button <?php if($total_buttons == $page){ echo "w3-border"; } ?> w3-round kel-hover' title='<?php echo $total_buttons ?>'
                    onclick="window.location.href='searchPatient<?php echo $url_extension ?>?page=<?php echo $total_buttons ?>'">
                        <?php echo $total_buttons ?>
                    </button>
                <?php
                        }
                        elseif($distance_from_last < 2){
                ?>
                    <button class='w3-button <?php if(1 == $page){ echo "w3-border"; } ?> w3-round kel-hover' title='1'
                    onclick="window.location.href='searchPatient<?php echo $url_extension ?>?page=1'">
                        1
                    </button>
                    <span class='w3-center' style='width:30px;'>...</span>
                    <button class='w3-button <?php if($total_buttons-2 == $page){ echo "w3-border"; } ?> w3-round kel-hover' title='<?php echo $total_buttons-2 ?>'
                    onclick="window.location.href='searchPatient<?php echo $url_extension ?>?page=<?php echo $total_buttons-2 ?>'">
                        <?php echo $total_buttons-2 ?>
                    </button>
                    <button class='w3-button <?php if($total_buttons-1 == $page){ echo "w3-border"; } ?> w3-round kel-hover' title='<?php echo $total_buttons-1 ?>'
                        onclick="window.location.href='searchPatient<?php echo $url_extension ?>?page=<?php echo $total_buttons-1 ?>'">
                    <?php echo $total_buttons-1 ?>
                    </button>
                    <button class='w3-button <?php if($total_buttons == $page){ echo "w3-border"; } ?> w3-round kel-hover' title='<?php echo $total_buttons ?>'
                    onclick="window.location.href='searchPatient<?php echo $url_extension ?>?page=<?php echo $total_buttons ?>'">
                        <?php echo $total_buttons ?>
                    </button>
                <?php
                        }
                        else{
                ?>
                    <button class='w3-button <?php if(1 == $page){ echo "w3-border"; } ?> w3-round kel-hover' title='1'
                    onclick="window.location.href='searchPatient<?php echo $url_extension ?>?page=1'">
                        1
                    </button>
                <?php
                            if(($page-1) != 2){
                ?>
                    <span class='w3-center' style='width:30px;'>...</span>
                <?php
                            }
                ?>
                    <button class='w3-button w3-round kel-hover' title='<?php echo $page-1 ?>'
                        onclick="window.location.href='searchPatient<?php echo $url_extension ?>?page=<?php echo $page-1; ?>'">
                        <?php echo $page-1 ?>
                    </button>
                    <button class='w3-button w3-border w3-round kel-hover' title='<?php echo $page ?>'
                        onclick="window.location.href='searchPatient<?php echo $url_extension ?>?page=<?php echo $page; ?>'">
                        <?php echo $page ?>
                    </button>
                    <button class='w3-button w3-round kel-hover' title='<?php echo $page+1 ?>'
                        onclick="window.location.href='searchPatient<?php echo $url_extension ?>?page=<?php echo $page+1; ?>'">
                        <?php echo $page+1 ?>
                    </button>
                <?php
                            if(($page+1)+1 != $total_buttons){
                ?>
                    <span class='w3-center' style='width:30px;'>...</span>
                <?php
                                }
                ?>
                    <button class='w3-button <?php if($total_buttons == $page){ echo "w3-border"; } ?> w3-round kel-hover' title='<?php echo $total_buttons ?>'
                        onclick="window.location.href='searchPatient<?php echo $url_extension ?>?page=<?php echo $total_buttons ?>'">
                        <?php echo $total_buttons ?>
                    </button>
                <?php
                        }

                    }

                ?>  
                    <button class='w3-button w3-green w3-round kel-hover' onclick="window.location.href='searchPatient<?php echo $url_extension ?>?page=<?php echo $page+1 ?>'"
                    <?php if($next_disabled){ echo "disabled"; } ?> title='Next'>
                        <i class='fa fa-arrow-right'></i>
                    </button>
                        
            </div>
            </div>
            <hr style='border-bottom:0.5px solid gray;'>
            <div class='w3-container w3-center w3-padding'>
                &reg; Patients Record management system By Kushang Shah
            </div>
        </div>
    </div>
    <script src="../Js/common.js"></script>
    <script src="../Js/search.js"></script>
    <script src="../Js/searchpatient.js"></script>
</body>
</html>