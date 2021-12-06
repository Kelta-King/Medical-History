<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        define("TITLE", "Dashboard");
        include_once("Common/headurls.php");
    ?>
</head>
<body class=''>
    <div class="w3-bar w3-top w3-large w3-margin" style="z-index:4">
        <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" 
        onclick="nav_open();"><i class="fa fa-bars"></i></button>
        <div class="w3-bar-item w3-right w3-border-left"
        style='padding:8px 16px 8px 32px;margin-right:32px;'>
            <i class='fa fa-user-circle-o w3-text-gray w3-large kel-hover'></i>
        </div>
    </div>
    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" 
    onclick="nav_close()" style="cursor:pointer" 
    title="close side menu" id="myOverlay"></div>

    <!-- Nav bar -->
    <nav class="w3-sidebar w3-collapse side-nav w3-text-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
        <div class="w3-container w3-bar">
            <div class='w3-bar-item' style='padding-top:12px;'>
                <i class='fa fa-folder-open w3-xxlarge'></i>
            </div>
            <div class='w3-bar-item w3-center'>
                <b> PATIENT <br> RECORDS </b>
            </div>
        </div>
        <div class="w3-border-top w3-border-bottom w3-margin-top w3-margin-bottom w3-container w3-large">
            <a href="" class="w3-bar-item kel-hover w3-padding-32"
            style='text-decoration:none;'>
                <div class='w3-padding w3-margin-top w3-margin-bottom'>
                    <i class="fa fa-tachometer fa-fw"></i>  Dashboard
                </div>
            </a>
        </div>
        <div class="w3-bar-block w3-container">
            <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="nav_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
            <a href="#" class="w3-bar-item w3-padding"
            style='text-decoration:none;'>
                <div style='padding:8px 0px;'>
                    <i class="fa fa-filter fa-fw w3-large"></i>  Filter search
                </div>
            </a>
            <a href="#" class="w3-bar-item w3-padding"
            style='text-decoration:none;'>
                <div style='padding:8px 0px;'>
                    <i class="fa fa-user-plus fa-fw w3-large"></i>  Add Patient
                </div>
            </a>
            <a href="#" class="w3-bar-item w3-padding"
            style='text-decoration:none;'>
                <div style='padding:8px 0px;'>
                    <i class="fa fa-search fa-fw w3-large"></i>  Search Patient
                </div>
            </a>
            <a href="#" class="w3-bar-item w3-padding"
            style='text-decoration:none;'>
                <div style='padding:8px 0px;'>
                    <i class="fa fa-users fa-fw w3-large"></i>  Search Family
                </div>
            </a>
            <br><br>
        </div>
    </nav>
    <div class='w3-main w3-white' style="margin-left:300px;">
        <div style='height:80px;'>
            <!-- Blank space for top bar -->
        </div>
        <div class='w3-light-gray w3-padding'>

        </div>
    </div>

</body>
</html>