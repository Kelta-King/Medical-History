<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        define("TITLE", "Patient");
        include_once("Common/headurls.php");
    ?>
    <style>
        #visits_table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #visits_table td, #visits_table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #visits_table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
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
            <div class='w3-center w3-xlarge w3-padding w3-margin-top w3-text-dark-gray'>
                Patient Records
            </div>
            <hr style='border-bottom:0.5px solid gray;'>
            <div class='w3-container' style=''>
                <div class='w3-row'>
                    <div class='w3-col l8 m8 s8'>
                        <div class='w3-padding w3-round w3-white kel-shadow w3-leftbar w3-border-green' 
                        style='margin-right:16px;'>
                            <table>
                                <tr>
                                    <td class='w3-text-green w3-padding-16' style='padding-right:16px;'> Patient Name </td>
                                    <td class='w3-large w3-padding-16' style='padding-left:8px;'> <?php echo $patient['p_name'] ?> </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class='w3-col l4 m4 s4'>
                        <div class='w3-padding w3-round w3-white kel-shadow w3-leftbar w3-border-green' 
                        style='margin-left:16px;'>
                            <table>
                                <tr>
                                    <td class='w3-text-green w3-padding-16' style='padding-right:16px;'> Patient No. </td>
                                    <td class='w3-large w3-padding-16' style='padding-left:8px;'> P.<?php echo $patient_id ?> </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class='w3-row w3-padding-16'>
                    <div class='w3-col l4 m4 s4'>
                        <div class='w3-round w3-white kel-shadow' 
                        style='margin-right:16px;'>
                            <div class='w3-bar w3-round w3-border-bottom w3-border-light-gray'
                            style='background-color:#f8f8f8'>
                                <div class='w3-bar-item w3-text-green'
                                style='padding:16px 24px;'>
                                    Details
                                </div>
                                <div class='w3-bar-item w3-right'
                                style='padding:16px 24px;'>
                                    <a href="">
                                        <i class='fa fa-pencil-square-o w3-large'></i>
                                    </a>
                                </div>
                            </div>
                            <div class='w3-padding'>
                                <div class='w3-section'>
                                    <div class='w3-text-gray'>
                                        Address:
                                    </div>
                                    <div class='kel-bold w3-text-dark-gray w3-large'>
                                        <?php echo $patient['p_address'] ?>
                                    </div>
                                </div>
                                <div class='w3-section' style='padding-top:16px;'>
                                    <div class='w3-text-gray'>
                                        Age:
                                    </div>
                                    <div class='kel-bold w3-text-dark-gray w3-large'>
                                        <?php echo $patient['p_age'] ?>
                                    </div>
                                </div>
                                <div class='w3-section' style='padding-top:16px;'>
                                    <div class='w3-text-gray'>
                                        Gender:
                                    </div>
                                    <div class='kel-bold w3-text-dark-gray w3-large'>
                                        <?php
                                            if($patient['p_gender'] == "M"){
                                                echo "Male";
                                            }
                                            else if($patient['p_gender'] == "F"){
                                                echo "Female";
                                            }
                                            else if($patient['p_gender'] == "O"){
                                                echo "Other";
                                            }
                                            else{
                                                echo "Not mentioned";
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class='w3-section' style='padding-top:16px;'>
                                    <div class='w3-text-gray'>
                                        Mobile Number:
                                    </div>
                                    <div class='kel-bold w3-text-dark-gray w3-large'>
                                        268945332
                                    </div>
                                </div>
                                <div class='w3-section' style='padding-top:16px;'>
                                    <div class='w3-text-gray'>
                                        Family:
                                    </div>
                                    <div class='kel-bold w3-text-dark-gray w3-large'>
                                        Not provided
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='w3-col l8 m8 s8'>
                        <div class='w3-round w3-white kel-shadow' 
                        style='margin-left:0px;'>
                            <div class='w3-bar w3-round w3-border-bottom w3-border-light-gray'
                            style='background-color:#f8f8f8'>
                                <div class='w3-bar-item w3-text-green'
                                style='padding:16px 24px;'>
                                    Patient Visits
                                </div>
                                <div class='w3-bar-item w3-right'
                                style='padding:8px 24px;'>
                                    <a href="">
                                        <button class='w3-button w3-round w3-green kel-hover'>
                                            <i class='fa fa-plus'></i> Add Visit
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <div class='w3-padding w3-margin-top'>
                                <table id='visits_table'>
                                <tr>
                                    <th>Date</th>
                                    <th>Complain</th>
                                    <th>Remaining Payment</th>
                                    <th>Operations</th>
                                </tr>
                                <?php

                                    while($visit = $visits->fetch_assoc()){
                                ?>
                                <tr>
                                    <td>
                                        <?php 
                                            $d = strtotime($visit['v_timing']);
                                            echo date("d M, Y (h:i a)", $d);
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $visit['v_complain'] ?>
                                    </td>
                                    <td>
                                        <?php echo $visit['v_unpaid']; ?> <span class='w3-small'> units </span>
                                    </td>
                                    <td>
                                        <button class='w3-button kel-hover w3-round w3-red'
                                        title='Remove visit'> 
                                            <i class='fa fa-times'></i>
                                        </button>
                                        <button class='w3-button kel-hover w3-round w3-blue'
                                        title='View visit'> 
                                            <i class='fa fa-eye'></i>
                                        </button>
                                    </td>
                                </tr>
                                <?php
                                    }

                                ?> 
                                </table>
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

</body>
</html>