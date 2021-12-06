    
    <nav class="w3-sidebar w3-collapse side-nav w3-text-white w3-animate-left" style="z-index:9;width:300px;" id="mySidebar"><br>
        <div class="w3-display-topright kel-hover w3-padding w3-hide-large w3-hover-black" 
            onclick="nav_close()" title="close menu" id='close' style='z-index:4000;'>
        <i class="fa fa-remove fa-fw"></i></div>
            
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
<script>

var mySidebar = document.getElementById("mySidebar");
var overlayBg = document.getElementById("myOverlay");
var bars = document.getElementById("bars");
var close = document.getElementById("close");

function nav_open() {
    if(mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
        bars.style.display = "block";
    } 
    else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
        bars.style.display = "none";
    }
}

function nav_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
  bars.style.display = "block";
}
</script>