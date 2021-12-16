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
                Family Records
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
                    <div class='w3-col l4 m4 s4'>
                        <div class='w3-round w3-white kel-shadow' 
                        style='margin-right:16px;'>
                            <div class='w3-bar w3-round w3-border-bottom w3-border-light-gray'
                            style='background-color:#f8f8f8'>
                                <div class='w3-bar-item w3-text-blue'
                                style='padding:16px 24px;'>
                                    Details
                                </div>
                                <div class='w3-bar-item w3-right'
                                style='padding:16px 24px;'>
                                    <a href="editFamily<?php echo $url_extension ?>?id=<?php echo $family_id ?>">
                                        <i class='fa fa-pencil-square-o w3-large'></i>
                                    </a>
                                </div>
                            </div>
                            <div class='w3-padding'>
                                <div class='w3-section'>
                                    <div class='w3-text-gray'>
                                        Name:
                                    </div>
                                    <div class='kel-bold w3-text-dark-gray w3-large'>
                                        <?php echo $family['f_name'] ?>
                                    </div>
                                </div>
                                <div class='w3-section' style='padding-top:16px;'>
                                    <div class='w3-text-gray'>
                                        Main Person Name:
                                    </div>
                                    <div class='kel-bold w3-text-dark-gray w3-large'>
                                        <?php 
                                            echo explode("and Family", $family['f_name'])[0];
                                        ?>
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
                                <div class='w3-bar-item w3-text-blue'
                                style='padding:16px 24px;'>
                                    Family Memebrs
                                </div>
                                <div class='w3-bar-item w3-right'
                                style='padding:8px 16px 8px 8px;'>
                                    <a href="addPatient<?php echo $url_extension ?>?family=<?php echo $family_id ?>">
                                        <button class='w3-button w3-round w3-blue kel-hover' title="Add members">
                                            <i class='fa fa-plus'></i> Add Member
                                        </button>
                                    </a>
                                </div>
                                <div class='w3-bar-item w3-right'
                                style='padding:8px 0px;'>
                                    <a href="assignMember<?php echo $url_extension ?>?family=<?php echo $family_id ?>">
                                        <button class='w3-button w3-round w3-teal kel-hover' title="Assign members">
                                            <i class='fa fa-exchange'></i>
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <div class='w3-padding w3-margin-top'>
                                <table id='members_table'>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Operations</th>
                                </tr>
                                <?php

                                    while($member = $members->fetch_assoc()){
                                ?>
                                <tr>
                                    <td>
                                        P.<?php echo $member['p_id']  ?>
                                    </td>
                                    <td>
                                        <?php echo $member['p_name']  ?>
                                    </td>
                                    <td>
                                        <?php echo $member['p_age']  ?>
                                    </td>
                                    <td>
                                        <button class='w3-button kel-hover w3-round w3-red'
                                        title='Remove member from family' onclick="removeMemberFromFamily(<?php echo $member['p_id'].', '.$family_id ?>)"> 
                                            <i class='fa fa-minus '></i>
                                        </button>
                                        <a href="patient<?php echo $url_extension ?>?id=<?php echo $member['p_id'] ?>">
                                        <button class='w3-button kel-hover w3-round w3-blue'
                                        title='View member'> 
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
    <script src="../Js/familyoperations.js"></script>
</body>
</html>