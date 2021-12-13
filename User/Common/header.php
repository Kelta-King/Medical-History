
    <div class="w3-bar w3-top w3-large w3-white w3-card" style="z-index:4;padding-top:16px;padding-bottom:16px;">
        <button class="w3-bar-item w3-button w3-hide-large w3-hover-none kel-hover w3-hover-text-black" 
        onclick="nav_open();" id='bars'><i class="fa fa-bars"></i></button>
        <div class='w3-hide-small w3-hide-medium' style='width:300px;'></div>
        <div class='w3-bar-item w3-text-dark-gray w3-hide-small w3-hide-medium' style='margin-left:300px;'>
            Patient Records Management System
        </div>
        <div class='w3-bar-item w3-text-dark-gray w3-hide-large'>
            Patient Records Management <span class='w3-hide-small'> System </span>
        </div>
        <div class="w3-bar-item w3-right w3-border-left"
        style='padding:8px 16px 8px 32px;margin-right:32px;'
        onclick='openDropDown()'>
            <i class='fa fa-user-circle-o w3-text-gray w3-large kel-hover'></i>
        </div>
        
    </div>
    <!-- Dropdown for logout and account -->
    <div class='w3-display-topright w3-padding dropdown-menu' id='dropdown'
    style='z-index:9;margin-top:75px;margin-right:0px;display:none;position: fixed;'>
        <div class='w3-round w3-white w3-padding w3-card'>
            <div class='w3-bar-block'>
                <a href="searchPatient<?php echo $url_extension ?>"
                style='text-decoration:none;'>
                    <div class="w3-bar-item w3-button w3-hover-none"> 
                        <i class='fa fa-search' style='padding-right:8px;'></i> Search patient
                    </div>
                </a>
                <a href="searchFamily<?php echo $url_extension ?>"
                style='text-decoration:none;'>
                    <div class="w3-bar-item w3-button w3-hover-none"> 
                        <i class='fa fa-users' style='padding-right:8px;'></i> Search family 
                    </div>
                </a>
                <a href="passwordChange<?php echo $url_extension ?>"
                style='text-decoration:none;'>
                    <div class="w3-bar-item w3-button w3-hover-none"> 
                        <i class='fa fa-key' style='padding-right:8px;'></i> Change password 
                    </div>
                </a>
                <a href="editAccount<?php echo $url_extension ?>"
                style='text-decoration:none;'>
                    <div class="w3-bar-item w3-button w3-hover-none"
                    style='padding-bottom:14px;'> 
                        <i class='fa fa-pencil' style='padding-right:8px;'></i> Edit details 
                    </div>
                </a>
                <a href="../logout<?php echo $url_extension ?>"
                style='text-decoration:none;'>
                    <div class="w3-bar-item w3-border-top w3-button w3-hover-none"
                    style='padding-top:14px;'> 
                        <i class='fa fa-sign-out' style='padding-right:8px;'></i> Log out 
                    </div>
                </a>
            </div>
        </div>
    </div>
    <script>
        function openDropDown(){
            if(document.getElementById("dropdown").style.display == "block"){
                document.getElementById("dropdown").style.display = "none";
            }
            else{
                document.getElementById("dropdown").style.display = "block";
            }
        }
        
    </script>
    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" 
    onclick="nav_close()" style="cursor:pointer" 
    title="close side menu" id="myOverlay"></div>