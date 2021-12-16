<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        define("TITLE", "Family");
        include_once("Common/headurls.php");
    ?>
    <style>
        #members_table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #members_table td, #members_table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #members_table th {
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
        <?php
            include_once("Common/structure_bar.php");
        ?>
        <div class='w3-light-gray w3-padding'>
            <div class='w3-center w3-xlarge w3-padding w3-margin-top w3-text-dark-gray'>
                Assign member
            </div>
            <hr style='border-bottom:0.5px solid gray;'>
            <div class='w3-container' style=''>
                <div class='w3-row'>
                    <div class='w3-col l8 m8 s8'>
                        <div class='w3-padding w3-round w3-white kel-shadow w3-leftbar w3-border-blue' 
                        style='margin-right:16px;'>
                            <table>
                                <tr>
                                    <td class='w3-text-blue w3-padding-16' style='padding-right:16px;'> Family Name </td>
                                    <td class='w3-large w3-padding-16' style='padding-left:8px;'> <?php echo $family['f_name'] ?> </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class='w3-col l4 m4 s4'>
                        <div class='w3-padding w3-round w3-white kel-shadow w3-leftbar w3-border-blue' 
                        style='margin-left:16px;'>
                            <table>
                                <tr>
                                    <td class='w3-text-blue w3-padding-16' style='padding-right:16px;'> Total Members </td>
                                    <td class='w3-large w3-padding-16' style='padding-left:8px;'> <?php echo $family['f_members'] ?> </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class='w3-row w3-padding-16'>
                    <div class='w3-pale-red' id='err'>
                    </div>
                    <div class='w3-half'>
                        <div class='w3-round w3-white kel-shadow' style='margin-right:8px;padding:32px 8px;'>
                            <div> Patient Id </div>
                            <input type="text" name="patient_id" placeholder="Enter Patient Id"
                            class="w3-input w3-round w3-border" id="patient_id" value="P.11">
                        </div>
                    </div>
                    <div class='w3-half'>
                        <div class='w3-round w3-white kel-shadow' style="margin-left:8px;padding:32px 8px;">
                            <div> Family Id </div>
                            <input type="text" name="family_id" placeholder="Enter Family Id"
                            style="cursor:no-drop;" value="F.<?php echo $family_id ?>"
                            class="w3-input w3-round w3-border" id="family_id" disabled>
                        </div>
                    </div>
                </div>
                <div class="w3-center w3-padding">
                    <button class="w3-button w3-round w3-blue kel-hover"
                    onclick="assignMember(<?php echo $family_id ?>)">
                        <i class='fa fa-exchange'></i> Assign
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
    <script src="../Js/assignmember.js"></script>
</body>
</html>