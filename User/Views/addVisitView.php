<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        define("TITLE", "Add Visit to Patient ".$patient['p_name']);
        include_once("Common/headurls.php");
    ?>
    <style>
        #visits_table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #visits_table td,
        #visits_table th {
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
                Add visit to Patient: <?php echo $patient['p_name'] ?>
            </div>
            <hr style='border-bottom:0.5px solid gray;'>
            <div class='w3-container' style=''>
                <div class='w3-row'>
                    <div class='w3-col l8 m8 s8'>
                        <div class='w3-padding w3-round w3-white kel-shadow w3-leftbar w3-border-green'
                            style='margin-right:16px;'>
                            <table>
                                <tr>
                                    <td class='w3-text-green w3-padding-16' style='padding-right:16px;'> Patient Name
                                    </td>
                                    <td class='w3-large w3-padding-16' style='padding-left:8px;'>
                                        <?php echo $patient['p_name'] ?> </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class='w3-col l4 m4 s4'>
                        <div class='w3-padding w3-round w3-white kel-shadow w3-leftbar w3-border-green'
                            style='margin-left:16px;'>
                            <table>
                                <tr>
                                    <td class='w3-text-green w3-padding-16' style='padding-right:16px;'> Patient No.
                                    </td>
                                    <td class='w3-large w3-padding-16' style='padding-left:8px;'>
                                        P.<?php echo $patient_id ?> </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class='w3-margin-top w3-margin-bottom'>
                    <div id='patient_visit_details' class='w3-border w3-round w3-padding w3-white'>
                        <div class='w3-section w3-center w3-large'>
                            Visit details
                        </div>
                        <div class='w3-section' style='padding:8px 4px;'>
                            <input type="checkbox" class='kel-hover' onclick='timeinput()' id="current_timing_check"
                                checked>
                            <label for="current_timing_check" class='kel-hover'>
                                Current timing
                            </label>
                            <div id='time_box' style='display:none;'>
                                <input type="date" id='date_time' class='w3-input w3-border w3-round'>
                                <input type="time" step="1" id="timings" class='w3-input w3-border w3-round'>
                            </div>
                        </div>
                        <div class='w3-section' style='padding:4px;'>
                            <div style='padding:8px 0px;'> Complain<span class='w3-text-red'>*</span>
                                <span class='fa fa-microphone' onclick="audioToTextInInput('complain')"></span>
                            </div>
                            <textarea id="complain" class="w3-input w3-border w3-round" rows="2"
                                placeholder="Complain of patient">sample complain</textarea>
                        </div>
                        <div class='w3-section' style='padding:4px;'>
                            <div style='padding:8px 0px;'> Diagnose<span class='w3-text-red'>*</span>
                                <span class='fa fa-microphone' onclick="audioToTextInInput('diagnose')"></span>
                            </div>
                            <textarea id="diagnose" class="w3-input w3-border w3-round" rows="2"
                                placeholder="Diagnose of patient">sample diagnose</textarea>
                        </div>
                        <div class='w3-section' style='padding:4px;'>
                            <div style='padding:8px 0px;'> Treatment<span class='w3-text-red'>*</span>
                                <span class='fa fa-microphone' onclick="audioToTextInInput('treatment')"></span>
                            </div>
                            <textarea id="treatment" class="w3-input w3-border w3-round" rows="2"
                                placeholder="Treatment of patient">sample treatment</textarea>
                        </div>
                        <div class='w3-row'>
                            <div class='w3-half'>
                                <div style='margin:8px 4px;'>
                                    <div style='padding:8px 0px;'> Paid<span class='w3-text-red'>*</span> </div>
                                    <input type="number" id="paid" placeholder="Amount paid"
                                        class='w3-input w3-border w3-round' value="234">
                                </div>
                            </div>
                            <div class='w3-half'>
                                <div style='margin:8px 4px;'>
                                    <div style='padding:8px 0px;'> Unpaid<span class='w3-text-red'>*</span> </div>
                                    <input type="number" id="unpaid" placeholder="Amount unpaid"
                                        class='w3-input w3-border w3-round' value="34">
                                </div>
                            </div>
                        </div>
                        <div class='w3-section w3-center'>
                            <button class='w3-button w3-green kel-hover w3-round'
                            onclick='addVisit()'>
                                <i class='fa fa-plus'></i> Add Visit
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
    <script src="../Js/addvisit.js"></script>
</body>

</html>