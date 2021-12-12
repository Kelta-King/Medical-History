<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        define("TITLE", "Visit of ".$visit['p_name']);
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
                Visit of patient: <?php echo $visit['p_name']; ?>
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
                                    <td class='w3-large w3-padding-16' style='padding-left:8px;'> <?php echo $visit['p_name'] ?> </td>
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
                <div class='w3-white w3-padding w3-margin-top w3-round'>
                    <div class='w3-margin-top w3-margin-bottom w3-large'>
                        <?php
                            $d = strtotime($visit['v_timing']);
                            echo date("d M, Y (h:i a)", $d);
                        ?>
                    </div>
                    <table id='visits_table'>
                        <tr>
                            <th>Complain</th>
                            <th>Diagnose</th>
                            <th>Treatment</th>
                        </tr>
                        <tr>
                            <td><?php echo $visit['v_complain'] ?></td>
                            <td><?php echo $visit['v_diagnose'] ?></td>
                            <td><?php echo $visit['v_treatment'] ?></td>
                        </tr>
                    </table>
                    <div class='w3-row'>
                        <div class='w3-half w3-center w3-margin-top w3-padding-16'>
                            <div class='w3-padding-16 w3-border w3-round' style='margin-right:8px;'>
                                <div>
                                    Paid
                                </div>
                                <div class='w3-xxlarge'> 
                                    <?php echo $visit['v_paid'] ?>
                                </div>
                            </div>
                        </div>
                        <div class='w3-half w3-center w3-margin-top w3-padding-16'>
                            <div class='w3-padding-16 w3-border w3-round' style='margin-right:8px;'>
                                <div>
                                    Unpaid
                                </div>
                                <div class='w3-xxlarge'> 
                                    <?php echo $visit['v_unpaid'] ?>
                                </div>
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