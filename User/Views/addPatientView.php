<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        define("TITLE", "Add Patient");
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
                Add Patient
            </div>
            <div class='w3-content' style='max-width:900px;'>
                <div class='w3-white w3-round w3-margin-top' 
                style='padding:24px 16px;'>
                    <div class='w3-pale-red' id='err'>
                    </div>
                    <div id='patient_details' class='w3-border w3-round w3-padding'>
                        <div class='w3-section w3-center w3-large'>
                            Patient details
                        </div>
                        <div class='w3-row'>
                            <div class='w3-third'>
                                <div style='margin:8px 4px;'>
                                <div style='padding:8px 0px;'> Name<span class='w3-text-red'>*</span> </div>
                                    <input type="text" placeholder="Patient name"
                                    id='patient_name' class='w3-input w3-round w3-border'>
                                </div>
                            </div>
                            <div class='w3-third'>
                                <div style='margin:8px 4px;'>
                                <div style='padding:8px 0px;'> Age<span class='w3-text-red'>*</span> </div>
                                    <input type="number" placeholder="Patient age"
                                    id='patient_age' class='w3-input w3-round w3-border'>
                                </div>
                            </div>
                            <div class='w3-third'>
                                <div style='margin:8px 4px;'>
                                <div style='padding:8px 0px;'> Gender <span class='w3-text-red'>*</span> </div>
                                    <Select type="text" placeholder="" class='w3-input w3-round w3-border' 
                                    id='patient_gender' style='padding:10px 4px;'>
                                        <option value="" selected disabled> Patient name </option>
                                        <option value="M"> Male </option>
                                        <option value="F"> Female </option>
                                        <option value="O"> Other </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class='w3-section' style='padding:4px;' >
                            <div style='padding:8px 0px;'> Address </div>
                            <textarea id="address" class="w3-input w3-border w3-round" 
                            rows="2" placeholder="Patients address or Village or City"></textarea>
                        </div>
                        <div class='w3-row'>
                            <div class='w3-half'>
                                <div style='margin:8px 4px;'>
                                <div style='padding:8px 0px;'> Mobile No </div>
                                    <input type="number" placeholder="Patient mobile number"
                                    id='mobile_number' class='w3-input w3-round w3-border'>
                                </div>
                            </div>
                            <div class='w3-half'>
                                <div style='margin:8px 4px;'>
                                    <div style='padding:8px 0px;'> 
                                        Family 
                                        <div class='w3-right w3-text-dark-gray kel-hover'>
                                            <input type="checkbox" style='cursor:pointer;' id='new_family_check'> 
                                            <label for="new_family_check" style='cursor:pointer;'> New family? </label>
                                        </div>
                                    </div>
                                    <Select type="text" class='w3-input w3-round w3-border' 
                                    style='padding:10px 4px;' id='family'>
                                        <option value="" selected disabled> Select Patient Family </option>
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='w3-padding-16'></div>
                    <div id='patient_visit_details' class='w3-border w3-round w3-padding'>
                        <div class='w3-section w3-center w3-large' >
                            Visit details
                        </div>
                        <div class='w3-section' style='padding:8px 4px;'>
                            <input type="checkbox" class='kel-hover' onclick='timeinput()' 
                            id="current_timing_check" checked> 
                            <label for="current_timing_check" class='kel-hover'>
                                Current timing
                            </label>
                            <div id='time_box' style='display:none;'>
                                <input type="time" step="1" id="timings" class='w3-input w3-border w3-round'>
                            </div>
                        </div>
                        <div class='w3-section' style='padding:4px;' >
                            <div style='padding:8px 0px;'> Complain<span class='w3-text-red'>*</span> </div>
                            <textarea id="complain" class="w3-input w3-border w3-round" 
                            rows="2" placeholder="Complain of patient"></textarea>
                        </div>
                        <div class='w3-section' style='padding:4px;' >
                            <div style='padding:8px 0px;'> Diagnose<span class='w3-text-red'>*</span> </div>
                            <textarea id="diagnose" class="w3-input w3-border w3-round" 
                            rows="2" placeholder="Diagnose of patient"></textarea>
                        </div>
                        <div class='w3-section' style='padding:4px;' >
                            <div style='padding:8px 0px;'> Treatment<span class='w3-text-red'>*</span> </div>
                            <textarea id="treatment" class="w3-input w3-border w3-round" 
                            rows="2" placeholder="Treatment of patient"></textarea>
                        </div>
                        <div class='w3-row'>
                            <div class='w3-half'>
                                <div style='margin:8px 4px;'>
                                    <div style='padding:8px 0px;'> Paid<span class='w3-text-red'>*</span> </div>
                                    <input type="number" id="paid" placeholder="Amount paid"
                                    class='w3-input w3-border w3-round'>
                                </div>
                            </div>
                            <div class='w3-half'>
                                <div style='margin:8px 4px;'>
                                    <div style='padding:8px 0px;'> Unpaid<span class='w3-text-red'>*</span> </div>
                                    <input type="number" id="unpaid" placeholder="Amount unpaid"
                                    class='w3-input w3-border w3-round'>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='w3-section w3-center'>
                        <button class='w3-button w3-green kel-hover w3-round'
                        onclick='addPatient()'>
                            <i class='fa fa-plus'></i> Add Patient
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
    <script src="../Js/addpatient.js"></script>
</body>
</html>