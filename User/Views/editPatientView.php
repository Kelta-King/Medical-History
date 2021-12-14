<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        define("TITLE", "Edit Patient");
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
        <?php
            include_once("Common/structure_bar.php");
        ?>
        <div class='w3-light-gray w3-padding'>
            <div class='w3-center w3-xlarge w3-padding w3-margin-top'>
                Edit Patient
            </div>
            <div class='w3-content' style='max-width:900px;'>
                <div class='w3-white w3-round w3-margin-top' style='padding:24px 16px;'>
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
                                    <input type="text" placeholder="Patient name" id='patient_name'
                                        class='w3-input w3-round w3-border' value="<?php echo $patient['p_name'] ?>">
                                </div>
                            </div>
                            <div class='w3-third'>
                                <div style='margin:8px 4px;'>
                                    <div style='padding:8px 0px;'> Age<span class='w3-text-red'>*</span> </div>
                                    <input type="number" placeholder="Patient age" id='patient_age'
                                        class='w3-input w3-round w3-border' value="<?php echo $patient['p_age'] ?>">
                                </div>
                            </div>
                            <div class='w3-third'>
                                <div style='margin:8px 4px;'>
                                    <div style='padding:8px 0px;'> Gender <span class='w3-text-red'>*</span> </div>
                                    <Select type="text" placeholder="" class='w3-input w3-round w3-border'
                                        id='patient_gender' style='padding:10px 4px;'>
                                        <option value="" selected disabled> Patient Gender </option>
                                        <option value="M" <?php if($patient['p_gender'] == "M"){ echo "selected"; } ?> > Male </option>
                                        <option value="F" <?php if($patient['p_gender'] == "F"){ echo "selected"; } ?> > Female </option>
                                        <option value="O" <?php if($patient['p_gender'] == "O"){ echo "selected"; } ?> > Other </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class='w3-section' style='padding:4px;'>
                            <div style='padding:8px 0px;'> Address </div>
                            <textarea id="address" class="w3-input w3-border w3-round" rows="2"
                                placeholder="Patients address or Village or City"><?php echo $patient['p_address'] ?></textarea>
                        </div>
                        <div class='w3-row'>
                            <div style='margin:8px 4px;'>
                                <div style='padding:8px 0px;'> Mobile No </div>
                                <input type="number" placeholder="Patient mobile number" id='mobile_number'
                                    class='w3-input w3-round w3-border' value="<?php echo $patient['p_mobile_no'] ?>">
                            </div>
                        </div>
                        <div class='w3-section w3-center'>
                            <button class='w3-button w3-round w3-green kel-hover'
                            onclick='updatePatient(<?php echo $patient_id ?>)'> 
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
    <script src="../Js/patient.js"></script>
</body>

</html>